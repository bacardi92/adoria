<?php

define('THEME_OPT', 'adoria');

require_once (dirname(__FILE__).'/ext/custom_post_type.php');

new CustomPostTypes( adoria_custom_post_types() );

require_once (dirname(__FILE__).'/ext/adoria_customize_redux.php');

require_once (dirname(__FILE__).'/ext/Walker_Extend_Menu.php');

/*disabling default menu item classes*/
add_filter('wp_nav_menu_objects', 'top_menu_classes_filter', 100, 1);
function top_menu_classes_filter($items) {
    foreach($items as $item){
        if(0 == $item->menu_item_parent){
            $item->classes=array('dropdown');
        }
    }
    return $items;
}

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function adoria_styles() {
    wp_deregister_style( 'style' );
    wp_dequeue_style( 'style' );
    wp_deregister_script( 'jquery' );
    wp_dequeue_script( 'jquery' );
	wp_deregister_script( 'bc-bootstrap' );
    wp_dequeue_script( 'bc-bootstrap' );

    wp_enqueue_style( 'adoria-child-fonts', get_stylesheet_directory_uri() . '/css/fonts.css' );
    wp_enqueue_style( 'adoria-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'adoria-child-style', get_stylesheet_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'adoria-child-slick', get_stylesheet_directory_uri() . '/css/slick.css' );

    wp_register_script(	'jquery',
    					get_stylesheet_directory_uri(). '/vendors/jquery/jquery-2.2.3.js',
    					array(),
    					time(),
    					true
    				);

    wp_register_script(	'adoria-jquery-appear', 
    					get_stylesheet_directory_uri(). '/vendors/jquery/jquery.appear.js', 
    					array('jquery'), 
    					time(), 
    					true
    				);

    wp_register_script(	'adoria-circle-progress', 
    					get_stylesheet_directory_uri(). '/vendors/dist/circle-progress.js', 
    					array('jquery', 'adoria-jquery-appear'), 
    					time(), 
    					true
    				);

    wp_register_script(	'adoria-bootstrap', 
    					get_stylesheet_directory_uri(). '/js/bootstrap.js', 
    					array('jquery', 'adoria-jquery-appear'), 
    					time(), 
    					true
    				);

    wp_register_script( 'adoria-cssBipolarChart',
     					get_stylesheet_directory_uri(). '/js/cssBipolarChart.js', 
     					array('jquery', 'adoria-jquery-appear'), 
     					time(), 
     					true
     				);

    wp_register_script(	'front-page-js',
     					get_stylesheet_directory_uri(). '/js/front.js', 
     					array('jquery', 'adoria-cssBipolarChart', 'adoria-circle-progress'),
     					time(),
     					true
     				);
    wp_register_script( 'isotope-js',
                        get_stylesheet_directory_uri(). '/js/isotope.pkgd.min.js', 
                        array('jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'isotopeFilter-js',
                        get_stylesheet_directory_uri(). '/js/isotopeFilter.js', 
                        array('jquery', 'isotope-js'),
                        time(),
                        true
                    );
    wp_register_script( 'isotopeCategory-js',
                        get_stylesheet_directory_uri(). '/js/isotopeCategory.js', 
                        array('jquery', 'isotope-js'),
                        time(),
                        true
                    );
    wp_register_script( 'modernizr-js',
                        get_stylesheet_directory_uri(). '/js/modernizr.js', 
                        array('jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'main-js',
                        get_stylesheet_directory_uri(). '/js/main.js', 
                        array('jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'jquery-mobile-custom',
                        get_stylesheet_directory_uri(). '/js/jquery.mobile.custom.min.js',
                        array('jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'ajax-load-more',
                        get_stylesheet_directory_uri(). '/js/ajax-load-more.js',
                        array('jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'maps-js',
                        'https://maps.googleapis.com/maps/api/js?v=3.exp',
                        array('jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'global-js',
                        get_stylesheet_directory_uri(). '/js/global.js',
                        array('jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'flik-js',
                        get_stylesheet_directory_uri(). '/js/flik-timeline-10.min.js',
                        array('jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'contact-js',
                        get_stylesheet_directory_uri(). '/js/contact.js',
                        array('maps-js', 'jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'magnific-js',
                        get_stylesheet_directory_uri(). '/js/jquery.magnific-popup.min.js',
                        array('jquery'),
                        time(),
                        true
                    );
   
    wp_register_script( 'bxslider-js',
                        get_stylesheet_directory_uri(). '/js/jquery.bxslider.min.js',
                        array('jquery'),
                        time(),
                        true
                    );
    wp_register_script( 'single-post-js',
        get_stylesheet_directory_uri(). '/js/single-post.js',
        array('jquery'),
        time(),
        true
    );
    wp_enqueue_script( 'jquery' );
    wp_localize_script('adoria-bootstrap', 'objectAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'adoria-jquery-appear' );
    wp_enqueue_script( 'adoria-bootstrap' );
    wp_enqueue_script( 'global-js' );

   

    if ( is_front_page() ){

    	global $adoria; 

    	$charts_data =array(
    		'adoria_clients_europe' 			=> (int)$adoria['adoria_clients_europe'],
    		'adoria_clients_australia' 			=> (int)$adoria['adoria_clients_australia'],
    		'adoria_clients_usa' 				=> (int)$adoria['adoria_clients_usa'],
    		'adoria_employees_phd'				=> (int)$adoria['adoria_employees_phd'],
    		'adoria_employees_fluent_english'	=> (int)$adoria['adoria_employees_fluent_english']
    	);

    	wp_enqueue_style(	'adoria-cssBipolarChart', 
    						get_stylesheet_directory_uri() . '/css/cssBipolarChart.css'
    					);
    	wp_enqueue_script( 'adoria-cssBipolarChart' );
    	wp_enqueue_script( 'adoria-circle-progress' );
    	wp_enqueue_script( 'front-page-js' );
    	wp_localize_script( 'front-page-js', 'Adoria', $charts_data );
    }
    if( is_post_type_archive('portfolio') ){
        wp_enqueue_script( 'isotope-js' );
        wp_enqueue_script( 'isotopeFilter-js' );
    }
    if( is_home() || is_category() ){
        wp_enqueue_script( 'ajax-load-more' );
        wp_enqueue_script( 'isotope-js' );
        wp_enqueue_script( 'isotopeCategory-js' );
    }
    if( is_page('about') ){
        wp_enqueue_script( 'modernizr-js' );
        wp_enqueue_script( 'jquery-mobile-custom' );
        wp_enqueue_script( 'main-js' );
        wp_enqueue_script( 'magnific-js' );
        wp_enqueue_script( 'flik-js' );
        wp_enqueue_script( 'bxslider-js' );
        // wp_enqueue_style(   'flik-css', get_stylesheet_directory_uri() . '/css/flik-timeline.min.css'  );
    }
    if( is_page('contacts') ){
        global $adoria; 
        wp_enqueue_script( 'maps-js' );
        wp_enqueue_script( 'contact-js' );
        wp_localize_script( 'contact-js', 'mapData', array('lat' => $adoria['adoria_location_lat'],
                                                            'leng'=> $adoria['adoria_location_leng'], 
                                                            'address'=> $adoria['adoria_location_address']
                                                            )
        );
    }
    if(is_singular('post')){
        wp_enqueue_script( 'single-post-js' );
    }

}

add_action('wp_enqueue_scripts', 'adoria_styles', 99);


add_filter('bc_customize_slider', 'adoria_slider_content');

function adoria_slider_content($id){

	if(!$id)
		return false;
	$slides = get_post_meta($id, 'opt-slides', 1);
	if(!$slides)
		return false;
	$html = '';
	$dots_disabled = get_post_meta($id, 'opt-dots', 1);
	if($dots_disabled != "0"){
		$html .='<ol class="carousel-indicators">';
		foreach ($slides as $k => $slide) {
			$html .= '<li data-target="#carousel-home" data-slide-to="'.$k.'" '.(($k == 0)? "class=\"active\"" : "").'></li>';
		}
		$html .= "</ol>";
	}
	$html .= '<div class="carousel-inner" role="listbox">';
	foreach ($slides as $k => $slide): extract($slide);
        
        if(filter_var($additional_background, FILTER_VALIDATE_URL)){
            $background = 'style="background: url('.$additional_background.') no-repeat;"';
        }elseif($additional_background){
            $background = 'style="background: '.$additional_background.'"';
        }
		$html .= '<div class="item carousel-home-item '.(($k == 0)? "active" : "" ).'" '.((isset($background))? $background : "").'>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
							<h3 class="slideTitle">'.$title.'</h3>
							<p class="slideContent">'.$description.'</p>
							'.$custom.'
							<div>
								<a href="'.$url.'" class="btn btn-link">Learn more ></a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
							<img class="img-responsive" src="'.$image.'" alt="">
                            <a href="'.$url.'" class="slideLink"></a>
						</div>
					</div>
				</div>';
	endforeach;
	$html .= '</div>';
	echo $html;

}

add_filter('bc_slider_setting_fields', 'adoria_remove_slider_options');

function adoria_remove_slider_options($slider_options){
	
	$slider_options = array();
	$slider_options[] =array(
			'title' => 'Slides',
			'icon_class'    => 'icon-large',
			'icon'          => 'el-icon-list-alt',
			'fields' => array(
				array(
				    'id'        => 'opt-slides',
				    'type'      => 'slides',
				    'title'     => __('Slides Image', THEME_OPT),
				    'subtitle'  => __('Unlimited slides with drag and drop sortings.',  THEME_OPT),
				    'desc'      => __('This field will store all slides values into a multidimensional array to use into a foreach loop.',  THEME_OPT)			    
				),
				array(
					'id'		=> 'opt-dots',
					'type'		=> 'switch',
					'title'    	=> __('Slider Nav Dots', THEME_OPT),				    
					'default'  	=> true
				)
			)
		);

	return $slider_options;

}

function adoria_custom_post_types(){

    return array(

            array(

                'type'          =>  'portfolio',
                'name'          =>  'Success Stories',
                'singular_name' =>  'Success Stories',
                'public'        =>  true,
                'menu_position' =>  72,
                'menu_icon'     =>  'dashicons-images-alt2',
                'supports'      =>  array( 'title', 'thumbnail'),
                'rewrite'       =>  array("slug"=>'success-stories'),
                'taxonomies'    =>  array(

                                        array( 
                                            'name'          => 'Success Stories Industries',
                                            'singular_name' => 'Success Stories Industry',
                                            'slug'          => 'portfolio_industries'
                                        ),
                                        array( 
                                            'name'          => 'Success Stories Technology',
                                            'singular_name' => 'Success Stories Technology',
                                            'slug'          => 'portfolio_technology'
                                        )

                                    )

            ),

            array(

                'type'          =>  'team_members',
                'name'          =>  'Team Members',
                'singular_name' =>  'Team Members',
                'public'        =>  true,
                'menu_position' =>  73,
                'menu_icon'     =>  'dashicons-id-alt',
                'supports'      =>  array( 'title', 'thumbnail'),
                'rewrite'       =>  array("slug"=>'team-members'),
                'taxonomies'    =>  array(

                                        array( 
                                            'name'          => 'Member Position',
                                            'singular_name' => 'Member Position',
                                            'slug'          => 'member_position'
                                        ),

                                    )

            ),

        );

}


add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function load_more_posts(){
    if(!isset($_POST))
        return;

    $category = $_POST['category'];
    $paged = $_POST['paged'];

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'paged' => $paged,
    );
    if($category != 'all'){
        $args['category'] = $category;
    }
    $category = null;
    $query = new WP_Query($args);

    if( $query->have_posts() ){

        while ($query->have_posts() ): $query->the_post(); 
            $category = get_the_category( get_the_ID() );
                         
        ?>
        <?php $classlist=''; ?>
        <?php foreach($category as $cat): ?>
            <?php $classlist.=$cat->slug."-".$cat->term_id." "; ?>
         <?php endforeach; ?>
        <div class="col-md-4 col-sm-6 col-xs-12 clearfix blogPost appended-post <?php echo $classlist; ?>">
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
                <?php foreach($category as $cat): ?>
                    <a href="#<?php echo $cat->slug; ?>-<?php echo $cat->term_id; ?>"
                            class="catIsotopeLink">
                        <h3 class="one_post_cat">
                            <?php echo (isset($cat)? $cat->name : '');?>
                        </h3>
                    </a>
                <?php endforeach; ?>
                <a href="<?php the_permalink(); ?>"><h3 class="title"><?php the_title(); ?></h3></a>
                <a href="<?php the_permalink(); ?>">
                    <p><?php the_excerpt(); ?></p>
                </a>
            </div>
        </div>

        <?php

        endwhile;

    }
    wp_die();

}

function change_submenu_class($menu) {  
  $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','change_submenu_class');  

function the_breadcrumb() {
    echo "<div class='breadcrumbs'>";
    $separator = '<span><i class="fa fa-angle-right" aria-hidden="true"></i></span>';
    if (!is_front_page()) {
        echo '<a href="';
        echo get_option('home');
        echo '">Home';
        echo "</a>";
        echo $separator;
        if (is_archive()) {
            echo '<span>';
            post_type_archive_title('', true);
            echo '</span>';
        }
        if (is_category() || is_tax()) {
            echo '<span>';
            single_cat_title('', true);
            echo '</span>';
        }
        if (is_single()) {
            global $post; 
            if($post->post_type != 'post'){
                $post_type_data = get_post_type_object( $post->post_type );
                echo '<a href="';
                echo home_url($post_type_data->rewrite['slug']);
                echo '">'.$post_type_data->label;
                echo "</a>";
            }else{
                echo '<a href="';
                echo home_url('blog');
                echo '">Blog';
                echo "</a>";
            }
            echo $separator;
            echo '<span>';
            the_title();
            echo '</span>';
        }
        if (is_page()) {
            echo '<span>';
            echo the_title();
            echo '</span>';
        }
    }
    else {
        echo 'Home';
    }
    echo "</div>";
}

add_filter('the_content', 'lazyLoadImg');
function lazyLoadImg( $output ){
    $dom = new DOMDocument('1.0','utf-8');
    $dom->validateOnParse = true;
        $dom->encoding="UTF-8";
    $dom->loadHTML('<?xml encoding="UTF-8">'.$output);
     foreach ($dom->getElementsByTagName('img') as $node) {
        $oldsrc = $node->getAttribute('src');
        $node->setAttribute("data-src", $oldsrc );
        $node->setAttribute('class', 'loadingImg');
        $node->removeAttribute('srcset');
        $node->removeAttribute('src');
        $node->removeAttribute('sizes');
     }
    $output = $dom->saveHtml();
    return $output;
}
