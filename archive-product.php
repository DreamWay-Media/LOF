<?php get_header(); ?>
<section class="shop-page" id="shop-page">
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
            <header class="woocommerce-products-header">
              <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
              <?php endif; ?>

              <?php
              /**
               * Hook: woocommerce_archive_description.
               *
               * @hooked woocommerce_taxonomy_archive_description - 10
               * @hooked woocommerce_product_archive_description - 10
               */
              do_action( 'woocommerce_archive_description' );
              ?>
            </header>
			  
			  <div class="d-none d-xl-none d-lg-block">
				  <?php echo do_shortcode('[products limit="12" columns="3" paginate="true"]'); ?>
			  </div>
			  <div class="d-block d-xl-block d-lg-none">
            <?php
            if ( woocommerce_product_loop() ) {

              /**
               * Hook: woocommerce_before_shop_loop.
               *
               * @hooked woocommerce_output_all_notices - 10
               * @hooked woocommerce_result_count - 20
               * @hooked woocommerce_catalog_ordering - 30
               */
              do_action( 'woocommerce_before_shop_loop' );

              woocommerce_product_loop_start();

              if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                  the_post();

                  /**
                   * Hook: woocommerce_shop_loop.
                   */
                  do_action( 'woocommerce_shop_loop' );

                  wc_get_template_part( 'content', 'product' );
                }
              }

              woocommerce_product_loop_end();

              /**
               * Hook: woocommerce_after_shop_loop.
               *
               * @hooked woocommerce_pagination - 10
               */
              do_action( 'woocommerce_after_shop_loop' );
            } else {
              /**
               * Hook: woocommerce_no_products_found.
               *
               * @hooked wc_no_products_found - 10
               */
              do_action( 'woocommerce_no_products_found' );
            }

            /**
             * Hook: woocommerce_after_main_content.
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );

            ?>
				  </div>
          </main>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
