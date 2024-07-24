<div <?php wc_product_class( $item_classes ); ?>>
	<div class="qodef-e-product-inner">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="qodef-e-product-image">
				<div class="qodef-e-product-image-holder">
					<?php qi_blocks_template_part( 'woocommerce', 'templates/parts/post-info/mark', '', $params ); ?>
					<?php qi_blocks_template_part( 'woocommerce', 'templates/parts/post-info/image', '', $params ); ?>
				</div>
				<?php qi_blocks_template_part( 'woocommerce', 'templates/parts/post-info/link' ); ?>
				<div class="qodef-e-product-image-inner">
					<?php qi_blocks_template_part( 'woocommerce', 'templates/parts/post-info/add-to-cart', '', $params ); ?>
				</div>
			</div>
		<?php } ?>
		<div class="qodef-e-product-content">
			<div class="qodef-e-product-heading">
				<?php qi_blocks_template_part( 'woocommerce', 'templates/parts/post-info/title', '', $params ); ?>
				<?php qi_blocks_template_part( 'woocommerce', 'templates/parts/post-info/price', '', $params ); ?>
			</div>
			<?php qi_blocks_template_part( 'woocommerce', 'templates/parts/post-info/category', '', $params ); ?>
			<?php qi_blocks_template_part( 'woocommerce', 'templates/parts/post-info/rating', '', $params ); ?>
		</div>
	</div>
</div>
