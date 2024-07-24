<?php if ( ! post_password_required() ) { ?>
	<div class="qode-read-more">
		<?php
        $portfolio_link = get_the_permalink();
        $portfolio_link_target = '_self';
        $portfolio_external_link = get_post_meta(get_the_ID(), 'qode_portfolio-external-link', true);
        $portfolio_external_link_target = get_post_meta(get_the_ID(), 'qode_portfolio-external-link-target', true);

        if( ! empty( $portfolio_external_link ) ){
            $portfolio_link = $portfolio_external_link;
        }

        if( ! empty( $portfolio_external_link_target ) ){
            $portfolio_link_target = $portfolio_external_link_target;
        }
		
		echo bridge_core_get_button_v2_html(
			array(
				'type'         => 'simple',
				'link'         => $portfolio_link,
				'target'       => $portfolio_link_target,
				'text' => esc_html__( 'Know More', 'bridge-core' )
			)
		);
		?>
	</div>
<?php } ?>