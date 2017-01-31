<?php /* Template Name: contacts */ 

get_header();

global $post;
global $adoria;
extract($adoria);
?>

    <div class="container-fluid about_first">
        <div class="panel-body container">
        <?php the_breadcrumb(); ?>
        <hr class="hor_blue" />

        <h2 class="page_title">Contacts</h2>
        <?php echo $post->post_content; ?>

        </div>
    </div>
    <div class="container-fluid">
        <div class="panel-body container">
            <h2 class="text-center inner_h2"><?php echo( isset($adoria_cf_title)? $adoria_cf_title: ''); ?></h2>
        </div>
        <div class="panel panel-container container">
            <div class="row mail_form">
                <div class="col-md-8 col-sm-12 centered-mail_col">
                    <?php echo do_shortcode(isset($adoria_cf_shtcd)? $adoria_cf_shtcd: ''); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body container">
        <h2 class="text-center inner_h2"><?php echo( isset($adoria_contact_emails_section_title)? $adoria_contact_emails_section_title: ''); ?></h2>
    </div>
    <div class="panel panel-container mail_container container">
            
            <?php if ( isset( $adoria_contact_emails ) && count( $adoria_contact_emails ) ): ?>
            
                <?php foreach( $adoria_contact_emails as $box ) : extract($box); ?>  

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="Mail_container_one">
                            <div class="cont_im_r" style="background-image: url(<?php echo (isset($adoria_contact_email_icon['url'])? $adoria_contact_email_icon['url'] : '')?>)"></div>
                            <h4><?php echo (isset($adoria_contact_email_title)? $adoria_contact_email_title: ''); ?></h4> 
                            <?php if (isset($adoria_contact_email)): ?>
                                <a href="mailto:<?php echo $adoria_contact_email; ?>">
                                    <?php echo $adoria_contact_email; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

          <?php endif; ?>

    </div>
    <div class="panel-body container">
        <h2 class="text-center inner_h2"><?php echo( isset($adoria_location_title)? $adoria_location_title: ''); ?></h2>
    </div>
    <div class="panel panel-container container mail_panel">
        <div class="panel-body mail_panel_cont">
            <div style="overflow: hidden; height: 540px;">
            <div id="gmap_canvas" style="height: 540px;"></div>
            <div></div>
            <div>
                <small>
                    <a href="https://privacypolicygenerator.info">privacy policy generator</a>
                </small>
            </div>
            <style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div>
        </div>
    </div>
    
<?php get_footer(); ?>