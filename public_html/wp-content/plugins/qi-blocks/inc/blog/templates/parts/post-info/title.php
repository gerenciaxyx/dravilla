<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$title_tag = isset( $titleTag ) && ! empty( $titleTag ) ? $titleTag : 'h1';
?>
<<?php echo qi_blocks_escape_title_tag( $title_tag ); ?> class="qodef-e-title">
	<a class="qodef-e-title-link" href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
</<?php echo qi_blocks_escape_title_tag( $title_tag ); ?>>
