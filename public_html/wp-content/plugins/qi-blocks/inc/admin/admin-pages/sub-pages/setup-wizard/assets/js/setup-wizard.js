(function ( $ ) {
	'use strict';

	$( document ).ready(
		function () {
			qodefSetupWizard.init();
		}
	);

	const qodefSetupWizard = {
		init: function () {
			const $holder = $( '.qodef-admin-page-wrapper.qodef--setup-wizard' );

			if ( $holder.length ) {
				const $form = $holder.find( '.qodef-setup-wizard-form' );

				this.initActions( $holder, $form );
				this.initConfigurationStep( $form );
				this.initElementsStep( $form );
				this.initFinalizeStep( $form );
			}
		},
		initActions: function( $holder, $form ) {
			const $actions = $holder.find( '.qodef-setup-wizard-actions' );

			if ( $actions.length ) {
				let $nextButton   = $actions.find( '.qodef-btn.qodef--next' ),
					$prevButton   = $actions.find( '.qodef-btn.qodef--prev' ),
					$skipButton   = $actions.find( '.qodef-btn.qodef--skip' ),
					$navItems	  = $form.find( '.qodef-m-nav-item' ),
					$contentItems = $form.find( '.qodef-setup-wizard-content' ),
					navItemsCount = $navItems.length;

				$nextButton.on(
					'tap click',
					function ( e ) {
						e.preventDefault();

						let newStep = parseInt( $form.attr( 'data-wizard-step' ), 10 ) + 1;
						if ( newStep > navItemsCount ) {
							newStep = navItemsCount;
						}

						$form.attr( 'data-wizard-step', newStep );

						$navItems.removeClass( 'qodef--active' );
						$navItems[newStep - 1].classList.add( 'qodef--active' );

						$contentItems.removeClass( 'qodef--active' );
						$contentItems[newStep - 1].classList.add( 'qodef--active' );

						qodefSetupWizard.setElementsStepWidgetsVisibility( $form, newStep );
					}
				);

				$prevButton.on(
					'tap click',
					function ( e ) {
						e.preventDefault();

						let newStep = parseInt( $form.attr( 'data-wizard-step' ), 10 ) - 1;
						if ( newStep < 1 ) {
							newStep = 1;
						}

						$form.attr( 'data-wizard-step', newStep );

						$navItems.removeClass( 'qodef--active' );
						$navItems[newStep - 1].classList.add( 'qodef--active' );

						$contentItems.removeClass( 'qodef--active' );
						$contentItems[newStep - 1].classList.add( 'qodef--active' );

						qodefSetupWizard.setElementsStepWidgetsVisibility( $form, newStep );
					}
				);

				$skipButton.on(
					'tap click',
					function ( e ) {
						e.preventDefault();

						qodefSetupWizard.saveForm( $form, true );
					}
				);
			}
		},
		initConfigurationStep: function ( $form ) {

			if ( $form ) {
				const $switcherItems = $form.find( '.qodef-m-elements-switcher-item' );

				$switcherItems.on(
					'tap click',
					function () {
						$switcherItems.find( '.qodef-e-input-field' ).each(
							function () {
								this.checked = false;
							}
						);

						$( this ).find( '.qodef-e-input-field' )[0].checked = true;
					}
				);
			}
		},
		initElementsStep: function ( $form ) {

			if ( $form ) {
				const $elements = $form.find( '.qodef-widgets-section .qodef-widgets-item input[type="checkbox"]' );

				$elements.on(
					'change',
					function () {

						if ( this.checked ) {
							$( this ).parents( '.qodef-widgets-item' ).addClass( 'qodef--checked' );
						}
					}
				);
			}
		},
		setElementsStepWidgetsVisibility: function ( $form ) {

			if ( $form ) {
				const $elements   	   	 = $form.find( '.qodef-widgets-section .qodef-widgets-item:not(.qodef-premium--disabled):not(.qodef--checked) input[type="checkbox"]' );
				const $premiumElements   = $form.find( '.qodef-widgets-section .qodef-widgets-item.qodef-premium--enabled:not(.qodef--checked) input[type="checkbox"]' );
				const $switcherItemValue = $form.find( '.qodef-m-elements-switcher-item .qodef-e-input-field:checked' ).val();

				if ( 'all' === $switcherItemValue ) {
					$elements.each(
						function () {
							this.checked = true;
						}
					);

					if ( $premiumElements.length ) {
						$premiumElements.each(
							function () {
								this.checked = true;
							}
						);
					}
				} else if ( 'custom' === $switcherItemValue ) {
					$elements.each(
						function () {
							this.checked = false;
						}
					);

					if ( $premiumElements.length ) {
						$premiumElements.each(
							function () {
								this.checked = false;
							}
						);
					}
				}
			}
		},
		initFinalizeStep: function ( $form ) {

			if ( $form ) {
				const $formButtons = $form.find( '.qodef-setup-wizard-form-trigger' );

				$formButtons.on(
					'tap click',
					function ( e ) {
						e.preventDefault();

						const $currentTrigger = $( this );

						$currentTrigger.siblings( '.qodef-m-user-stats' ).val( $currentTrigger.attr( 'data-stats' ) );

						qodefSetupWizard.saveForm( $form );
					}
				);
			}
		},
		saveForm: function ( $form, skipTrigger = false ) {
			let ajaxData = {
				action: 'qi_blocks_action_setup_wizard_save_options',
				skip_trigger: skipTrigger ? true : '',
			};

			document.body.classList.add( 'qodef-setup-wizard--ajax-begin' );

			$.ajax(
				{
					type: 'POST',
					url: ajaxurl,
					cache: ! 1,
					data: $.param( ajaxData, ! 0 ) + '&' + $form.serialize(),
					success: function ( data ) {
						const response = $.parseJSON( data );

						// Wait a little for thank you popup visibility.
						setTimeout(
							function () {
								document.body.classList.add( 'qodef-setup-wizard--ajax-finished' );

								if ( response.status === 'success' ) {
									window.location = response.data.redirect_url;
								}

								setTimeout(
									function () {
										document.body.classList.remove( 'qodef-setup-wizard--ajax-begin' );
										document.body.classList.remove( 'qodef-setup-wizard--ajax-finished' );
									},
									200
								);
							},
							1000
						);
					}
				}
			);
		},
	}

})( jQuery );
