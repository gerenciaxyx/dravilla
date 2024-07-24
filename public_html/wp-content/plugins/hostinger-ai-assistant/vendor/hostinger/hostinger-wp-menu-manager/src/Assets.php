<?php

namespace Hostinger\WpMenuManager;

use Hostinger\WpMenuManager\Menus;
use Hostinger\WpHelper\Utils;

class Assets
{
    /**
     * @var Manager
     */
    private Manager $manager;

    /**
     * @return void
     */
    public function init(): void
    {
        if (!$this->manager->checkCompatibility()) {
            add_action('admin_enqueue_scripts', [$this, 'enqueueAdminAssets']);
            add_action('admin_head', [$this, 'addMenuHidingCss']);
        }
    }

    /**
     * @param Manager $manager
     *
     * @return void
     */
    public function setManager(Manager $manager): void
    {
        $this->manager = $manager;
    }

    /**
     * @return void
     */
    public function enqueueAdminAssets(): void
    {
        if ($this->isHostingerMenuPage()) {
            wp_enqueue_script(
                'hostinger_menu_scripts',
                $this->manager->getPluginInfo() . '/vendor/hostinger/hostinger-wp-menu-manager/assets/js/menus.min.js',
                [
                    'jquery',
                ],
                '1.1.4',
                false
            );

            wp_enqueue_style(
                'hostinger_menu_styles',
                $this->manager->getPluginInfo()
                . '/vendor/hostinger/hostinger-wp-menu-manager/assets/css/style.min.css',
                [],
                '1.1.4'
            );
        }
    }

    /**
     * @return void
     */
    public function addMenuHidingCss(): void
    {
        // These CSS rules should be loaded on every page in WordPress admin.
        ?>
        <style type="text/css">
            body.hostinger-hide-main-menu-item #toplevel_page_hostinger .wp-submenu > .wp-first-item {
                display: none;
            }

            #wpadminbar #wp-admin-bar-hostinger_admin_bar .ab-item {
                align-items: center;
                display: flex;
            }

            #wpadminbar #wp-admin-bar-hostinger_admin_bar .ab-sub-wrapper .ab-item svg {
                fill: #9ca1a7;
                margin-left: 3px;
                max-height: 18px;
            }
            <?php

            if (!empty(Menus::isSubmenuItemsHidden())) {
                ?>
                body.hostinger-hide-all-menu-items #toplevel_page_hostinger .wp-submenu {
                    display: none !important;
                }
                body.hostinger-hide-all-menu-items .hsr-onboarding-navbar__wrapper {
                    justify-content: center;
                }
                <?php
            }

            ?>
        </style>
        <?php
    }

    /**
     * @return bool
     */
    private function isHostingerMenuPage(): bool
    {
        $pages = [
            'wp-admin/admin.php?page=' . Menus::MENU_SLUG
        ];

        $subpages = Menus::getMenuSubpages();

        foreach ($subpages as $page) {
            if (isset($page['menu_slug'])) {
                $pages[] = 'wp-admin/admin.php?page=' . $page['menu_slug'];
            }
        }

        $utils = new Utils();

        foreach ($pages as $page) {
            if ($utils->isThisPage($page)) {
                return true;
            }
        }

        return false;
    }
}
