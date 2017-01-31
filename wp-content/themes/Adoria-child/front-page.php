<?php 

/* Template Name: front-page */ 


/* Call Header Template Part */
get_header(); 


/* Call Redux Global Var */
global $adoria;

extract( $adoria );

?>

<!-- Slider section -->

<div class="container carousel-home-container slider-home-page">
	<h1 class="text-uppercase text-center main_slogan">
		We Do Adorable Apps And <br> Development Services
	</h1>

	<?php if ( isset( $adoria_slider_shortcode ) && $adoria_slider_shortcode ): ?>

		<div id="carousel-home" class="carousel carousel-home slide" data-ride="carousel">

 			<?php echo do_shortcode( '[bc_slick_slider id='.$adoria_slider_shortcode.']' ); ?>

		</div>

	<?php endif; ?>

	<div class="text-center">
		<a href="#" class="text-uppercase h4 scrollToIndustry">and much more
			<br>
			<img class="arrowDown " data-src="<?php echo get_stylesheet_directory_uri() ?>/images/arrow-down.svg" alt="arrow-down">
		</a>
	</div>
</div>

<!-- Slider section end -->


<!-- MAIN CONTAINER  -->

<div class="container">

	<!-- Directions section -->

	<?php if ( isset( $adoria_directions ) && count( $adoria_directions ) ) : ?>

		<div class="panel panel-container" id="industrySection">
			<div class="panel-body solutions_panel">
				<ul class="nav nav-pills nav-justified nav-solutions">	

					<?php foreach ( $adoria_directions as $direction ) : extract( $direction ); ?>
				
						<li>
							<a href="#" onclick="return false;">
								<i class="<?php echo $adoria_direction_icon; ?>"></i> 
								<?php echo $adoria_direction_title; ?>
							</a>
						</li>
							
					<?php endforeach; ?>

				</ul>
			</div>
		</div>

	<?php endif; ?>

	<!-- Directions section end -->
	

	<!-- Information section  -->

	<div class="panel panel-container">
		<div class="panel-body employ">

		<?php if ( isset( $adoria_info_title ) ) : ?>

			<h2 class="text-uppercase text-center"><?php echo $adoria_info_title; ?></h2>

		<?php endif;?>

		<?php if ( isset( $adoria_info_subtitle ) ) : ?>

			<p class="lead text-uppercase text-center"><?php echo $adoria_info_subtitle; ?></p>

		<?php endif;?>

		<?php if ( isset( $adoria_info_text ) ) : ?>

			<p class="employ_text"><?php echo $adoria_info_text; ?></p>

		<?php endif;?>

			<div class="row">
				<div class="col-md-7 col-sm-12 col-xs-12 circles_row">
					<div class="row">

						<?php if ( isset( $adoria_employees_phd ) ) : ?>
						
							<div class="col-md-6 col-sm-6 col-xs-12">
						
								<div id="employees">
									<strong style="width: 50%;height: 40%;margin: auto;position: absolute;top: 0;left: 0;bottom: 0;right: 0;font-size: 28px;">
										<?php echo $adoria_employees_phd; ?><i>%</i>
									</strong>
								</div>
								<p class="empl_sign">Employees with PhD in Computer Science</p>

							</div>

						<?php endif;?>

						<?php if ( isset( $adoria_employees_fluent_english ) ) : ?>

							<div class="col-md-6 col-sm-6 col-xs-12">

								<div id="s_circle">
									<strong style="width: 50%;height: 40%;margin: auto;position: absolute;top: 0;left: 0;bottom: 0;right: 0;font-size: 28px;">
										<?php echo $adoria_employees_fluent_english; ?><i>%</i>
									</strong>
								</div>
								<p class="empl_sign">Employees with Fluent English</p>

							</div>

						<?php endif;?>

					</div>
				</div>
				<div class="col-md-5 col-sm-12 col-xs-12">

					<p class="empl_sign" style="clear: both;margin-top: 0px; font-size: 28px;">Our clients location</p>
					<div id="locations">
					</div>

				</div>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12">

							<a href="<?php echo (isset($adoria_people_per_hour_link)? $adoria_people_per_hour_link: '#'); ?>">
								<img data-src="<?php echo get_stylesheet_directory_uri(); ?>/images/Elance.png" class="loadingImg" width="170" alt="Elance">
							</a>

						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">

							<a href="<?php echo (isset($adoria_upwork_link)? $adoria_upwork_link: '#'); ?>">
								<img data-src="<?php echo get_stylesheet_directory_uri(); ?>/images/Upwork.png" class="loadingImg" width="170" alt="Upwork">
							</a>

						</div>
					</div>
				</div>
				<div class="col-md-5 col-sm-12 col-xs-12 text-center">
					<p>Not yet impressed? </p>

					<?php if ( isset( $adoria_learn_more_link ) ) : ?>

						<p><a href="<?php echo $adoria_learn_more_link; ?>" class="btn btn-link">Learn more &gt;</a></p>

					<?php endif;?>

				</div>
			</div>
		</div>
	</div>

	<!-- Information section end  -->


	<!-- Testimonials section  -->

	<div class="panel panel-container">
		<div class="panel-body partners">
			<div class="row">
				<div class="col-md-4">

					<?php if ( isset( $adoria_project_count ) ) : ?>

						<h1 class="h1"><?php echo $adoria_project_count; ?>+</h1>

					<?php endif;  ?>

					<?php if ( isset( $adoria_testimonials_left_list ) && count (  $adoria_testimonials_left_list ) ) : ?>
						<p>

							<?php foreach ($adoria_testimonials_left_list as $item): ?>
							
								<?php echo $item; ?> <br>

							<?php endforeach; ?>

						</p>

					<?php endif;  ?>

					<?php if ( isset( $adoria_read_all_link ) ) : ?>

						<p>
							<a href="<?php echo $adoria_read_all_link; ?>">
								Read all <br> success stories
							</a>
						</p>

					<?php endif;  ?>

				</div>

				<div class="col-md-8">

				<?php 

				/* Testimonial Slider */

				if ( isset( $adoria_testimonials ) && count($adoria_testimonials) ): ?>

					<div class="slider-testimonial">

					<?php foreach ( $adoria_testimonials as $testimonial ): extract($testimonial); ?>
						<div>
							<p class="small">
								<?php echo ($adoria_testimonial_text)? $adoria_testimonial_text: '' ?>
							</p>
							<h4 class="text-center">
								<?php echo ($adoria_testimonial_title)? $adoria_testimonial_title: '' ?>
							</h4>
						</div>
					<?php endforeach; ?>

					</div>

					<div class="slider-testimonial-nav">

					<?php foreach ( $adoria_testimonials as $testimonial ): extract($testimonial); 
						 $imgAlt = get_post_meta( $adoria_testimonial_icon['id'], '_wp_attachment_image_alt', true );
					?>

						<div>
							<img data-src="<?php echo (isset($adoria_testimonial_icon['url'])? $adoria_testimonial_icon['url'] : '') ?>" height="<?php echo (isset($adoria_testimonial_icon['height'])? $adoria_testimonial_icon['height'] : '35') ?>" class="loadingImg" alt="<?php echo $imgAlt; ?>">
						</div>

					<?php endforeach; ?>
						 
					</div>

				<?php 

				/* Testimonial Slider End */

				endif; ?>

				</div>
			</div>
		</div>
	</div>

	<!-- Testimonials section end -->


	<!-- Latest works section  -->
	<?php if ( isset( $adoria_latest_work ) && is_array( $adoria_latest_work ) && count( $adoria_latest_work ) ): ?>

	<div class="panel panel-container">
		<div class="panel-body">
			<h2 class="text-uppercase text-center"><?php echo ( isset($adoria_latest_works_title)? $adoria_latest_works_title :'Latest works'); ?></h2>
			<div class="row latest-works">
				<?php foreach ( $adoria_latest_work as $work_id ): 

					$industry = wp_get_post_terms( $work_id, 'portfolio_industries', array( 'count'=>true, 'number' => 1 ) );
					$imgAlt = get_post_meta( get_post_thumbnail_id($work_id) , '_wp_attachment_image_alt', true );
				?>

					<div class="col-md-3 col-sm-6 col-xs-12">
						<a href="<?php echo get_the_permalink($work_id) ; ?>">
							<div class="latest-works-block">
								<div class="project_hov_back"></div>
	                            <span class="project_hov">
	                                    <h6><?php echo get_the_title( $work_id ); ?></h6>
	                                    <hr class="hor_white">

	                                    <?php if ( isset( $industry['0'] ) ): ?>

	                                    	<span><?php echo $industry['0']->name; ?></span>
	                                    	
	                                    <?php endif; ?>
	                            </span>
								<img class="img-responsive loadingImg" data-src="<?php echo get_the_post_thumbnail_url($work_id) ; ?>" alt="<?php echo $imgAlt; ?>">
							</div>
						</a>
					</div>

				<?php endforeach; ?>
				
				<?php if ( isset( $adoria_latest_works_link ) ): ?>

					<div class="col-md-12 col-sm-12 col-xs-12 text-center">
						<a href="<?php echo $adoria_latest_works_link; ?>">
							<div class="round_blue_btn">
								<i class="fa fa-chevron-right"></i>
							</div>
						</a>
					</div> 

				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php endif; ?>
	<!-- Latest works section end -->

</div>

<!-- MAIN CONTAINER END -->


<!-- Contacts Section  -->

<div class="container pre-footer text-uppercase text-center">
	<h2><?php echo ( isset($adoria_contact_section_title)? $adoria_contact_section_title : ''); ?></h2>
	<h3><?php echo ( isset($adoria_contact_section_subtitle)? $adoria_contact_section_subtitle : ''); ?></h3>
	<button onclick="window.location='<?php echo ( isset($adoria_contact_section_link)? $adoria_contact_section_link : '/'); ?>'"class="btn btn-primary">Get in touch now</button>
</div>

<!-- Contacts Section End -->


<?php get_footer(); ?>