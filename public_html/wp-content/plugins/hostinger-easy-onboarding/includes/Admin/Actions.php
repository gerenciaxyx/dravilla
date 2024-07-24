<?php

namespace Hostinger\EasyOnboarding\Admin;

use Hostinger\EasyOnboarding\Admin\Onboarding\Onboarding;

defined( 'ABSPATH' ) || exit;

class Actions {
	public const LOGO_UPLOAD         = 'add_logo';
	public const IMAGE_UPLOAD        = 'image_upload';
	public const EDIT_DESCRIPTION    = 'edit_description';
	public const EDIT_SITE_TITLE     = 'edit_site_title';
	public const ADD_POST            = 'add_post';
	public const ADD_PAGE            = 'add_page';
	public const ADD_PRODUCT         = 'add_product';
	public const DOMAIN_IS_CONNECTED = 'connect_domain';
	public const ACTIONS_LIST        = array(
		self::LOGO_UPLOAD,
		self::IMAGE_UPLOAD,
		self::EDIT_DESCRIPTION,
		self::EDIT_SITE_TITLE,
		self::ADD_POST,
		self::ADD_PAGE,
		self::DOMAIN_IS_CONNECTED,
	);

    public const CATEGORY_ACTION_LISTS = array(
        Onboarding::HOSTINGER_EASY_ONBOARDING_WEBSITE_STEP_CATEGORY_ID => self::ACTIONS_LIST,
        Onboarding::HOSTINGER_EASY_ONBOARDING_STORE_STEP_CATEGORY_ID => array(
            self::ADD_PRODUCT,
        )
    );
}
