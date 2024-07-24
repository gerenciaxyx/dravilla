<?php if ( ! post_password_required() ) { ?>
	<div class="qodef-e-read-more">
		<?php
		$params['button_link']    = array( 'url' => get_the_permalink() );
		$params['button_classes'] = qi_blocks_button_get_holder_classes( $params );
		$params['icon_classes']   = qi_blocks_button_get_icon_classes( $params );
		$params['buttonText']     = ! empty( $buttonText ) ? esc_html( $buttonText ) : esc_html__( 'Read More', 'qi-blocks' );
		$params['data_attrs']     = array( 'target' => '_self' );

		qi_blocks_template_part( 'blocks/button', 'variations/' . $buttonType . '/templates/button', '', $params );
		?>
	</div>
<?php } ?>
 