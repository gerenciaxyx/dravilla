<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( 'no' !== $sliderPagination ) {

	if ( isset( $uniqueClass ) && ! empty( $uniqueClass ) ) {
		$pagination_classes = 'qodef-swiper-pagination-outside swiper-pagination-' . esc_attr( $uniqueClass );
	}
	?>
	<div class="swiper-pagination <?php echo esc_attr( $pagination_classes ); ?>"></div>
<?php } ?>
