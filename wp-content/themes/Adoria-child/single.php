<?php /* Template Name: success-stories */ 

get_header();

global $adoria;
// $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$thumb = get_the_post_thumbnail_url();
$imgAlt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); 
extract($adoria);
global $post;

?>
<div class="container-fluid">
	<div class="container single-post-wraper">	
		<?php the_breadcrumb(); ?>
		<?php if ($thumb) :?>
		<div class="blog_one_post_main_image">
			<img data-src="<?php echo $thumb; ?>" alt="<?php echo $imgAlt; ?>" class="loadingImg">
		</div>
		<div class="row social-scroll">	
			<div class="scroll-wrapper">	
			<?php echo do_shortcode("[wp_share_button]"); ?>
		</div></div>
		<hr class="hor_blue">
		<?php endif;?>
		<?php $cats = get_the_category();
		foreach( $cats as $k => $category ): ?>
			
			<a class="post_cat" href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->cat_name; ?></a><?php echo (($k < count($cats)-1)? ", " : ''); ?>

		
		<?php endforeach; ?>
		<h2 class="page_title"><?php the_title(); ?></h2>
        <div class="post_content">
			<?php echo $post->post_content; ?>
			
		</div>
		<div class="singlepost-media">
			<nav class="social">
	 			<?php echo do_shortcode("[wp_share_button]"); ?>
			</nav>
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