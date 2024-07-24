<?php $allowed_page_builder_categories = array( 'wpbakery', 'elementor', 'gutenberg' ); ?>

<div class="wrap about-wrap qodef-core-dashboard">
	<h1 class="qodef-cd-title"><?php esc_html_e('Import', 'bridge-core'); ?></h1>
	<h4 class="qodef-cd-subtitle"><?php esc_html_e('You can import the theme demo content here.', 'bridge-core'); ?></h4>
	<div class="qodef-core-dashboard-inner">
		<div class="qodef-cd-demos-list qodef-cd-demos-masonry qodef-cd-demos-four-columns qodef-cd-medium-space">
			<?php echo bridge_core_get_module_template_part('sub-pages/import/templates/filter', 'core-dashboard', '', $params); ?>
			<div class="qodef-cd-demos-list-inner">
				<div class="qodef-cd-grid-sizer"></div>
				<div class="qodef-cd-grid-gutter"></div>
				<?php foreach($demos_list as $demo_key => $demo) {
					if( isset( $demo['should_render'] ) && $demo['should_render'] == false ) {
						continue;
					} else {
						$item_has_related_demos = ! empty( $demo['related_demos'] ) && is_array( $demo['related_demos'] ) && count( $demo['related_demos'] ) > 0;
						$item_category = array();
						if(isset($demo['categories'])){
							foreach ($demo['categories'] as $cat_key => $cat){
								$item_category[] = 'demo-category-' . $cat_key;
							}
						}
						if( $item_has_related_demos ) {
							foreach( $demo['related_demos'] as $related_demo_id => $related_demo_plugin ) {
								$related_demo_categories = $demos_list[$related_demo_id]['categories'];

								foreach( $related_demo_categories as $cat_key => $cat ){
									if( in_array( $cat_key, $allowed_page_builder_categories ) ) {
										$item_category[] = 'demo-category-' . $cat_key;
									}
								}
							}
						}
						?>
						<article class="qodef-cd-demo-item <?php echo implode(' ', $item_category); ?>">
							<div class="qodef-cd-demo-item-inner">
								<div class="qodef-cd-di-image">
									<img src="https://export.qodethemes.com/bridge-admin/images/demos/<?php echo esc_attr($demo_key); ?>.jpg" />
									<div class="qodef-cd-di-image-overlay">
										<div class="qodef-cd-di-image-overlay-inner">
											<?php if( $item_has_related_demos ) { ?>
												<div class="qodef-cd-di-image-links-holder">
													<div class="qodef-cd-di-image-link">
														<a href="#" class="qodef-cd-demo-item-link" data-demo-id="<?php echo esc_attr( $demo_key ); ?>">
														<?php echo esc_html__('WPBakery', 'bridge-core'); ?>
														<svg x="0px" y="0px" width="7.918px" height="7.917px" viewBox="0 0 7.918 7.917" enable-background="new 0 0 7.918 7.917" xml:space="preserve">
																<g>
																	<path fill="#231F20" d="M7.918,0.575v4.991c0,0.144-0.055,0.269-0.162,0.377c-0.107,0.107-0.24,0.168-0.395,0.18
																		c-0.383,0-0.575-0.192-0.575-0.575V1.921L0.951,7.756C0.844,7.864,0.712,7.918,0.557,7.917c-0.156,0-0.287-0.054-0.396-0.162
																		C0.054,7.648,0,7.517,0,7.361c0-0.155,0.053-0.287,0.161-0.395l5.835-5.835L2.352,1.113C1.98,1.125,1.795,0.939,1.795,0.557
																		C1.783,0.186,1.969,0,2.352,0h4.991C7.726,0,7.918,0.192,7.918,0.575z"/>
																</g>
															</svg>
														</a>
													</div>
													<?php foreach( $demo['related_demos'] as $related_demo_id => $related_demo_plugin ) { ?>
														<div class="qodef-cd-di-image-link qodef-cd-di-related-demo-link">
															<a href="#" class="qodef-cd-demo-item-link" data-demo-id="<?php echo esc_attr( $related_demo_id ); ?>" data-original-demo-id="<?php echo esc_attr( $demo_key ); ?>">
																<?php echo esc_html( $related_demo_plugin ); ?>
																<svg x="0px" y="0px" width="7.918px" height="7.917px" viewBox="0 0 7.918 7.917" enable-background="new 0 0 7.918 7.917" xml:space="preserve">
																	<g>
																		<path fill="#231F20" d="M7.918,0.575v4.991c0,0.144-0.055,0.269-0.162,0.377c-0.107,0.107-0.24,0.168-0.395,0.18
																			c-0.383,0-0.575-0.192-0.575-0.575V1.921L0.951,7.756C0.844,7.864,0.712,7.918,0.557,7.917c-0.156,0-0.287-0.054-0.396-0.162
																			C0.054,7.648,0,7.517,0,7.361c0-0.155,0.053-0.287,0.161-0.395l5.835-5.835L2.352,1.113C1.98,1.125,1.795,0.939,1.795,0.557
																			C1.783,0.186,1.969,0,2.352,0h4.991C7.726,0,7.918,0.192,7.918,0.575z"/>
																	</g>
																</svg>
															</a>
														</div>
													<?php } ?>
												</div>
												<div class="qodef-cd-di-image-description-holder">
													<p><?php echo esc_html__( 'Choose page builder', 'bridge-core' ); ?></p>
												</div>
											<?php } else { ?>
												<div class="qodef-cd-di-image-link-holder">
													<div class="qodef-cd-di-image-link">
														<a href="#" class="qodef-cd-demo-item-link" data-demo-id="<?php echo esc_attr( $demo_key ); ?>">
														<?php echo esc_html__('Import Demo', 'bridge-core'); ?>
														<svg x="0px" y="0px" width="7.918px" height="7.917px" viewBox="0 0 7.918 7.917" enable-background="new 0 0 7.918 7.917" xml:space="preserve">
																<g>
																	<path fill="#231F20" d="M7.918,0.575v4.991c0,0.144-0.055,0.269-0.162,0.377c-0.107,0.107-0.24,0.168-0.395,0.18
																		c-0.383,0-0.575-0.192-0.575-0.575V1.921L0.951,7.756C0.844,7.864,0.712,7.918,0.557,7.917c-0.156,0-0.287-0.054-0.396-0.162
																		C0.054,7.648,0,7.517,0,7.361c0-0.155,0.053-0.287,0.161-0.395l5.835-5.835L2.352,1.113C1.98,1.125,1.795,0.939,1.795,0.557
																		C1.783,0.186,1.969,0,2.352,0h4.991C7.726,0,7.918,0.192,7.918,0.575z"/>
																</g>
															</svg>
														</a>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="qodef-cd-di-text">
									<h3 class="qodef-cd-di-title"><?php echo esc_attr($demo['title']); ?></h3>
									<?php if( ! empty( $demo['categories'] ) ) { ?>
										<div class="qodef-cd-di-categories">
											<?php foreach ($demo['categories'] as $cat_key => $cat) {
												if( in_array( $cat_key, $allowed_page_builder_categories ) ) { ?>
													<span><?php echo esc_html($cat); ?></span>
												<?php } ?>
											<?php } ?>

											<?php if( $item_has_related_demos ) {
												foreach( $demo['related_demos'] as $related_demo_id => $related_demo_plugin ) {
													$related_demo_categories = $demos_list[$related_demo_id]['categories'];
													foreach ( $related_demo_categories as $cat_key => $cat ) {
														if( in_array( $cat_key, $allowed_page_builder_categories ) ) { ?>
															<span><?php echo esc_html($cat); ?></span>
														<?php }
													}
												}
											} ?>
									</div>
									<?php } ?>
								</div>
							</div>
						</article>
					<?php }
					} ?>
			</div>
		</div>
	</div>
</div>
