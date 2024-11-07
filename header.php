<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="canonical" href="<?php bloginfo('wpurl'); ?>" />
    <title><?php  is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>
    <div class="container">
      <div class="top-block">
        <div class="row">
          <div class="col-lg-2 text-left col-12">
            <div class="header-logo wow fadeInDown" data-wow-duration="0.7s">
              <a href="<?=home_url();?>">
              <img class="logo" src="<?php echo get_template_directory_uri();?>/imgs/logo.png" alt="Omega Food">
              </a>
            </div>
          </div>
          <div class="col-lg-8 col-12">
            <div class="search-holder">
				<?php if(is_active_sidebar('search ')):?>
                  <?php dynamic_sidebar( 'search ' ); ?>
                <?php endif;?>
<!--               <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <button type="submit" class="submit" name="submit" id="searchsubmit"><img src="<?php echo get_template_directory_uri();?>/imgs/search-icon.png" alt="Omega Food Search"></button>
                <input type="text" class="field" name="s" id="s" placeholder="Search..." />
				  <input type="hidden" name="post_type[]" value="product" />
              </form> -->
              <div class="clear"></div>
              </div>
          </div>
          <div class="col-lg-2 d-none d-lg-block">
            <div class="wrapper">
              <a href="<?=home_url();?>/request-quote/" class="g-btn">Request a Quote</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-block">
      <div class="container">
        <div class="row">
          <div class="col-3 d-lg-block d-none">
            <div class="cat-menu">
              <?php wp_nav_menu( array( 'theme_location' => 'cat-menu' ) ); ?>
            </div>
          </div>
          <div class="col-lg-9 d-lg-block d-none">
            <div class="main-menu">
              <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
            </div>
          </div>
          <div class="d-lg-none col-6">
            <div class="wrapper">
              <a href="<?=home_url();?>/request-quote/" class="g-btn">Request a Quote</a>
            </div>
          </div>
          <div class="d-lg-none col-6">
            <div class="burger">
              <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><img src="<?php echo get_template_directory_uri();?>/imgs/cat-bar.png" alt="Omega Food"></button>

              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-body">
                  <div class="main-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
