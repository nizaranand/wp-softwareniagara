<?php get_header(); ?>
  <div id="content">
    <div id="banner">
      <div id="banner-inner">
        <div class="wrapper">
          <h1>
            <?php printf( __( '%s Events', 'eventorganiser' ), '<span>' . single_cat_title( '', false ) . '</span>' );?>
          </h1>
        </div>
      </div>
    </div>

    <div id="content-inner">
      <div id="main" role="main">
        <?php include_once('_event_archive.php'); ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
<?php get_footer(); ?>