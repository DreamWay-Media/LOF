<?php
/*
Template Name: contact us
*/
?>
<?php get_header();the_post(); ?>
<section id="contact">
	<div class="container">
      <div class="row">
		  <div class="title-block text-center">
			  <h1><?php the_title(); ?></h1>
		  </div>
        <div class="col-lg-6 col-12">
          <div class="wrapper">
              <?php the_content(); ?>
			<div class="sci">
				<h3>follow</h3>
				<?php if(is_active_sidebar('social')):?>
				<?php dynamic_sidebar( 'social' ); ?>
				<?php endif;?>
			</div>
          </div>
        </div>
		<div class="col-lg-6 col-12">
			<?php echo do_shortcode('[contact-form-7 id="118" title="Contact form 1"]'); ?>
		</div>
      <div class="row">
        <div class="col-lg-12 col-12">
		  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.1968411855155!2d-118.37089696076045!3d34.19933122056863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2959576f1f739%3A0xc3b94c31567ccd3f!2sOMEGA%20FOODS%20INC!5e0!3m2!1sen!2sus!4v1653530527901!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		  </div>
      </div>
      </div>
    </div>
</section>
<?php get_footer(); ?>
