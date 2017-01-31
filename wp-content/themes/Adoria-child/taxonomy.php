<?php /* Template Name: success-stories */ 

get_header();

global $adoria;
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
 
extract($adoria);

?>
<div class="container-fluid">
	<div class="container">	
		<div class="panel-body container filters">
			<?php the_breadcrumb(); ?>
			<hr class="hor_blue"></hr>
			<h2 class="page_title"><?php echo $term->name; ?></h2>
			<p><?php echo $term->description; ?></p>

		</div>	
				
		<div class="panel panel-container">
	        <div class="panel-body izotope-filter-block">
				<div class="row latest-works">

				<?php if ( have_posts() ) : ?> 

					<?php 	while ( have_posts() ): the_post(); ?> 
						<?php $terms_industry = wp_get_post_terms( get_the_ID(), 'portfolio_industries', array( 'number'=>1 ) ); ?>
						<?php $terms_technology = wp_get_post_terms( get_the_ID(), 'portfolio_technology', array( 'number'=>1 ) ); 
									$imgAlt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); 
						?>
						<div class="col-md-3 col-sm-6 col-xs-12 succes-story <?php echo ( isset( $terms_technology[0] )? $terms_technology[0]->slug : '' )?>-<?php echo ( isset( $terms_technology[0] )? $terms_technology[0]->term_id : '' )?> <?php echo ( isset( $terms_industry[0] )? $terms_industry[0]->slug : '' )?>-<?php echo ( isset( $terms_industry[0] )? $terms_industry[0]->term_id : '' )?>">
		                    <a href="<?php the_permalink(); ?>">
		                    	<div class="latest-works-block">
								<div class="project_hov_back"></div>
								<span class="project_hov">
							
									<h6><?php the_title(); ?></h6>
									<hr class="hor_white">
									<span><?php echo $terms_industry[0]->name; ?></span>
								</span>
		                        <img class="img-responsive loadingImg" data-src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo $imgAlt; ?>">
		                    </a>
							</div>   
						</div>

					<?php 	endwhile; ?>

				<?php endif; ?>

				</div>
			</div>
		</div>


		<div class="panel panel-container">
		    <div class="panel-body">
				<h2 class="text-center"><?php echo ( isset( $success_stories_testimonial_title )? $success_stories_testimonial_title : '' ); ?></h2>
				<h3 class="text-center"><?php echo ( isset( $success_stories_testimonial_subtitle )? $success_stories_testimonial_subtitle : '' ); ?></h3>
				<div class="row">
		            <div class="col-md-12" data-wow-delay="0.2s">
		            <?php if ( isset( $success_stories_testimonials_list ) && is_array( $success_stories_testimonials_list ) && count( $success_stories_testimonials_list ) ) : ?>            
		                <div class="carousel slide" data-ride="carousel" id="quote-carousel">

		                <!-- Bottom Carousel Indicators -->
		    
		                	<!-- Carousel Slides / Quotes -->
		                    <div class="carousel-inner text-center">

		                    <?php foreach ($success_stories_testimonials_list as $k => $testimonial ) : extract($testimonial); ?>
		                  
		                        <div class="item <?php echo ( ( $k == 1 )? 'active' : '' )?>">
		                            <blockquote>
		                                <div class="row">
		                                    <div class="col-sm-8 col-sm-offset-2">
		                                       <?php echo ( isset( $success_stories_testimonial_description )? $success_stories_testimonial_description : '' ); ?>
		                                        <small><?php echo ( isset( $success_stories_testimonial_author )? $success_stories_testimonial_author : '' ); ?></small>
		                                    </div>
		                                </div>
		                            </blockquote>
		                        </div>
							
		                    <?php endforeach; ?>

								<ol class="carousel-indicators">

								<?php foreach ($success_stories_testimonials_list as $k => $testimonial ) : extract($testimonial); 
									$imgAlt = get_post_meta( $success_stories_testimonial_author_logo['id'], '_wp_attachment_image_alt', true ); 
								?>

		                            <li data-target="#quote-carousel" data-slide-to="<?php echo $k; ?>" class="<?php echo ( ( $k == 1 )? 'active' : '' )?>">
		                            	<img class="img-responsive loadingImg" data-src="<?php echo ( isset( $success_stories_testimonial_author_logo['url'] )? $success_stories_testimonial_author_logo['url'] : '' ); ?>" alt="<?php echo $imgAlt; ?>">
		                            </li>

		                        <?php endforeach; ?>

		                        </ol>
		                    </div>

		                   

		                    <!-- Carousel Buttons Next/Prev -->
		                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
		                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
		                </div>

		            <?php endif; ?>

		            </div>
		        </div>
			</div>
		</div>
		
		<div class="container pre-footer text-uppercase text-center">
			<h2><?php echo ( isset($adoria_contact_section_title)? $adoria_contact_section_title : ''); ?></h2>
			<h3><?php echo ( isset($adoria_contact_section_subtitle)? $adoria_contact_section_subtitle : ''); ?></h3>
			<button onclick="window.location='<?php echo ( isset($adoria_contact_section_link)? $adoria_contact_section_link : '/'); ?>'"class="btn btn-primary">Get in touch now</button>
		</div>
	</div>
</div>
<?php 

get_footer();

?>