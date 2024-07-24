(function ($) {
	'use strict';
	
	var invertedPortfolioSlider = {};
	qode.modules.invertedPortfolioSlider = invertedPortfolioSlider;

	invertedPortfolioSlider.qodeInvertedPortfolioSlider = qodeInvertedPortfolioSlider;
	invertedPortfolioSlider.qodeOnDocumentReady = qodeOnDocumentReady;
	
	$(document).ready(qodeOnDocumentReady);

	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function qodeOnDocumentReady() {
		qodeInvertedPortfolioSlider();
	}
	
	
	function qodeInvertedPortfolioSlider() {
		
		var holder = $j('.qode-inverted-portfolio-slider');
		
		if (holder.length) {
			
			holder.each(function () {
				var sliderOptions = typeof $j(this).data('options') !== 'undefined' ? $j(this).data('options') : {},
					autoplay = sliderOptions.autoplay !== undefined && sliderOptions.autoplay !== '' ? sliderOptions.autoplay : true,
					mousewheel = sliderOptions.mousewheel !== undefined && sliderOptions.mousewheel !== '' ? sliderOptions.mousewheel : false,
					speed = sliderOptions.speed !== undefined && sliderOptions.speed !== '' ? parseInt(sliderOptions.speed, 10) : 5000,
					speedAnimation = sliderOptions.speedAnimation !== undefined && sliderOptions.speedAnimation !== '' ? parseInt(sliderOptions.speedAnimation, 10) : 800,
					loop = sliderOptions.loop !== undefined && sliderOptions.loop !== '' ? sliderOptions.loop : true,
					drag = sliderOptions.enableDrag !== undefined && sliderOptions.enableDrag !== '' && sliderOptions.enableDrag == 'yes' ? 1 : 0,
					slidesPerView =  sliderOptions.slidesPerView !== undefined && sliderOptions.slidesPerView !== '' ? sliderOptions.slidesPerView : 'auto',
					grabCursor = drag == '0' ? false : true;
				
				if (autoplay === true) {
					autoplay = {
						delay: speed,
						disableOnInteraction: false
					};
				}
				
				var mySwiper = new Swiper ('.swiper-container', {
					slideEffect: 'fade',
					loop: loop,
					slidesPerView: slidesPerView,
					centeredSlides: false,
					autoplay: autoplay,
					spaceBetween: 0,
					mousewheel: mousewheel,
					speed: speedAnimation,
					touchRatio: drag,
					grabCursor: grabCursor,
					navigation: {
						nextEl: '.qode-ips-button-next',
						prevEl: '.qode-ips-button-prev',
					},
				})
			})
		}
	}

})(jQuery);