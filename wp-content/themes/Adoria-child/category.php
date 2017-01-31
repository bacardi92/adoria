<?php 

get_header();

global $adoria;
global $wp_query;

$category = get_category( get_query_var( 'cat' ) );
$cat_id = $category->cat_ID;
extract($adoria);


?>
<div class="container-fluid">
	<div class="container">	
		<div class="panel-body subscribe_container">
		<?php the_breadcrumb(); ?>
		<div class="text-center">
			<h2><?php echo ( isset( $adoria_blog_title )? $adoria_blog_title: '' ); ?></h2>
				<p class="text-center"><?php echo ( isset( $adoria_blog_description )? $adoria_blog_description: '' ); ?></p>
				<button class="btn btn-primary">SUBSCRIBE</button>
		</div>
		</div>	
        
	</div>
</div>

<div class="container-fluid panel panel-container blog_container">
    <div class="panel-body container">
        <div class="filters_blog">
        <?php 

        $args = array(
			'type'         => 'post',
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'exclude'      => 'uncategorized',
			'taxonomy'     => 'category',
			'pad_counts'   => false,
		);
		$categories = get_categories( $args );

		if ( is_array($categories) ): 
        ?>
            <ul class="filters_s">
            	<li><a href="/blog/" data-filter="">All</a></li>
            	<?php foreach ($categories as $cat) :?>
            
                	<li>
                		<a href="<?php echo get_category_link($cat->term_id); ?>" data-filter=".<?php echo $cat->slug; ?>-<?php echo $cat->term_id; ?>">
	                		<?php echo $cat->name; ?>
	                	</a>
                	</li>

               	<?php endforeach; ?>
            </ul>
        <?php endif; ?>
        </div>
		<?php if ( have_posts() ): ?>
			<div class="row">
			    <div class="blog_posts_container">

					<?php while( have_posts() ): the_post(); ?>
						<?php $category = get_the_category( get_the_ID() ); ?>
						<div class="col-md-4 col-sm-6 col-xs-12">
			                <div class="one_blog_post">
			                    <div class="one_post_image">
			                        <a href="<?php the_permalink(); ?>">
			                        	<?php $url = get_the_post_thumbnail_url(); ?>
			                        	<div 
					                        <?php echo (($url)? 'style="background-image: url('.$url.');"' : " "); ?> 
					                        class="post-img-thumbnail <?php echo (($url)? '' : "noImg"); ?>"> 
					                      </div>
			                        </a>
			                    </div>
			                    <a href="<?php echo (isset($category[0])? get_category_link($category[0]->term_id) : '#' );?>">
			                    	<h3 class="one_post_cat">
			                    		<?php echo (isset($category[0])? $category[0]->name : '');?>
			                    	</h3>
			                    </a>
			                    <a href="<?php the_permalink(); ?>"><h3 class="title"><?php the_title(); ?></h3></a>
			                    <a href="<?php the_permalink(); ?>">
			                        <p><?php the_excerpt(); ?></p>
			                    </a>
			                </div>
			            </div>

					<?php endwhile; ?>
					<?php if( $wp_query->max_num_pages > 1 ): ?>
						<div class="text-center pre-footer" style="clear:both;">
			                <button class="btn btn-primary" id="loadMore" data-category="<?php echo $cat_id; ?>" data-paged="<?php echo isset($_GET['paged'])? $_GET['paged'] : '1'; ?>">READ MORE</button>
			            </div>
		            <?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>