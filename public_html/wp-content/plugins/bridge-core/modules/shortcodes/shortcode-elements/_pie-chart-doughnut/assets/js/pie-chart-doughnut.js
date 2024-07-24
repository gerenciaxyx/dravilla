(function ($) {
	'use strict';
	
	var pieChartDoughnut = {};
	qode.modules.pieChartDoughnut = pieChartDoughnut;

	pieChartDoughnut.qodePieChartDoughnut = qodePieChartDoughnut;
	pieChartDoughnut.qodeOnDocumentReady = qodeOnDocumentReady;

	 $(document).ready(qodeOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodeOnDocumentReady() {
		qodePieChartDoughnut();
	}
	
	
	function qodePieChartDoughnut() {
		
		var holder = $('.q-pie-chart-doughnut');
		
		if (holder.length) {

			holder.each(function () {
				var pieChart = $(this).find('.q_pie_graf'),
					canvasPieChart = pieChart.find('canvas');

				var pieChartValues = typeof pieChart.data('values') !== 'undefined' ? pieChart.data('values') : [],
				 	pieChartColors = typeof pieChart.data('colors') !== 'undefined' ? pieChart.data('colors') : [];

				// var pieChartDoughnutObject = new Chart(
				// 	canvasPieChart[0].getContext('2d')).Doughnut( pieChartOptions, {
				// 		segmentStrokeColor : 'transparent'
				// 	});

				var data = {
					datasets: [{
						data: pieChartValues,
						backgroundColor: pieChartColors,
						hoverBackgroundColor: pieChartColors,
						borderWidth: 0,
					}]
				};

				canvasPieChart.appear(function () {

					var pieChartDoughnutObject = new Chart(canvasPieChart[0].getContext('2d'), {
						type: 'doughnut',
						data: data,
						options: {
							responsive: true,
							aspectRatio: 1,
							plugins: {
								legend: {
									display: false,
								},
								tooltips: {
									enabled: false,
								},
							},
							animation: {
								easing: "easeOutBounce",
								duration: 1500
							}
						},
						segmentStrokeColor : 'transparent'
					});

				},{accX: 0, accY: -200});

				});



		}

	}

})(jQuery);
