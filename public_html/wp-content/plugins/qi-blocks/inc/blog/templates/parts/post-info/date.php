<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$showInfoIcons = isset( $showInfoIcons ) && ! empty( $showInfoIcons ) ? $showInfoIcons : 'no';
$date_link     = empty( get_the_title() ) && ! is_single() ? get_the_permalink() : get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) );
?>
<div class="qodef-e-info-item qodef-e-info-date">
	<a href="<?php echo esc_url( $date_link ); ?>">
		<?php if ( 'yes' === $showInfoIcons ) { ?>
			<svg class="qodef-e-info-item-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 14.6 14.6" xml:space="preserve"><path d="M10.9,1.3V0.2h-0.6v1.2H4.3V0.2H3.7v1.2H0.2v13.1h14.3V1.3H10.9z M10.9,1.9v1.2h-0.6V1.9H10.9z M4.3,1.9v1.2H3.7V1.9H4.3z M13.8,13.8H0.8V4.9h13.1V13.8z"/></svg>
		<?php }	?>
		<?php the_time( get_option( 'date_format' ) ); ?>
	</a>
</div>
