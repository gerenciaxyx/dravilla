<div id="qode-intro-section" class="<?php echo esc_attr( $holder_classes ); ?>">
	<div class="qode-is-content-wrapper">
		<div class="qode-is-content">
			<?php if ( $subtitle ) { ?>
				<h6 class="qode-is-subtitle" <?php bridge_qode_inline_style( $tagline_styles ); ?>><?php echo esc_attr( $subtitle ) ?></h6>
			<?php } ?>
			<?php if ( $title ) { ?>
				<h1 class="qode-is-title" <?php bridge_qode_inline_style( $title_styles ); ?>><?php echo esc_attr( $title ) ?></h1>
			<?php } ?>
			<div class="qode-is-content-btm">
				<?php if ( ! empty( $text ) ) { ?>
					<h5 class="qode-is-text" <?php bridge_qode_inline_style( $text_styles ); ?>><?php echo esc_attr( $text ); ?></h5>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="qode-is-bg-wrapper">
		<?php if ( ! empty( $bg_image ) ) { ?>
			<div class="qode-is-bg-image"
			     style="background-image: url(<?php echo wp_get_attachment_url( $bg_image ); ?>)"></div>
		<?php } ?>
	</div>
</div>
