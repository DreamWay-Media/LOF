<?php get_header(); ?>
<main id="home-page" class="home-page">
  <section class="slider-section">
    <?php $sliders = get_posts(array('post_type' => 'slider', 'numberposts' => 3)); ?>
      <div class="owl-carousel owl-theme">
        <?php foreach ($sliders as $slider):?>
        <div class="item">
            <div class="img-container" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($slider->ID)); ?>)">
				<div class="container">
					<div class="slider_text wow fadeIn" data-wow-duration="0.7s" data-wow-delay="1s">
						<h2><?php the_field('slide_title', $slider->ID); ?></h2>
						<p><?php the_field('slide_text', $slider->ID); ?></p>					
						<a class="g-btn" href="<?php the_field('slide_url', $slider->ID); ?>">browse products</a>
					</div>
				</div>
            </div>
        </div>
        <?php endforeach; ?>
      </div>
  </section>
	<section class="flags">
	<?php if(is_active_sidebar('flags')):?>
    	<?php dynamic_sidebar( 'flags' ); ?>
    <?php endif;?>
	</section>
	<section class="featured-products-section latest">
    <div class="container">
      <div class="title-block wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.5s">
        <h2>Latest Products</h2>
      </div>
      <div class="products-wrapper d-xl-block d-none">
        <?php echo do_shortcode('[wcpscwc_pdt_slider orderby="date" order="DESC" autoplay="true" slide_to_show="5" limit="15" ]');?>
      </div>      
      <div class="products-wrapper d-lg-block d-xl-none d-none">
        <?php echo do_shortcode('[wcpscwc_pdt_slider orderby="date" order="DESC" autoplay="true" slide_to_show="4" limit="16" ]');?>
      </div>
      <div class="products-wrapper d-md-block d-lg-none d-none">
        <?php echo do_shortcode('[wcpscwc_pdt_slider orderby="date" order="DESC" autoplay="true" slide_to_show="3" limit="15" ]');?>
      </div>
      <div class="products-wrapper d-md-none">
        <?php echo do_shortcode('[wcpscwc_pdt_slider orderby="date" order="DESC" autoplay="true" slide_to_show="2" limit="16" ]');?>
      </div>
	  <div class="wrapper text-center wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="1s">
    		<a  class="g-btn" href="<?php home_url( '/' );?>catalog">All Products</a>		  
	  </div>
    </div>
  </section>
  <section class="cat-section">
    <div class="container">
      <div class="title-block wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.5s">
        <h2>Products Categories</h2>
      </div>
      <div class="products-wrapper d-xl-block d-none">
        <?php echo do_shortcode('[product_categories limit="18" columns="6" parent="0" orderby="menu_order" order="desc" hide_empty="0"]'); ?>
      </div>
      <div class="products-wrapper d-lg-block d-xl-none d-none">
        <?php echo do_shortcode('[product_categories limit="10" columns="5" parent="0" orderby="menu_order" order="desc" hide_empty="0"]'); ?>
      </div>
      <div class="products-wrapper d-md-block d-lg-none d-none">
        <?php echo do_shortcode('[product_categories limit="9" columns="3" parent="0" orderby="menu_order" order="desc" hide_empty="0"]'); ?>
      </div>
      <div class="products-wrapper d-md-none">
        <?php echo do_shortcode('[product_categories limit="6" columns="2" parent="0" orderby="menu_order" order="desc" hide_empty="0"]'); ?>
      </div>
    </div>
  </section>
  <section class="featured-products-section">
    <div class="container">
      <div class="title-block wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.5s">
        <h2>Featured Products</h2>
      </div>
      <div class="products-wrapper d-xl-block d-none">
        <?php echo do_shortcode('[featured_products limit="10" columns="5" parent="0"]'); ?>
      </div>
      <div class="products-wrapper d-lg-block d-xl-none d-none">
        <?php echo do_shortcode('[featured_products limit="8" columns="4" parent="0"]'); ?>
      </div>
      <div class="products-wrapper d-md-block d-lg-none d-none">
        <?php echo do_shortcode('[featured_products limit="9" columns="3" parent="0"]'); ?>
      </div>
      <div class="products-wrapper d-md-none">
        <?php echo do_shortcode('[featured_products limit="6" columns="2" parent="0"]'); ?>
      </div>
	  <div class="wrapper text-center wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
    		<a  class="g-btn" href="<?php home_url( '/' );?>catalog">All Products</a>		  
	  </div>
    </div>
  </section>
  <section class="about-section">
    <div class="container">
      <div class="row">
        <?php $my_postid = 97;//This is page id or post id
          $content = $content_post->post_content;?>
        <div class="col-lg-6 col-12 ">
          <div class="img-container about_img wow slideInLeft" data-wow-duration="1.2s" data-wow-delay="0.5s">
            <?php  if(has_post_thumbnail(97)): ?>
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id(97)); ?>">
            <?php endif; ?>
          </div>
        </div>
        <div class="col-lg-6 col-12">
          <div class="wrapper about_txt wow slideInRight" data-wow-duration="1.2s" data-wow-delay="0.5s">
            <div class="subtitle">about</div>
            <h1><?php echo get_the_title(97); ?></h1>
            <p>
              <?php echo get_the_excerpt(97); ?>
            </p>
            <a  class="g-btn" href="<?php echo get_the_permalink(97);?>">Read more</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="brand-section">
    <div class="title-block wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.5s">
      <h2>Our Brands</h2>
    </div>
    <div class="container d-lg-block d-none">
      <?php echo do_shortcode('[pwb-all-brands limit="15" image_size="full" title_position="none"]'); ?>
    </div>
    <div class="container d-lg-none">
      <?php echo do_shortcode('[pwb-all-brands limit="5" image_size="full" title_position="none"]'); ?>
    </div>
	  <div class="wrapper text-center wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">
    		<a  class="g-btn" href="<?php home_url( '/' );?>brands">All Brands</a>		  
	  </div>
  </section>
</main>

<?php get_footer(); ?>
