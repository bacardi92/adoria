<?php /* Template Name: about */ 

get_header();


global $adoria;

extract($adoria);


?>

<div class="container-fluid about_first">
        <div class="panel-body container">
            <?php the_breadcrumb(); ?>
            <hr class="hor_blue"></hr>
            <h2 class="page_title">About</h2>
           	<?php the_content();?>
        </div>
    </div>
    <div class="container-fluid">
        <div class="panel-body container">
            <h2 class="text-center"><?php echo isset( $adoria_team_members_title )? $adoria_team_members_title : '' ?></h2>
            <p class="text-center">
                <?php echo isset( $adoria_team_members_description )? $adoria_team_members_description : '' ?>
            </p>
        </div>

        <?php if( isset( $adoria_team_members_section ) && is_array( $adoria_team_members_section ) && count( $adoria_team_members_section ) ): ?>

        	<?php $members = new WP_Query(array(
                                                'post__in' => $adoria_team_members_section,
                                                'post_type' => 'team_members',
                                                'numberposts' => -1,
                                                ) 
                                        ); 
            ?>
                <div class="panel-body container">
                    <div class="row team_blocks">

        	       <?php while($members->have_posts()): $members->the_post() ; ?>

                        <?php $position = wp_get_post_terms( get_the_ID(), 'member_position', array('number'=>1) ); 
                          $imgAlt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
                        ?>

		                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		                    <div class="">
		                        <div class="team_thumb">
		                            <img data-src="<?php echo get_the_post_thumbnail_url(); ?>" class="example_beauty loadingImg"  alt="<?php echo $imgAlt; ?>" />
		                            <div class="im_grad"></div>
		                            <div class="example_text">
		                                <h6><?php the_title();?></h6>
		                                <hr class="hor_white">
		                                <span><?php echo (count($position)? $position[0]->name : ''); ?></span>
		                            </div>
		                        </div>
		                    </div>
		                </div>

                    <?php endwhile; ?>

		            </div>
		        </div>

    	<?php endif; ?>

        <div class="panel-body container">
            <h2 class="text-center"><?php echo ( isset( $adoria_values_title )? $adoria_values_title : 'Our Values' );?></h2>
            <p class="text-center">
                <?php echo ( isset( $adoria_values_description )? $adoria_values_description : '' );?>
            </p>
        </div>
        <div class="panel panel-container container">
            <div class="panel-body-values">
                <div class="row values">
                <?php if( isset( $adoria_values_section ) && is_array( $adoria_values_section ) && count( $adoria_values_section ) ): ?>

                    <?php foreach( $adoria_values_section as $section ): extract($section); 
                        $imgAlt = get_post_meta( $adoria_value_icon['id'], '_wp_attachment_image_alt', true );
                    ?>

                        <div class="col-md-12 col-sm-12 col-xs-12 val_cont">
                            <div class="col-md-4 col-sm-12 values_title">
                                <?php if( isset( $adoria_value_icon['url'] ) ): ?>
                                <div class="values_title_h">
                                    <img class="values_img_sm loadingImg" 
                                         data-src="<?php echo $adoria_value_icon['url']; ?> " 
                                         alt="<?php echo $imgAlt; ?>">
                                    <p class="title_text"><?php echo $adoria_value_title; ?>
                                        <img class="values_img loadingImg" 
                                             data-src="<?php echo $adoria_value_icon['url']; ?>" 
                                             alt="<?php echo $imgAlt; ?>">
                                    </p>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 values_text">
                                <p class="col_text"><?php echo $adoria_value_text; ?>
                                </p>
                            </div>
                        </div>

                    <?php endforeach; ?>

                <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="panel-body container">
            <h2 class="text-center-benefits"><?php echo ( isset( $adoria_key_benefits_title )? $adoria_key_benefits_title : 'Key Benefits' );?></h2>
            <p class="text-center">
                <?php echo ( isset( $adoria_key_benefits_description )? $adoria_key_benefits_description : '' );?>
            </p>
        </div>

        <div class="panel panel-container container">
            <div class="panel-body">
                <div class="row benefits">

                <?php if( isset( $adoria_keys_benefits_section ) && is_array( $adoria_keys_benefits_section ) && count( $adoria_keys_benefits_section ) ): ?>

                    <?php foreach( $adoria_keys_benefits_section as $section ): extract($section); ?>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <p class="h1">
                            <?php echo (isset( $adoria_key_benefits_count )? $adoria_key_benefits_count : '')?>
                        </p>
                        <p>
                        <?php if ( isset($adoria_key_benefits_titles) && count($adoria_key_benefits_titles)): ?>
                            <?php foreach( $adoria_key_benefits_titles as $title ):  ?>
                            <?php echo $title; ?><br>
                            <?php endforeach; ?>
                            
                         <?php endif; ?>
                        </p>
                    </div>

                    <?php endforeach; ?>

                <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="panel-body container" >
        <h2 class="text-center"><?php echo ( isset($adoria_timeline_title)? $adoria_timeline_title : 'Timeline');?></h2>
        <p class="text-center">
            <?php echo ( isset($adoria_timeline_description)? $adoria_timeline_description : '');?>
        </p>
    </div>

    <!-- timeline -->
    <div id="timelineSection">
        <div class="panel panel-container container ">
            <div class="panel-body">
                <section class="flik-container">
                <!-- BEGIN TIMELINE CONTENT -->

                <ul class="flik-timeline flik-timeline-10 col-xs-12" data-scroll-effect="slide-down-up-effect">

                <?php if(isset( $adoria_timeline_options ) && is_array( $adoria_timeline_options ) && count($adoria_timeline_options)): ?>
                    <?php foreach ($adoria_timeline_options as $k => $option): extract($option);?>

                    <li class="<?php echo (($k == 0)? 'active' : ''); ?>">
                        <div class="col-sm-3 col-xs-3 relative">
                            <label class="show-title"><?php echo (isset($adoria_timeline_title)? $adoria_timeline_title : ''); ?></label>
                            <span class="circle"></span>
                        </div>
                        <div class="flik-timeline-content col-sm-9 col-xs-9">
                            <div class="content-title text-center">
                            <strong><?php echo (isset($adoria_timeline_title)? $adoria_timeline_title : ''); ?></strong></div>
                            <div class="content-main">
                                <?php echo (isset($adoria_timeline_text)? $adoria_timeline_text : ''); ?>
                            </div>
                        </div>
                    </li>
                    
                     <?php endforeach; ?>

                <?php endif; ?>
                </ul>


                <!-- END TIMELINE CONTENT -->
            </section>
            </div>
        </div>
    </div>
    <!-- timeline -->

    <div class="panel-body container" id="videoAbout">
        <h2 class="text-center"><?php echo ( isset($adoria_see_us_title)? $adoria_see_us_title : '');?></h2>
        <p class="text-center">
            <?php echo ( isset($adoria_see_us_description)? $adoria_see_us_description : '');?>
        </p>
    </div>
    <div class="panel panel-container container">
        <div class="panel-body">
            <div class="row video_row">
            <?php if ( isset($adoria_video_link_title) ): ?>
                <iframe width="760" height="515" src="<?php echo $adoria_video_link_title;?>" frameborder="0" allowfullscreen></iframe>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="panel-body container cta">
        <h2><?php echo ( isset($adoria_contact_section_title)? $adoria_contact_section_title : ''); ?></h2>
        <h3><?php echo ( isset($adoria_contact_section_subtitle)? $adoria_contact_section_subtitle : ''); ?></h3>
        <button onclick="window.location='<?php echo ( isset($adoria_contact_section_link)? $adoria_contact_section_link : '/'); ?>'"class="btn btn-primary">Get in touch now</button>
    </div>
  
<?php get_footer(); ?>



