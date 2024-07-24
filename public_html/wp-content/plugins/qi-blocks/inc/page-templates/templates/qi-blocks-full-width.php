<?php
/*
Template Name: Qi Blocks Full Width
*/

get_header();

// Hook to include additional content before page content wrapper.
do_action( 'qi_blocks_action_before_page_content_wrapper' );
?>
	<main id="qodef-blocks-page-content">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) :
				the_post();

				// Hook to include additional content before page content.
				do_action( 'qi_blocks_action_before_page_content' );

				the_content();

				// Hook to include additional content after page content.
				do_action( 'qi_blocks_action_after_page_content' );

			endwhile;
		}
		?>
	</main>
<?php
// Hook to include additional content after main page content wrapper.
do_action( 'qi_blocks_action_after_page_content_wrapper' );

get_footer();
