<?php 

/* Template Name: single-portfolio */ 


/* Call Header Template Part */
get_header(); 

global $post;
global $adoria;
extract($adoria);
$project_title 								= get_the_title();
$project_thumbnail 							= redux_post_meta( THEME_OPT, $post->ID, 'adoria_portfolio_main_img' );
$adoria_portfolio_description 				= redux_post_meta( THEME_OPT, $post->ID, 'adoria_portfolio_description' );
$adoria_additional_portfolio_description 	= redux_post_meta( THEME_OPT, $post->ID, 'adoria_additional_portfolio_description' );
$adoria_project_testimonials 				= redux_post_meta( THEME_OPT, $post->ID, 'adoria_project_testimonials' );
$industry									= wp_get_post_terms( $post->ID, 'portfolio_industries', array( 'count'=>true ) );
$technology									= wp_get_post_terms( $post->ID, 'portfolio_technology', array( 'count'=>true ) );
$taxes = array_merge($industry, $technology);
$toEnd = count($taxes);
?>

<div class="container-fluid">
		
	<div class="panel-body container one_product_div">
		<div class="product_image">
			<?php 
			$imgAlt = get_post_meta( $project_thumbnail['id'], '_wp_attachment_image_alt', true );
			echo ( isset( $project_thumbnail['url'] )? '<img data-src="'.$project_thumbnail['url'].'" class="loadingImg" alt="'.$imgAlt.'">': get_the_post_thumbnail()); ?>
		</div>

		<div class="row">
			<div class="col-md-5 col-sm-6 col-xs-12 page_title_col">
				<?php the_breadcrumb(); ?>
				<hr class="hor_blue"></hr>
				<h2 class="page_title"><?php echo $project_title; ?></h2>
			</div>
			<div class="col-md-7 col-sm-6 col-xs-12 type_title_col">
				<h3 class="type_title">

				<?php if ( is_array( $taxes ) && count( $taxes ) ): ?>

					<?php foreach ( $taxes as $term ): $link = get_term_link($term->term_id, $term->taxonomy); ?>

						<a href="<?php echo $link; ?>" ><?php echo $term->name; ?></a><?php echo( ( 0 === --$toEnd )? '': ',' ); ?>
					<?php endforeach; ?>

				<?php endif; ?>

				</h3>
			</div>
		</div>

		<p><?php echo $adoria_portfolio_description; ?></p>

		<div class="row product_content">

			<?php if ( is_array( $adoria_additional_portfolio_description ) && count( $adoria_additional_portfolio_description ) ) : ?>

				<?php $i=0;

				foreach ( $adoria_additional_portfolio_description as $description ): extract($description); $i++; ?>

					<?php if ( $i%2 !=0 ): ?>

						<div class="col-lg-6 col-md-6 col-lg-push-6 col-md-push-6 col-sm-12 col-xs-12 product_second_right">

							<?php if ( isset( $adoria_screenshot['url'] ) ) : 
										$imgAlt = get_post_meta( $adoria_screenshot['id'], '_wp_attachment_image_alt', true ); 
							?>

								<img data-src="<?php echo $adoria_screenshot['url']; ?>" alt="<?php echo $imgAlt; ?>" class="loadingImg">

							<?php endif; ?>

						</div>
						<div class="col-lg-6 col-md-6 col-lg-pull-6 col-md-pull-6 col-sm-12 col-xs-12 product_first_right">
							<h3><?php echo ( isset( $adoria_additional_title )? $adoria_additional_title : ''); ?></h3>
							<p><?php echo ( isset( $adoria_additional_description )? $adoria_additional_description : ''); ?></p>
						</div>
					
					<?php else: ?>

						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 product_first_right" style="clear: left;">
							<?php if ( isset( $adoria_screenshot['url'] ) ) : 
										$imgAlt = get_post_meta( $adoria_screenshot['id'], '_wp_attachment_image_alt', true ); 
							?>

								<img data-src="<?php echo $adoria_screenshot['url']; ?>" alt="<?php echo $imgAlt; ?>" class="loadingImg">

							<?php endif; ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 product_second_right">
							<h3><?php echo ( isset( $adoria_additional_title )? $adoria_additional_title : ''); ?></h3>
							<p><?php echo ( isset( $adoria_additional_description )? $adoria_additional_description : ''); ?></p>
						</div>

					<?php endif; ?>

				<?php endforeach; ?>

			<?php endif; ?>


			<?php if ( is_array( $adoria_project_testimonials ) && count( $adoria_project_testimonials ) ) : ?>

				<?php foreach ( $adoria_project_testimonials as $testimonial ): extract($testimonial); ?>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="clients_quote_col">
						<div class="clients_quote">
							<div>
								<?php if ( isset( $adoria_project_testimonial_icon['url'] ) ):
											$imgAlt = get_post_meta( $adoria_project_testimonial_icon['id'], '_wp_attachment_image_alt', true );
								 ?>

									<img data-src="<?php echo $adoria_project_testimonial_icon['url']; ?>" alt="<?php echo $imgAlt; ?>" class="loadingImg">

								<?php endif; ?>
							</div>
							<div>
								<p><?php echo ( isset( $adoria_project_testimonial )? $adoria_project_testimonial : '' ); ?></p>
							</div>
						</div>
						<h4 class="clients_name"><?php echo ( isset( $adoria_project_testimonial_author )? $adoria_project_testimonial_author : '' ); ?></h4>
					</div>

				</div>
				
				<?php endforeach; ?>

			<?php endif; ?>

		</div>
		<div class="container pre-footer text-uppercase text-center">
			<h2><?php echo ( isset($adoria_contact_section_title)? $adoria_contact_section_title : ''); ?></h2>
			<h3><?php echo ( isset($adoria_contact_section_subtitle)? $adoria_contact_section_subtitle : ''); ?></h3>
			<button onclick="window.location='<?php echo ( isset($adoria_contact_section_link)? $adoria_contact_section_link : '/'); ?>'"class="btn btn-primary">Get in touch now</button>
		</div>
	</div>
</div>

<?php get_footer(); ?>