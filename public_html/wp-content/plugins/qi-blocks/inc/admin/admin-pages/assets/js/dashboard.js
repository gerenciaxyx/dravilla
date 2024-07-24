(function ( $ ) {
	'use strict';

	if ( typeof qiBlocksDashboard !== 'object' ) {
		window.qiBlocksDashboard = {};
	}

	qiBlocksDashboard.scroll      = 0;
	qiBlocksDashboard.windowWidth = $( window ).width();

	$( document ).ready(
		function () {
			qodefAdminOptionsPanel.init();
			qodefSearchWidgets.init();
			qodefWidgets.init();
			qodefDashboardForm.init();
		}
	);

	$( window ).scroll(
		function () {
			qiBlocksDashboard.scroll = $( window ).scrollTop();
		}
	);

	$( window ).resize(
		function () {
			qiBlocksDashboard.windowWidth = $( window ).width();

			if ( typeof qodefAdminOptionsPanel.adminPage !== 'undefined' && qodefAdminOptionsPanel.adminPage.length ) {
				qodefAdminOptionsPanel.adminHeader.width( qodefAdminOptionsPanel.adminPage.width() );
			}
		}
	);

	const qodefAdminOptionsPanel = {
		init: function () {
			this.adminPage = $( '.qodef-admin-page' );

			if ( this.adminPage.length ) {
				this.setPremiumLinksAttributes();
				this.adminHeaderPosition();
			}
		},
		setPremiumLinksAttributes: function() {
			const $pro 	   = $('a[href="admin.php?page=qi_blocks_pro"]'),
				$templates = $('a[href="admin.php?page=qi_templates"]');

			if ( $pro.length ) {
				$pro.attr( 'target', '_blank' );
			}

			if ( $templates.length ) {
				$templates.attr( 'target', '_blank' );
			}
		},
		adminHeaderPosition: function () {
			if ( this.adminPage.length ) {
				this.adminBarHeight = $( '#wpadminbar' ).height();
				this.adminHeader    = $( '.qodef-admin-header' );

				if ( this.adminHeader.length ) {
					this.adminHeaderHeight      = this.adminHeader.outerHeight( true );
					this.adminHeaderTopPosition = this.adminHeader.offset().top - parseInt( this.adminBarHeight, 10 );
					this.adminContent           = $( '.qodef-admin-content' );

					this.adminHeader.width( this.adminPage.width() );

					$( window ).on(
						'scroll load',
						function () {
							if ( qiBlocksDashboard.scroll >= qodefAdminOptionsPanel.adminHeaderTopPosition ) {
								qodefAdminOptionsPanel.adminHeader.addClass( 'qodef-fixed' ).css( 'top', parseInt( qodefAdminOptionsPanel.adminBarHeight, 10 ) );
								qodefAdminOptionsPanel.adminContent.css( 'marginTop', qodefAdminOptionsPanel.adminHeaderHeight );
							} else {
								qodefAdminOptionsPanel.adminHeader.removeClass( 'qodef-fixed' ).css( 'top', 0 );
								qodefAdminOptionsPanel.adminContent.css( 'marginTop', 0 );
							}
						}
					);
				}
			}
		},
	};

	const qodefSearchWidgets = {
		init: function () {
			this.searchField   = $( '.qodef-search-widget-field' );
			this.adminContent  = $( '.qodef-admin-content' );
			this.sectionHolder = $( '.qodef-widgets-section' );
			this.fieldHolder   = $( '.qodef-widgets-item' );

			if ( this.searchField.length ) {
				let searchLoading = this.searchField.next( '.qodef-search-widget-loading' ),
					searchRegex,
					keyPressTimeout;

				this.searchField.on(
					'keyup paste',
					function () {
						let field = $( this );

						field.attr( 'autocomplete', 'off' );

						searchLoading.removeClass( 'qodef-hidden' );

						clearTimeout( keyPressTimeout );

						keyPressTimeout = setTimeout(
							function () {
								let searchTerm = field.val();
								searchRegex    = new RegExp( field.val(), 'gi' );

								searchLoading.addClass( 'qodef-hidden' );

								if ( searchTerm.length < 3 ) {
									qodefSearchWidgets.resetSearchView();
								} else {
									qodefSearchWidgets.resetSearchView();
									qodefSearchWidgets.adminContent.addClass( 'qodef-apply-search' );
									qodefSearchWidgets.fieldHolder.each(
										function () {
											const thisFieldHolder = $( this );

											if ( thisFieldHolder.find( '.qodef-widgets-title' ).text().search( searchRegex ) !== -1 ) {
												thisFieldHolder.parents( '.qodef-widgets-section' ).addClass( 'qodef-search-show' );
											} else {
												thisFieldHolder.addClass( 'qodef-search-hide' );
											}
										}
									);
								}
							},
							500
						);
					}
				);
			}
		},
		resetSearchView: function () {
			this.adminContent.removeClass( 'qodef-apply-search' );
			this.sectionHolder.removeClass( 'qodef-search-show' );
			this.fieldHolder.removeClass( 'qodef-search-hide' );
		},
	};

	const qodefDashboardForm = {
		init: function () {
			this.form = $( '.qodef-dashboard-ajax-form' );

			if ( this.form.length ) {
				this.saveForm( this.form );
			}
		},
		saveForm: function ( $form ) {
			const $adminPage 		 = $form.parent(),
				$saveResetLoader = $( '.qodef-save-reset-loading' ),
				$saveSuccess     = $( '.qodef-save-success' );

			if ( $form.length ) {
				$form.on(
					'submit',
					function ( e ) {
						e.preventDefault();
						e.stopPropagation();

						$saveResetLoader.addClass( 'qodef-show-loader' );
						$adminPage.addClass( 'qodef-save-reset-disable' );

						const form     = $( this ),
							ajaxData = {
								action: 'qi_blocks_action_' + $form.data( 'action' ) + '_save_options',
							};

						$.ajax(
							{
								type: 'POST',
								url: ajaxurl,
								cache: ! 1,
								data: $.param( ajaxData, ! 0 ) + '&' + form.serialize(),
								success: function () {
									$saveResetLoader.removeClass( 'qodef-show-loader' );
									$adminPage.removeClass( 'qodef-save-reset-disable' );
									$saveSuccess.fadeIn( 300 );

									setTimeout(
										function () {
											$saveSuccess.fadeOut( 200 );
										},
										2000
									);
								}
							}
						);
					}
				);
			}
		},
	}

	const qodefWidgets = {
		init: function () {
			this.formHolder = $( '.qodef-admin-widgets-page' );

			if ( this.formHolder.length ) {
				this.switchWidgetsValuesByController( this.formHolder );
				this.switchControllerValuesByWidget( this.formHolder );
			}
		},
		switchWidgetsValuesByController: function ( $adminPage ) {
			this.optionsForm = $adminPage.find( '.qodef-dashboard-ajax-form' );

			const $sections = $adminPage.find( '.qodef-widgets-section' );

			$sections.each(
				function () {
					const $section         = $( this ),
						$sectionController = $section.find( '.qodef-section-enable' );

					$sectionController.on(
						'click',
						function () {
							$section.find( '.qodef-widgets-item:not(.qodef-premium--disabled) input:checkbox' ).prop( 'checked', $sectionController.is( ':checked' ) );
						}
					);
				}
			);
		},
		switchControllerValuesByWidget: function ( $adminPage ) {
			this.optionsForm = $adminPage.find( '.qodef-dashboard-ajax-form' );

			const $sections = $adminPage.find( '.qodef-widgets-section' );

			$sections.each(
				function () {
					const $section         = $( this ),
						$sectionController = $section.find( '.qodef-section-enable' ),
						$sectionWidgets    = $section.find( '.qodef-widgets-item input:checkbox' );

					$sectionWidgets.each(
						function () {
							const $widget = $( this );

							$widget.on(
								'click',
								function () {

									if ( $sectionWidgets.not( ':checked' ).length > 0 ) {
										$sectionController.prop( 'checked', false );
									} else {
										$sectionController.prop( 'checked', true );
									}
								}
							);
						}
					);
				}
			);
		},
	};

})( jQuery );
