<?php
/* Template Name: category
 * Template Post Type: page
 */

$context = Timber::context();
$context['post'] = Timber::get_post();
$context['repeater'] = get_field('repeater');

Timber::render( array( 'template-archive.twig' ), $context );
?>

<!-- 	<main class="p-category">
		<section class="l-info" data-aos="fade-right">
			<div class="u-container">
				<div class="l-info__row">
					<div class="c-virus">
						<div class="c-virus__country">
							<span class="u-h4">Коронавирус в Украине</span>
						</div>
						<div class="c-virus__date">
							Данные на 24.06.2020/09:00
						</div>
						<div class="c-virus__content">
							<div class="c-virus__stata is-sick">
								<p>9572<sup class="is-small">+253</sup></p>
								<span>Заболели</span>
							</div>
							<div class="c-virus__stata is-health">
								<p>5498<sup class="is-small">+791</sup></p>
								<span>Выздоровели</span>
							</div>
							<div class="c-virus__stata is-die">
								<p>1621<sup class="is-small">+3</sup></p>
								<span>Умерли</span>
							</div>										
						</div>
					</div>
					<div class="c-cash">
						<p class="u-h4">Курс валют</p>
						<div class="c-cash__row">
							<div class="c-cash__box">
								<div class="c-cash__col">
									<span class="c-cash__col-head">Валюта</span>
									<span class="c-cash__col-value">USD</span>
									<span class="c-cash__col-value">EUR</span>
								</div>
								<div class="c-cash__col">
									<div class="c-cash__col-head">Покупка</div>
									<div class="c-cash__col-value">26.5073</div>
									<div class="c-cash__col-value">29.7461</div>
								</div>
								<div class="c-cash__col">
									<div class="c-cash__col-head">Продажа</div>
									<div class="c-cash__col-value">26.7229</div>
									<div class="c-cash__col-value">30.1802</div>
								</div>						
							</div>
							<div class="c-cash__box">
								<div class="c-cash__col">
									<span class="c-cash__col-head">Валюта</span>
									<span class="c-cash__col-value">USD</span>
									<span class="c-cash__col-value">EUR</span>
								</div>
								<div class="c-cash__col">
									<div class="c-cash__col-head">Покупка</div>
									<div class="c-cash__col-value">26.5073</div>
									<div class="c-cash__col-value">29.7461</div>
								</div>
								<div class="c-cash__col">
									<div class="c-cash__col-head">Продажа</div>
									<div class="c-cash__col-value">26.7229</div>
									<div class="c-cash__col-value">30.1802</div>
								</div>						
							</div>	
						</div>				
					</div>
				</div>
			</div>
			<marquee class="l-info__news" scrolldelay="0" direction="left" scrollamount="7">Бегущая строка Бегущая строка новостей Бегущая строка новостей Бегущая строка новостей Бегущая строка новостей Бегущая строка новостей Бегущая строка новостей Бегущая строка новостей Бегущая строка новостей строка новостей</marquee>
		</section>
		<div class="u-container">
			<section class="l-news is-3">
				<div class="c-section-category is-active">Категория</div>
				<hr>
				<div class="row">
					<div class="col-lg-8 col-md-8 d-none d-md-block" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
						<div class="c-news is-big" data-aos="fade-up">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img1.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">COVID-19</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм деятельности</p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-md-block d-sm-flex d-block js-news-3" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="450">
						<div class="c-news is-medium u-col">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img2.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">Бизнес</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм </p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>
						</div>
						<div class="c-news is-medium">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img2.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">категория</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм </p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>
						</div>							
					</div>
				</div>
			</section>

			<section class="l-news is-3">
				<div class="c-section-category">Бизнес</div>
				<hr>
				<div class="row">
					<div class="col-lg-8 col-md-8 d-none d-md-block" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
						<div class="c-news is-big" data-aos="fade-up">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img1.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">COVID-19</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм деятельности</p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-md-block d-sm-flex d-block js-news-3" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="450">
						<div class="c-news is-medium u-col">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img2.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">Бизнес</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм </p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>
						</div>
						<div class="c-news is-medium">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img2.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">категория</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм </p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>
						</div>							
					</div>
				</div>					
			</section>

			<section class="l-news is-3">
				<div class="c-section-category">Мода</div>
				<hr>
				<div class="row">
					<div class="col-lg-8 col-md-8 d-none d-md-block" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
						<div class="c-news is-big" data-aos="fade-up">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img1.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">COVID-19</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм деятельности</p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-12 d-md-block d-sm-flex d-block js-news-3" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="450">
						<div class="c-news is-medium u-col">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img2.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">Бизнес</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм </p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>
						</div>
						<div class="c-news is-medium">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img2.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">категория</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм </p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>
						</div>							
					</div>
				</div>	
			</section>

			
		</div>		
	</main> -->
