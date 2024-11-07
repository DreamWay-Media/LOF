    <footer>
      <div class="top-block">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-12">
              <div class="footer-logo text-center">
                <a href="<?=home_url();?>">
                <img src="<?php echo get_template_directory_uri();?>/imgs/footer-logo.png" alt="Omega Food">
                </a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
              <div class="wrapper ma-1">
                <h3>Information</h3>
                <div class="footer-info-menu">
                  <?php wp_nav_menu( array( 'theme_location' => 'footer-info' ) ); ?>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
              <div class="wrapper ma-2">
                <h3>follow</h3>
                <?php if(is_active_sidebar('social')):?>
                  <?php dynamic_sidebar( 'social' ); ?>
                <?php endif;?>
              </div>
            </div>
            <div class="col-lg-3 col-12">
              <div class="wrapper">
                <h3>signup for newsletters </h3>
                <?php if(is_active_sidebar('newsletter')):?>
         						<?php dynamic_sidebar( 'newsletter' ); ?>
     					  <?php endif;?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-block">
        <div class="cp">
          Copyright © 2022 LA Omega Foods. All Right Reserved.
        </div>
      </div>
      <?php wp_footer(); ?>		
		<script type="text/javascript">
			wow = new WOW(
				{
					animateClass: 'animated',
					offset:       0,
					live:         true,
					callback:     function(box) {
						console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
					}
				}
			);
			wow.init();
		</script>
    </footer>
  </body>
</html>
