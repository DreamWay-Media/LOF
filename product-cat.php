<?php
/*
Template Name: product category
*/
?>
<?php get_header(); ?>
<section class="product-cat" id="product-cat">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-12">
        <div class="filter-holder">
          <?php if(is_active_sidebar('shop')):?>
            <?php dynamic_sidebar( 'shop' ); ?>
          <?php endif;?>
        </div>
      </div>
      <div class="col-lg-9">
          <main>
			  <h1>
				  <?php the_title(); ?>
			  </h1>
           <?php the_content(); ?>
          </main>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>

