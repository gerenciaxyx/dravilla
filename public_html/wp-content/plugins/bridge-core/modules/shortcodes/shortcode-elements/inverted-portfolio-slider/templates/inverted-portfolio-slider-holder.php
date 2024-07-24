<div class="qode-inverted-portfolio-slider swiper-container <?php if(!empty($holder_classes)) echo esc_attr($holder_classes); ?>" <?php bridge_qode_inline_attr( $slider_attr, 'data-options' ); ?>>

	<div class="swiper-wrapper">
		
		<?php
		$params['count'] = 1;
		
		if ($query_results->have_posts()) :
			$params['additional_params'] = 0;
			while ($query_results->have_posts()) : $query_results->the_post();
				echo bridge_core_get_shortcode_template_part('templates/inverted-portfolio-slider-item', 'inverted-portfolio-slider', '', $params);
				$params['additional_params']++;
				$params['count']++;
			endwhile;
		else : ?>
			<p class="qode-pls-not-found"><?php esc_html_e('Sorry, no posts matched your criteria.', 'bridge-core'); ?></p>
		<?php endif;
		wp_reset_postdata();
		?>
		
	</div>

    <div class="qode-ips-navigation-holder">
        <div class="qode-ips-button-prev">
            <span class="qode-ips-nav-arrow arrow_carrot-left"></span>
            <span class="qode-ips-nav-label qode-ips-nav-label-prev"><?php echo esc_html__('Prev', 'bridge-core')?></span>
        </div>
        <div class="qode-ips-button-next">
            <span class="qode-ips-nav-label qode-ips-nav-label-next"><?php echo esc_html__('Next', 'bridge-core')?></span>
            <span class="qode-ips-nav-arrow arrow_carrot-right"></span>
        </div>
    </div>
	
</div>