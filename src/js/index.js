import '../scss/main.scss';
import 'swiper/css/bundle';
import Swiper from 'swiper/bundle';
import LazyLoad from 'vanilla-lazyload';

document.addEventListener("DOMContentLoaded", function() {   
	window.lazyLoadInstance = new LazyLoad({
    cancel_on_exit: false,
    threshold: 150,
    unobserve_entered: true
  });

	const newsSlider = document.querySelectorAll('.js-interest-news');
	const popularSlider = document.querySelectorAll('.js-most-popular');
	const bannerSlider = document.querySelectorAll('.js-banner-slider');

	if (bannerSlider.length) {
		bannerSlider.forEach(slider => {new Swiper(slider, {autoplay: {delay: 2500, stopOnLastSlide: false,} })});
	}

	if (newsSlider.length) {
		newsSlider.forEach(slider => {
			let sliderContainer = slider.closest('.l-news-last');
			let sliderArrows = sliderContainer.querySelector('.c-arrow');
			let navArrows = false;
			let countArrows = false;

			if (sliderArrows) {
				let next = sliderArrows.querySelector('.js-next');
				let prev = sliderArrows.querySelector('.js-prev');
				let countEl = sliderArrows.querySelector('.c-arrow__count');

				navArrows = {
					nextEl: next,
					prevEl: prev
				}
				countArrows = {
					el: countEl,
					type: "fraction",
				}
			}

			new Swiper(slider, {
				slidesPerView: 'auto',
				watchOverflow: true,
				autoplay: {
					delay: 2500,
					stopOnLastSlide: false,
					disableOnInteraction: true,
				},
				navigation: navArrows,
				pagination: countArrows,
			})
		})
	}

	if (popularSlider.length) {
		popularSlider.forEach(slider => {
			let sliderContainer = slider.closest('.c-most-popular');
			let sliderArrows = sliderContainer.querySelector('.c-arrow');
			let navArrows = false;
			let countArrows = false;

			if (sliderArrows) {
				let next = sliderArrows.querySelector('.js-next');
				let prev = sliderArrows.querySelector('.js-prev');
				let countEl = sliderArrows.querySelector('.c-arrow__count');

				navArrows = {
					nextEl: next,
					prevEl: prev
				}
				countArrows = {
					el: countEl,
					type: "fraction",
				}
			}

			new Swiper(slider, {
				autoHeight: false,
				slidesPerView: 1,
				grid: {
					rows: 6,
				},
				spaceBetween: 10,
				autoplay: {
					delay: 2500,
					stopOnLastSlide: false,
					disableOnInteraction: true,
				},
				navigation: navArrows,
				pagination: countArrows,
			})
		})
	}

	if (document.querySelector('.js-starts')) {
		const starContainer	= document.querySelector('.js-starts');
		const starSelect = document.querySelector('.js-starts-select');
		let stars = document.querySelectorAll('.js-starts a');

		starContainer.addEventListener('click', (event) => {
			if (event.target.classList.contains('u-star')) {
				event.preventDefault();
				starContainer.classList.add('selected');

				stars.forEach((star, index) => {
					star.classList.remove('active');
				});

				event.target.classList.add('active');


				starSelect.value = event.target.text;
				starSelect.querySelector('option:checked').removeAttribute("selected");
		 		starSelect.querySelector('option[value="' + event.target.text + '"]').setAttribute("selected", "selected");

			}
		});
	}
});