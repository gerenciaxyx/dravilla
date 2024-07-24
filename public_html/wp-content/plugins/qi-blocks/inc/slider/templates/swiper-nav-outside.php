<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( 'no' !== $sliderNavigation ) {
	$nav_next_classes = '';
	$nav_prev_classes = '';

	if ( isset( $uniqueClass ) && ! empty( $uniqueClass ) ) {
		$nav_next_classes = 'swiper-button-outside swiper-button-next-' . esc_attr( $uniqueClass );
		$nav_prev_classes = 'swiper-button-outside swiper-button-prev-' . esc_attr( $uniqueClass );
	}
	?>
	<?php if ( 'together' === $sliderNavigationPosition ) { ?>
		<div class="qodef-swiper-together-nav">
			<div class="qodef-swiper-together-inner">
	<?php } ?>
	<div class="swiper-button-prev <?php echo esc_attr( $nav_prev_classes ); ?>"><?php qi_blocks_template_part( 'slider', 'templates/parts/arrow-left', '', $params ); ?></div>
	<div class="swiper-button-next <?php echo esc_attr( $nav_next_classes ); ?>"><?php qi_blocks_template_part( 'slider', 'templates/parts/arrow-right', '', $params ); ?></div>
	<?php if ( 'together' === $sliderNavigationPosition ) { ?>
			</div>
		</div>
	<?php } ?>
<?php } ?>
