<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package ferry
 */

get_header(); ?>
<!--==================== ti breadcrumb section ====================-->
<div class="ferry-breadcrumb-section" >
  <div class="overlay">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="ferry-page-breadcrumb">
            <li><a href="<?php echo esc_url(home_url());?>"><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="#"><?php _e('404','ferry'); ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--==================== ti breadcrumb section end ====================-->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center ferry-section">
        <div id="primary" class="content-area">
          <main id="main" class="site-main" role="main">
            <div class="ferry-error-404">
              <h1><?php _e('4','ferry'); ?><i class="fa fa-times-circle-o"></i><?php _e('4','ferry'); ?></h1>
              <h4>
                <?php esc_html_e( 'Oops! That page can&rsquo;t be found.','ferry' ); ?>
              </h4>
              <p>
                <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ferry' ); ?>
              </p>
              <a href="<?php echo esc_url(home_url());?>" onClick="history.back();" class="btn btn-theme"><?php _e('Go Back','ferry'); ?></a> </div>
            <section class="error-404 not-found">
              <header class="page-header">
                <h1 class="page-title"></h1>
              </header>
              <!-- .page-header -->
              
              <div class="page-content">
                <div class="col-md-4 col-md-offset-4">
                  <div class="ferry-sidebar">
                    <?php
						get_search_form();
					?>
                  </div>
                </div>
              </div>
              <!-- .page-content --> 
            </section>
            <!-- .error-404 --> 
            
          </main>
          <!-- #main --> 
        </div>
        <!-- #primary --> 
      </div>
    </div>
  </div>
</main>
<?php
get_footer();