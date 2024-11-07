
<?php get_header();the_post(); ?>
<section class="single" id="single">
  <div class="container">
    <div class="page-wrapper">
        <h1>
          <?php the_title(); ?>
        </h1>
      <div class="entery">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
