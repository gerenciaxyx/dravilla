<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$nav_index = 1;
$nav_items = array(
	'configuration' => esc_attr__( 'Configuration', 'qi-blocks' ),
	'elements'      => esc_attr__( 'Elements', 'qi-blocks' ),
	'pro'           => esc_attr__( 'Go PRO', 'qi-blocks' ),
	'templates'     => esc_attr__( 'Qi Templates', 'qi-blocks' ),
	'finalize'      => esc_attr__( 'Finalize', 'qi-blocks' ),
);

if ( $premium_flag ) {
	unset( $nav_items['pro'] );
}

if ( $templates_flag ) {
	unset( $nav_items['templates'] );
}
?>
<div id="qodef-page" class="qodef-admin-page qodef-dashboard-admin qodef-admin-content-grid">
	<div class="qodef-admin-page-wrapper qodef--setup-wizard">
		<script>
			document.title = "<?php esc_html_e( 'Quick Setup Wizard - Qi Blocks for Gutenberg', 'qi-blocks' ); ?>"
		</script>
		<form class="qodef-setup-wizard-form" data-action="setup_wizard" data-wizard-step="1" data-wizard-steps="<?php echo count( $nav_items ); ?>">
			<div class="qodef-setup-wizard-header qodef-m">
				<ul class="qodef-m-nav">
					<?php
					foreach ( $nav_items as $nav_item_key => $nav_item_value ) {
						$item_classes = array( 'qodef-m-nav-item', 'qodef-e', 'qodef--' . esc_attr( $nav_item_key ) );
						if ( array_key_first( $nav_items ) === $nav_item_key ) {
							$item_classes[] = 'qodef--active';
						}
						?>
						<li id="<?php echo esc_attr( $nav_item_key ); ?>" class="<?php echo implode( ' ', $item_classes ); ?>">
							<span class="qodef-e-item-number"><?php echo esc_html( $nav_index++ ); ?></span>
							<span class="qodef-e-item-text"><?php echo esc_html( $nav_item_value ); ?></span>
							<?php if ( array_key_last( $nav_items ) !== $nav_item_key ) { ?>
								<span class="qodef-e-item-icon">
									<svg xml:space="preserve" height="7.5" width="12.8" xmlns="http://www.w3.org/2000/svg"><path d="M.5 3.2h10.4L8.7.9c-.3-.2-.3-.5 0-.7.3-.3.5-.2.7 0l3.2 3.2c.1 0 .1.1.1.2V4c0 .1-.1.1-.1.2L9.4 7.3c-.2.3-.5.3-.7 0-.3-.3-.2-.5 0-.7L11 4.3H.5c-.2 0-.3 0-.4-.1S0 3.9 0 3.8v-.2l.1-.1c.1-.1.3-.3.4-.3z"></path></svg>
								</span>
							<?php } ?>
						</li>
					<?php } ?>
				</ul>
			</div>
			<div class="qodef-setup-wizard-content qodef-m qodef--configuration qodef--active">
				<img class="qodef-m-image" src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/sub-pages/setup-wizard/assets/img/wizard-step-1-logo.png' ); ?>" alt="<?php esc_attr_e( 'Qi Blocks', 'qi-blocks' ); ?>" />
				<h3 class="qodef-m-title"><?php esc_html_e( 'Get Started with Qi Blocks', 'qi-blocks' ); ?></h3>
				<p class="qodef-m-text"><?php esc_html_e( 'Pick an installation method that suits your requirements', 'qi-blocks' ); ?></p>
				<ul class="qodef-m-elements-switcher">
					<li class="qodef-m-elements-switcher-item qodef-e qodef--all">
						<div class="qodef-e-input">
							<input class="qodef-e-input-field" type="checkbox" value="all" checked />
							<span class="qodef-e-input-checkmark"></span>
						</div>
						<div class="qodef-e-content">
							<h4 class="qodef-e-title"><?php esc_html_e( 'All (Recommended)', 'qi-blocks' ); ?></h4>
							<p class="qodef-e-description"><?php esc_html_e( 'Start off with all Qi Blocks for Gutenberg enabled.', 'qi-blocks' ); ?></p>
						</div>
					</li>
					<li class="qodef-m-elements-switcher-item qodef-e qode--custom">
						<div class="qodef-e-input">
							<input class="qodef-e-input-field" type="checkbox" value="custom" />
							<span class="qodef-e-input-checkmark"></span>
						</div>
						<div class="qodef-e-content">
							<h4 class="qodef-e-title"><?php esc_html_e( 'Custom', 'qi-blocks' ); ?></h4>
							<p class="qodef-e-description"><?php esc_html_e( 'Select which custom blocks you wish to enable/disable.', 'qi-blocks' ); ?></p>
						</div>
					</li>
				</ul>
			</div>
			<div class="qodef-setup-wizard-content qodef-m qodef--elements">
				<div class="qodef-m-heading">
					<h3 class="qodef-m-title"><?php esc_html_e( 'Choose the Elements You Wish to Use', 'qi-blocks' ); ?></h3>
					<a class="qodef-btn qodef-btn-icon" href="https://qodeinteractive.com/qi-blocks-for-gutenberg/all-blocks/" target="_blank">
						<span class="qodef-m-text"><?php esc_html_e( 'Preview All Blocks', 'qi-blocks' ); ?></span>
						<span class="qodef-m-icon">
							<svg xml:space="preserve" height="7.5" width="12.8" xmlns="http://www.w3.org/2000/svg"><path d="M.5 3.2h10.4L8.7.9c-.3-.2-.3-.5 0-.7.3-.3.5-.2.7 0l3.2 3.2c.1 0 .1.1.1.2V4c0 .1-.1.1-.1.2L9.4 7.3c-.2.3-.5.3-.7 0-.3-.3-.2-.5 0-.7L11 4.3H.5c-.2 0-.3 0-.4-.1S0 3.9 0 3.8v-.2l.1-.1c.1-.1.3-.3.4-.3z"></path></svg>
						</span>
					</a>
				</div>
				<?php foreach ( $blocks as $block_subcategory => $subcat_blocks ) { ?>
					<div class="qodef-widgets-section">
						<h4 class="qodef-widgets-section-title"><?php echo esc_html( $block_subcategory ); ?></h4>
						<div class="qodef-widget-grid">
							<div class="qodef-widget-grid-inner">
								<?php
								foreach ( $subcat_blocks as $block_key => $block ) :
									qi_blocks_template_part(
										'admin/admin-pages',
										'sub-pages/setup-wizard/templates/widget',
										'',
										array(
											'premium_flag' => $premium_flag,
											'block_key'    => $block_key,
											'block'        => $block,
										)
									);
								endforeach;
								?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<?php if ( ! $premium_flag ) { ?>
				<div class="qodef-setup-wizard-content qodef-m qodef--pro">
					<div class="qodef-m-heading">
						<h3 class="qodef-m-title"><?php esc_html_e( 'Unlock 30+ Premium Blocks', 'qi-blocks' ); ?></h3>
						<a class="qodef-btn qodef-btn-icon" href="https://qodeinteractive.com/qi-blocks-for-gutenberg/all-premium-blocks/" target="_blank">
							<span class="qodef-m-text"><?php esc_html_e( 'Preview Premium Blocks', 'qi-blocks' ); ?></span>
							<span class="qodef-m-icon">
								<svg xml:space="preserve" height="7.5" width="12.8" xmlns="http://www.w3.org/2000/svg"><path d="M.5 3.2h10.4L8.7.9c-.3-.2-.3-.5 0-.7.3-.3.5-.2.7 0l3.2 3.2c.1 0 .1.1.1.2V4c0 .1-.1.1-.1.2L9.4 7.3c-.2.3-.5.3-.7 0-.3-.3-.2-.5 0-.7L11 4.3H.5c-.2 0-.3 0-.4-.1S0 3.9 0 3.8v-.2l.1-.1c.1-.1.3-.3.4-.3z"></path></svg>
							</span>
						</a>
					</div>
					<img class="qodef-m-image" src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/sub-pages/setup-wizard/assets/img/wizard-step-3-bg.png' ); ?>" alt="<?php esc_attr_e( 'Qi Premium Blocks', 'qi-blocks' ); ?>" />
					<a class="qodef-m-button qodef-btn qodef-btn-solid-red" href="https://qodeinteractive.com/pricing/?qi_product=blocks?utm_source=dash&utm_medium=qiblocks&utm_campaign=wizard" target="_blank"><?php esc_html_e( 'Get Premium', 'qi-blocks' ); ?></a>
				</div>
			<?php } ?>
			<?php if ( ! $templates_flag ) { ?>
				<div class="qodef-setup-wizard-content qodef-m qodef--templates">
					<div class="qodef-m-wrapper">
						<div class="qodef-m-content">
							<h3 class="qodef-m-title"><?php esc_html_e( 'Get Qi Templates with 550+ modern, prebuilt layouts', 'qi-blocks' ); ?></h3>
							<div class="qodef-m-items">
								<h4 class="qodef-m-item"><?php esc_html_e( '- 60 Qi Demos', 'qi-blocks' ); ?></h4>
								<h4 class="qodef-m-item"><?php esc_html_e( '- 265 Qi Templates', 'qi-blocks' ); ?></h4>
								<h4 class="qodef-m-item"><?php esc_html_e( '- 232 Qi Patterns', 'qi-blocks' ); ?></h4>
								<h4 class="qodef-m-item"><?php esc_html_e( '- 32 Qi Wireframes', 'qi-blocks' ); ?></h4>
							</div>
							<a class="qodef-m-button qodef-btn qodef-btn-solid-red" href="https://qodeinteractive.com/qi-templates?utm_source=dash&utm_medium=qiblocks&utm_campaign=wizard" target="_blank"><?php esc_html_e( 'Get Qi Templates', 'qi-blocks' ); ?></a>
						</div>
						<div class="qodef-m-image">
							<img src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/sub-pages/setup-wizard/assets/img/wizard-step-4-bg.png' ); ?>" alt="<?php esc_attr_e( 'Qi Templates', 'qi-blocks' ); ?>" />
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="qodef-setup-wizard-content qodef-m qodef--finalize">
				<div class="qodef-m-wrapper">
					<div class="qodef-m-content">
						<h3 class="qodef-m-title"><?php esc_html_e( 'Collection of diagnostic data & information', 'qi-blocks' ); ?></h3>
						<p class="qodef-m-text"><?php esc_html_e( 'We collect non-sensitive diagnostic data and plugin usage information. This information consists of your website URL, language, WordPress and PHP versions, active plugins and themes, and the email you provided. This data allows us to ensure that the plugin stays compatible with the most popular plugins and themes at all times.', 'qi-blocks' ); ?></p>
						<div class="qodef-m-buttons">
							<a class="qodef-m-button qodef-btn qodef-btn-solid-red qodef-setup-wizard-form-trigger" href="#" data-stats="yes"><?php esc_html_e( 'Allow', 'qi-blocks' ); ?></a>
							<a class="qodef-m-button qodef-btn qodef-btn-outlined-simple qodef-setup-wizard-form-trigger" href="#" data-stats="no"><?php esc_html_e( 'No Thanks', 'qi-blocks' ); ?></a>
							<input type="hidden" class="qodef-m-user-stats" name="user_stats" value="" />
						</div>
					</div>
					<div class="qodef-m-image">
						<img src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/sub-pages/setup-wizard/assets/img/wizard-step-5-bg.png' ); ?>" alt="<?php esc_attr_e( 'Qi Templates', 'qi-blocks' ); ?>" />
					</div>
				</div>
			</div>
			<?php wp_nonce_field( 'qi_blocks_setup_wizard_save_nonce', 'qi_blocks_setup_wizard_save_nonce' ); ?>
		</form>
		<div class="qodef-setup-wizard-actions">
			<a class="qodef-btn qodef-btn-icon qodef--skip" href="#">
				<span class="qodef-m-text"><?php esc_html_e( 'Skip All', 'qi-blocks' ); ?></span>
				<span class="qodef-m-icon">
					<svg xml:space="preserve" height="7.5" width="12.8" xmlns="http://www.w3.org/2000/svg"><path d="M.5 3.2h10.4L8.7.9c-.3-.2-.3-.5 0-.7.3-.3.5-.2.7 0l3.2 3.2c.1 0 .1.1.1.2V4c0 .1-.1.1-.1.2L9.4 7.3c-.2.3-.5.3-.7 0-.3-.3-.2-.5 0-.7L11 4.3H.5c-.2 0-.3 0-.4-.1S0 3.9 0 3.8v-.2l.1-.1c.1-.1.3-.3.4-.3z"></path></svg>
				</span>
			</a>
			<a class="qodef-btn qodef-btn-outlined-simple qodef--prev" href="#"><?php esc_html_e( 'Previous', 'qi-blocks' ); ?></a>
			<a class="qodef-btn qodef-btn-solid-red qodef--next" href="#"><?php esc_html_e( 'Next', 'qi-blocks' ); ?></a>
		</div>
	</div>
</div>
<div id="qodef-setup-wizard-thank-you" class="qodef-m">
	<div class="qodef-m-content">
		<img class="qodef-m-image" src="<?php echo esc_url( QI_BLOCKS_ADMIN_URL_PATH . '/admin-pages/sub-pages/setup-wizard/assets/img/wizard-step-1-logo.png' ); ?>" alt="<?php esc_attr_e( 'Qi Blocks', 'qi-blocks' ); ?>" />
		<h3 class="qodef-m-title"><?php esc_html_e( 'Thank You for Choosing Qi!', 'qi-blocks' ); ?></h3>
		<p class="qodef-m-text"><?php esc_html_e( 'All set! Enjoy creating your new website', 'qi-blocks' ); ?></p>
	</div>
</div>
