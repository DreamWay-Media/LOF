
<?php get_header();the_post(); ?>
<section class="single" id="single">
  <div class="container">
    <div class="page-wrapper">
      <div class="blog_top">
        <div class="icon-holder">
          <div class="triangle"></div>
          <?php if(get_field('small_icon')): ?>
          <?php the_field('small_icon'); ?>
          <?php endif; ?>
        </div>
        <h1>
          <?php the_title(); ?>
        </h1>
      </div>
      <div class="entery">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
