<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$showInfoIcons = isset( $showInfoIcons ) && ! empty( $showInfoIcons ) ? $showInfoIcons : 'no';
$date_link     = empty( get_the_title() ) && ! is_single() ? get_the_permalink() : get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) );
$date_day      = 'j';
$date_month    = 'M';
?>
<div class="qodef-e-info-item qodef-e-info-date">
	<a href="<?php echo esc_url( $date_link ); ?>">
		<?php echo esc_html( get_the_time( $date_day ) . ' ' . get_the_time( $date_month ) ); ?>
	</a>
</div>
