<?php
/**
 * Template Name: Sellkit Canvas
 *
 * @package Sellkit
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Plugin as Elementor;

$is_global_checkout = apply_filters( 'sellkit_global_checkout_activated', false );
$header_template    = apply_filters( 'sellkit_global_checkout_header_applied_id', 0 );
$footer_template    = apply_filters( 'sellkit_global_checkout_footer_applied_id', 0 );

if ( $is_global_checkout ) {
	remove_action( 'jupiterx_main_content_before_markup', 'jupiterx_wc_add_steps' );
}
?>

<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'sellkit' ); ?>>

	<?php wp_body_open(); ?>
	<?php
		if ( $is_global_checkout && 'default' === $header_template ) {
			get_header();
		}

		if ( $is_global_checkout && intval( $header_template ) > 0 ) {
			echo Elementor::instance()->frontend->get_builder_content_for_display( intval( $header_template ), true );
		}
	?>
	<div class="sellkit-container" >

	<?php
	while ( have_posts() ) :

		the_post();
		the_content();

	endwhile;
	?>
	</div>
	<?php
		if ( $is_global_checkout && 'default' === $footer_template ) {
			get_footer();
		}

		if ( $is_global_checkout && intval( $footer_template ) > 0 ) {
			echo Elementor::instance()->frontend->get_builder_content_for_display( intval( $footer_template ), true );
		}
	?>
	<?php wp_footer(); ?>
</body>
</html>
