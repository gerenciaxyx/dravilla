<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

if ( has_post_thumbnail() ) {
	?>
	<div class="qodef-e-media-image">
		<a href="<?php the_permalink(); ?>">
			<?php
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo qi_blocks_get_post_image( get_the_id(), $imagesProportion, intval( $customImageWidth ), intval( $customImageHeight ) );
			?>
		</a>
	</div>
<?php } ?>
