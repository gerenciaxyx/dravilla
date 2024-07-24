<?php

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly.
	exit;
}

$title_tag = isset( $titleTag ) && ! empty( $titleTag ) ? $titleTag : 'h4';
?>
<<?php echo qi_blocks_escape_title_tag( $title_tag ); ?> itemprop="name" class="qodef-e-product-title qodef-e-title entry-title">
	<a itemprop="url" class="qodef-e-product-title-link" href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
</<?php echo qi_blocks_escape_title_tag( $title_tag ); ?>>
