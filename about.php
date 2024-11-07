<?php
/*
Template Name: about page
*/
?>
<?php get_header();the_post(); ?>
<section class="about-page relative" id="about-page">
  <div class="container">
      <div class="row">
		  <div class="title-block text-center">
			  <h1><?php the_title(); ?></h1>
		  </div>
        <div class="col-12 text-center">
          <div class="wrapper">
       
            
          <?php the_content(); ?>
            
          </div>
        </div>
      </div>
    </div>
</section>
<?php get_footer(); ?>
