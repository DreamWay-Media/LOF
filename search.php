<?php get_header(); ?>
<section  id="search-page">
  	<div class="section margin">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center">
					<div class="search-section">
						<div class="search-results">
							<div class="subtitle">search</div>
							<h1 class="text-right"><?php echo  htmlspecialchars($_GET["s"]) ;?> </h1>
							<div class="row">
									<?php if (have_posts()): ?>
          			<ul class="products columns-4">
						<?php while (have_posts()):the_post(); ?>
							<li class="product type-product post-27925 status-publish  instock has-post-thumbnail shipping-taxable purchasable product-type-simple">
                              <a href="<?=get_the_permalink(get_the_ID());?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                	<div class="img-wrapper">
										<?php
											if ( has_post_thumbnail() ) {
												the_post_thumbnail( 'medium' );
											}else{
												echo '<img src="' . get_template_directory_uri() .'/images/no-photo.jpg" />';
											}
											?>
								  </div>
												<?php if($image[0]): ?>
								 	 <img src="<?=$image[0]?>" alt="<?php the_title();?>" />
												<?php endif; ?>
								  <div class="wrapper">
										<?php
									  global $product;
									   $sku = $product->get_sku();
									   echo "<div class='meta'>" . $sku . "</div>";
																		  ?>
									  <h2 class="woocommerce-loop-product__title"><?php the_title();?></h2>
									  </div>
                                
								<div class="price-wrapper">
									<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
								 <?php echo apply_filters(
										'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
										sprintf(
											'<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
											esc_url( $product->add_to_cart_url() ),
											esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
											esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
											isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
											esc_html( $product->add_to_cart_text() )
										),
										$product,
										$args
									); ?>
								  </div>
								</a>
							</li>
						<?php endwhile; ?>
						<div class="clear"></div>
          </ul>
						<?php else: ?>
							<div><?php pll_e(' هیچ محصولی برای نمایش وجود ندارد.'); ?></div>
						<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </section>
<?php get_footer(); ?>
