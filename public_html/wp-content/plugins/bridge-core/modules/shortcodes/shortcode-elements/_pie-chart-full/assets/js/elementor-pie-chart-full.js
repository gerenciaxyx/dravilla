(function($) {
	'use strict';

	$(window).on('load', qodeOnWindowLoad);

	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function qodeOnWindowLoad() {
        qodeInitElementorPieChartFull();
	}

	function qodeInitElementorPieChartFull(){
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_pie_chart_full.default', function() {
				qode.modules.pieChartFull.qodePieChartFull();
			} );
		});
	}

})(jQuery);
