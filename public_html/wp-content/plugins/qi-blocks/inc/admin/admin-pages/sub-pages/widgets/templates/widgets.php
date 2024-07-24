<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}
?>
<div class="qodef-admin-widgets-page">
	<form class="qodef-widgets-list qodef-dashboard-ajax-form" data-action="widget">
		<div class="qodef-admin-widget-header">
			<div class="qodef-widget-header-left">
				<div class="qodef-widget-header-left-inner">
					<?php qi_blocks_template_part( 'admin/admin-pages', 'sub-pages/widgets/templates/parts/search' ); ?>
				</div>
			</div>
			<div class="qodef-widget-header-right">
				<div class="qodef-widget-header-right-inner">
					<?php qi_blocks_template_part( 'admin/admin-pages', 'templates/parts/save', '', array( 'page_slug' => 'widget' ) ); ?>
				</div>
			</div>
		</div>
		<div class="qodef-widgets-section">
			<div class="qodef-widgets-section-title-holder">
				<h3 class="qodef-widgets-section-title"><?php esc_html_e( 'General', 'qi-blocks' ); ?></h3>
			</div>
			<div class="qodef-widget-grid">
				<div class="qodef-widget-grid-inner">
					<div class="qodef-widgets-item col-sm-12 col-md-12">
						<div class="qodef-widgets-item-top">
							<h4 class="qodef-widgets-title"><?php esc_html_e( 'Disable Google Fonts', 'qi-blocks' ); ?></h4>
							<div class="qodef-checkbox-toggle qodef-field" data-option-name="general_options[disable_google_fonts]">
								<input type="checkbox" id="disable_google_fonts" name="general_options[disable_google_fonts]" value="yes" <?php echo ( ! empty( $general_options ) && key_exists( 'disable_google_fonts', $general_options ) ) ? 'checked' : ''; ?> />
								<label for="disable_google_fonts"><?php esc_html_e( 'Disable Google Fonts', 'qi-blocks' ); ?></label>
							</div>
						</div>
						<p class="qodef-widgets-item-description"><?php esc_html_e( 'Enabling this option will disallow the Google Font list inside blocks Typography options.', 'qi-blocks' ); ?></p>
					</div>
					<div class="qodef-widgets-item col-sm-12 col-md-12">
						<div class="qodef-widgets-item-top">
							<h4 class="qodef-widgets-title"><?php esc_html_e( 'Upgrade Swiper Library', 'qi-blocks' ); ?></h4>
							<div class="qodef-checkbox-toggle qodef-field" data-option-name="general_options[swiper_library]">
								<input type="checkbox" id="swiper_library" name="general_options[swiper_library]" value="yes" <?php echo ( ! empty( $general_options ) && key_exists( 'swiper_library', $general_options ) ) ? 'checked' : ''; ?> />
								<label for="swiper_library"><?php esc_html_e( 'Upgrade Swiper Library', 'qi-blocks' ); ?></label>
							</div>
						</div>
						<p class="qodef-widgets-item-description"><?php esc_html_e( 'Upgrade the Swiper library script from v5.4.5 to v8.4.5. This upgrade might require updating custom code and cause compatibility issues with third party plugins.', 'qi-blocks' ); ?></p>
					</div>
				</div>
			</div>
		</div>
		<?php foreach ( $blocks as $block_subcategory => $subcat_blocks ) : ?>
			<div class="qodef-widgets-section">
				<?php
				qi_blocks_template_part(
					'admin/admin-pages',
					'sub-pages/widgets/templates/parts/section-title',
					'',
					array(
						'block_subcategory'   => $block_subcategory,
						'enabled_subcategory' => $enabled_subcategory,
					)
				);
				?>
				<div class="qodef-widget-grid">
					<div class="qodef-widget-grid-inner">
						<?php
						foreach ( $subcat_blocks as $block_key => $block ) :
							qi_blocks_template_part(
								'admin/admin-pages',
								'sub-pages/widgets/templates/item',
								'',
								array(
									'premium_flag' => $premium_flag,
									'disabled'     => $disabled,
									'block_key'    => $block_key,
									'block'        => $block,
								)
							);
						endforeach;
						?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</form>
</div>
