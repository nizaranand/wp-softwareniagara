<?php get_header(); ?>
  <div id="content">
    <div id="banner">
      <div id="banner-inner">
        <div class="wrapper">
        <?php if (is_active_sidebar('banner')): ?>
          <?php dynamic_sidebar('banner'); ?>
        <?php else: ?>
          <?php include 'partials/_widget-missing.php'; ?>
        <?php endif; ?>
        </div>
      </div>
    </div>
    <div id="content-inner">
      <div id="main" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
            <?php if (!is_page()): ?>
              <header class="article-header">
                <hgroup>
                  <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <h2 class="byline">
                    <?php printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'sn'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), sn_get_the_author_posts_link(), get_the_category_list(', ')); ?>
                  </h2>
                </hgroup>
              </header>
            <?php endif; ?>

            <section class="article-content">
              <?php the_content(); ?>
            </section>

            <footer class="article-footer">
              <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'sn') . '</span> ', ', ', ''); ?></p>
            </footer>
          </article>
        <?php endwhile; ?>
          <?php if (function_exists('sn_page_navi')): ?>
              <?php sn_page_navi(); ?>
          <?php else: ?>
            <nav class="wp-prev-next">
              <ul class="clearfix">
                <li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "sn")) ?></li>
                <li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "sn")) ?></li>
              </ul>
            </nav>
          <?php endif; ?>
        <?php else : ?>
          <article id="post-not-found">
              <header class="article-header">
                <h1><?php _e("Oops, Post Not Found!", "sn"); ?></h1>
            </header>
              <section class="article-content">
                <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "sn"); ?></p>
            </section>
            <footer class="article-footer">
                <p><?php _e("This is the error message in the index.php template.", "sn"); ?></p>
            </footer>
          </article>
        <?php endif; ?>
      </div>
      <div class="home-regions">
        <div class="widget-wrapper">
          <?php if (is_active_sidebar('home-region-left')): ?>
            <div class="widget-icon"><i class="general foundicon-inbox"></i></div>
            <?php dynamic_sidebar('home-region-left'); ?>
          <?php else: ?>
            <?php include 'partials/_widget-missing.php'; ?>
          <?php endif; ?>
        </div>
        <div class="widget-wrapper">
          <?php if (is_active_sidebar('home-region-center')): ?>
            <div class="widget-icon"><i class="general foundicon-flag"></i></div>
            <?php dynamic_sidebar('home-region-center'); ?>
          <?php else: ?>
            <?php include 'partials/_widget-missing.php'; ?>
          <?php endif; ?>
        </div>
        <div class="widget-wrapper">
          <?php if (is_active_sidebar('home-region-right')): ?>
            <div class="widget-icon"><i class="general foundicon-smiley"></i></div>
            <?php dynamic_sidebar('home-region-right'); ?>
          <?php else: ?>
            <?php include 'partials/_widget-missing.php'; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
