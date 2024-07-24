(function($) {
	'use strict';

	$(window).on('load', qodeOnWindowLoad);

	/*
	 ** All functions to be called on $(window).load() should be in this function
	 */
	function qodeOnWindowLoad() {
        qodeInitElementorLineGraph();
	}

	function qodeInitElementorLineGraph(){
		$(window).on('elementor/frontend/init', function () {
			elementorFrontend.hooks.addAction( 'frontend/element_ready/bridge_line_graph.default', function() {
				qode.modules.lineGraph.qodeLineGraph();
			} );
		});
	}

})(jQuery);
