<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( 'no' !== $sliderNavigation ) {
	?>
	<div class="swiper-button-prev"><?php qi_blocks_template_part( 'slider', 'templates/parts/arrow-left', '', $params ); ?></div>
	<div class="swiper-button-next"><?php qi_blocks_template_part( 'slider', 'templates/parts/arrow-right', '', $params ); ?></div>
<?php } ?>
