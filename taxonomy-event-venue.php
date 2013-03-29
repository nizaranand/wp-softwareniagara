<?php get_header(); ?>
  <div id="content">
    <div id="banner">
      <div id="banner-inner">
        <div class="wrapper">
          <h1>
            <?php $venue_id = get_queried_object_id(); ?>
            <?php printf( __( 'Events at %s', 'eventorganiser' ), '<span>' .eo_get_venue_name($venue_id). '</span>' );?>
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