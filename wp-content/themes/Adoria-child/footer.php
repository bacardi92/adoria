<?php 

/* Call Redux Global Var */
global $adoria;

extract( $adoria );

?>		
		<footer>
			<div class="row footer-body">
				<div class='container'>
					<div class="col-xs-12 col-lg-6 col-lg-push-3">
						<ul class="nav nav-pills nav-justified">
							<li>
								<a href="/expertise/" class="dropdown-toggle" data-toggle="dropdown">Expertise</a>
							</li>
							<li>
								<a href="/success-stories/" class="dropdown-toggle" data-toggle="dropdown">Success Stories</a>
							</li>
							<li>
								<a href="/company/" class="dropdown-toggle" data-toggle="dropdown">Company</a>
							</li>
						</ul>
					</div>
					<div class="col-lg-3 col-lg-pull-6 col-sm-6 col-xs-12">
						<ul class="fa-ul">
							<li>
								<i class="fa-li fa fa-skype"></i>
								<?php foreach ($skype_contact_footer as $skype): extract($skype)  ?>

									<a id="skype_link_top" target=_blank rel="nofollow" href="skype:<?php echo $skype_contact_footer_link; ?>?call" class="ga-event"><?php echo $skype_contact_footer_name; ?></a><br>

								<?php endforeach; ?>
							</li>
							<li>
								<i class="fa-li fa fa-envelope"></i>
								<?php foreach ($email_contact_footer as $email): extract($email)  ?>

									<a id="mailto_link_top" target=_blank rel="nofollow" href="mailto:<?php echo $email_contact_footer_link; ?>" class="ga-event"><?php echo $email_contact_footer_link; ?></a><br>

								<?php endforeach; ?>
							</li>
							<li>
								<i class="fa-li fa fa-phone"></i>
									<span>
									<?php foreach ($phone_contact_footer as $phone): extract($phone)  ?>

										<a id="cell_link_top" target=_blank rel="nofollow" class="ga-event" href="skype:<?php echo str_replace(" ", "", $phone_contact_footer_link); ?>?call"><?php echo $phone_contact_footer_link; ?></a><br>

									<?php endforeach; ?>
										
									</span>
							</li>
						</ul>
					</div>

					<div class="col-lg-3 col-sm-6 col-xs-12">
						<div class="text-right">
							<button id="footerSubscribe" class="btn btn-footer" data-toggle="modal" data-target="#subcribeModal">Subscribe to our newsletter</button>
						</div>
						<div class="socials text-right">
							<a href="<?php echo $link_to_facebook ;?>" target=_blank rel="nofollow"><i class="fa fa-facebook"></i></a>
							<a href="<?php echo $link_to_twitter ;?>" target=_blank rel="nofollow"><i class="fa fa-twitter"></i></a>
							<a href="<?php echo $link_to_rss ;?>" target=_blank rel="nofollow"><i class="fa fa-rss"></i></a>
							<a href="<?php echo $link_to_gplus ;?>" target=_blank rel="nofollow"><i class="fa fa-google-plus"></i></a>
							<a href="<?php echo $link_to_linkedin ;?>" target=_blank rel="nofollow"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
					<div class="col-xs-12 col-lg-6 col-lg-push-3">
						<p class="copyright text-center small">
							<?php echo $copyright_footer; ?>
						</p>
					</div>
				</div>
			</div>
		</footer>
		<div id="subcribeModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Subscribe</h4>
		      </div>
		      <div class="modal-body">
		       	<?php mailchimpSF_signup_form(); ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
<?php wp_footer(); ?>

</body>
</html>