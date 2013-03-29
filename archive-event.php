<?php get_header(); ?>
  <div id="content">
    <div id="banner">
      <div id="banner-inner">
        <div class="wrapper">
          <h1>
            <?php
            if (eo_is_event_archive('day')) {
               //Viewing date archive
               echo __('Events: ','eventorganiser').' '.eo_get_event_archive_date('jS F Y');
            } elseif (eo_is_event_archive('month')) {
               //Viewing month archive
               echo __('Events: ','eventorganiser').' '.eo_get_event_archive_date('F Y');
            } elseif (eo_is_event_archive('year')) {
               //Viewing year archive
               echo __('Events: ','eventorganiser').' '.eo_get_event_archive_date('Y');
            } else {
               _e('Events','eventorganiser');
             }
            ?>
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