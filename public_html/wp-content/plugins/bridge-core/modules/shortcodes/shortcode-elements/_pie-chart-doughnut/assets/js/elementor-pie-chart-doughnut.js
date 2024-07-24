(function($) {
	'use strict';

	$(window).on('load', qodeOnWindowLoad);

	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function qodeOnWindowLoad() {
        qodeInitElementorPieChartDoughnut();
	}

	function qodeInitElementorPieChartDoughnut(){
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_pie_chart_doughnut.default', function() {
				qode.modules.pieChartDoughnut.qodePieChartDoughnut();
			} );
		});
	}

})(jQuery);
