<?php get_header(); ?>
  <div id="content">
    <?php if (is_page() || is_single()): ?>
      <div id="banner">
        <div id="banner-inner">
          <div class="wrapper">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <hgroup>
                <h1><?php the_title(); ?></h1>
                <?php if (!is_page()): ?>
                  <h2 class="byline">
                    <?php printf(__('<i class="general foundicon-calendar"></i><time class="updated" datetime="%1$s" pubdate>%2$s</time> <i class="social foundicon-torso"></i><span class="author">%3$s</span>', 'sn'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), sn_get_the_author_posts_link()); ?>
                  </h2>
                <?php endif; ?>
              </hgroup>
            <?php endwhile; endif; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <div id="content-inner">
      <div id="main" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
            <?php if (!is_page() && !is_single()): ?>
              <header class="article-header">
                <hgroup>
                  <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <h2 class="byline">
                    <?php printf(__('<i class="general foundicon-calendar"></i><time class="updated" datetime="%1$s" pubdate>%2$s</time> <i class="social foundicon-torso"></i><span class="author">%3$s</span>', 'sn'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), sn_get_the_author_posts_link()); ?>
                  </h2>
                </hgroup>
              </header>
            <?php endif; ?>

            <section class="article-content">
              <?php if (is_single() || is_page()): ?>
                <?php the_content(); ?>
              <?php else: ?>
                <?php the_excerpt(); ?>
              <?php endif; ?>
            </section>

            <?php if (!is_single()): ?>
              <footer class="article-footer">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="button"><?php _e('Read More', 'sn'); ?></a>
              </footer>
            <?php endif; ?>
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
                <h1><?php _e("Oh, snap!", "sn"); ?></h1>
            </header>
              <section class="article-content">
                <p><?php _e("We couldn't find that thing you were looking for.", "sn"); ?></p>
            </section>
          </article>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </div>
<?php get_footer(); ?>
