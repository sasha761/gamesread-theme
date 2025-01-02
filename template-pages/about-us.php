<?php
/* Template Name: about us
 * Template Post Type: page
 */

$context = Timber::context();
$context['post'] = Timber::get_post();
$context['quote'] = get_field('quote');

Timber::render( array( 'template-about-us.twig' ), $context );
?>
<!-- 	<main class="p-about-us">
		<section class="l-text">
			<div class="u-container">
				<h1 class="u-h2">О нас</h1>
				<div class="row">
					<div class="col-lg-6">
						<p>Разнообразный и богатый опыт начало повседневной работы по формированию позиции способствует подготовки и реализации форм развития. Задача организации, в особенности же постоянный количественный рост и сфера нашей активности влечет за собой процесс внедрения и модернизации соответствующий условий активизации. Повседневная практика показывает, что укрепление и развитие структуры представляет собой интересный эксперимент проверки системы обучения кадров, соответствует насущным потребностям.</p>
						<p>Значимость этих проблем настолько очевидна, что сложившаяся структура организации способствует подготовки и реализации систем массового участия. Значимость этих проблем настолько очевидна, что постоянное информационно-пропагандистское обеспечение нашей деятельности в значительной степени обуславливает создание существенных финансовых и административных условий. С другой стороны консультация с широким активом требуют определения и уточнения позиций, занимаемых участниками в отношении поставленных задач.</p>
					</div>
					<div class="col-lg-6">
						<p>Идейные соображения высшего порядка, а также начало повседневной работы по формированию позиции позволяет выполнять важные задания по разработке новых предложений. Задача организации, в особенности же начало повседневной работы по формированию позиции в значительной степени обуславливает создание форм развития. Задача организации, в особенности же консультация с широким активом позволяет выполнять важные задания по разработке дальнейших направлений развития.</p>
						<p>Задача организации, в особенности же постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании форм развития. Идейные соображения высшего порядка, а также новая модель организационной деятельности влечет за собой процесс внедрения и модернизации форм развития.</p>
					</div>
				</div>
			</div>
		</section>
		
		<section class="l-quote">
			<div class="u-container">
				<h2 class="u-h1">Задача <span class="is-red">организации</span>, в особенности же постоянное информационно</h2>
			</div>
		</section>

		<div class="u-container">
			<section class="l-news-last" data-aos="fade-up" data-aos-duration="1400" data-aos-delay="350">
				<h5 class="u-h5">Интересные новости</h5>
				<div class="row js-interest-news">
					<div class="col-lg-4">
						<div class="c-news is-small is-column">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img9.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">категория</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм</p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>	
						</div>
					</div>
					<div class="col-lg-4">
						<div class="c-news is-small is-column">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img9.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">категория</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм</p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>	
						</div>								
					</div>
					<div class="col-lg-4">
						<div class="c-news is-small is-column">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img9.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">категория</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм</p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>	
						</div>								
					</div>
					<div class="col-lg-4">
						<div class="c-news is-small is-column">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img9.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">категория</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм</p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>	
						</div>								
					</div>
					<div class="col-lg-4">
						<div class="c-news is-small is-column">
							<div class="c-news__img">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/img/img9.png" alt="">
							</div>
							<div class="c-news__content">
								<span class="c-news__content-category">категория</span>
								<h3 class="u-h3">Название новости</h3>
								<p>Повседневная практика показывает, что дальнейшее развитие различных форм</p>
								<span class="c-news__content-date">24/06/2020</span>
							</div>	
						</div>								
					</div>												
				</div>
				<div class="js-interest-news-arrows"></div>
			</section>		
		</div>		
	</main> -->	