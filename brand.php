<?php
/*
Template Name: brands
*/
?>
<?php get_header(); ?>
  <section id="brands" class="brands">
    <div class="container">
      <div class="row">
		  <div class="title-block text-center">
			  <h1><?php the_title(); ?></h1>
		  </div>
        <div class="col-12 text-center">
          <div class="wrapper">
      <div class="brand-items">
        <?php the_content(); ?>
      </div>
    </div>
      </div>
    </div>
    </div>
  </section>
<?php get_footer(); ?>
