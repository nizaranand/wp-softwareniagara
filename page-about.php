<?php
/*
Template Name: About Page
*/
?>

<?php get_header(); ?>
  <div id="content">
    <?php if (is_page()): ?>
      <div id="banner">
        <div id="banner-inner">
          <div class="wrapper">
            <h1><?php wp_title(''); ?></h1>
          </div>
        </div>
      </div>
    <?php endif; ?>
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
              <h3 id="team"><?php _e('Our Team'); ?></h3>
              <ul class="organizers large-block-grid-2">
                <?php
                    $users = get_users('orderby=nicename&role=editor');
                    foreach ($users as $user) {
                      $user_meta = get_user_meta($user->ID);
                      echo '<li><article class="organizer row">';
                      echo get_avatar($user->user_email, $size = '150'); 
                      echo '<div class="content">';
                      echo '<h5>'.$user_meta['first_name'][0].' ' .$user_meta['last_name'][0].'</h5>';
                      echo '<dl>';
                      if (!empty($user_meta) && !empty($user_meta['twitter'])) {
                        echo '<dt>Twitter</dt>';
                        echo '<dd><a href="https://twitter.com/'.$user_meta['twitter'][0].'" title="'.__('Follow me on Twitter', 'sn').'"><i class="social foundicon-twitter"><span>'.__('Follow me on Twitter', 'sn').'</span></i></a></dd>';
                      }
                      if ($user->user_email) {
                        echo '<dt>Email</dt>';
                        echo '<dd><a href="mailto:'.$user->user_email.'" title="'.__('Send me an email', 'sn').'"><i class="general foundicon-mail"><span>'.__('Send me an email', 'sn').'</span></i></a></dd>';
                      }
                      if ($user->user_url) {
                        echo '<dt>Website</dt>';
                        echo '<dd><a href="'.$user->user_url.'" title="'.__('Visit my website').'"><i class="general foundicon-globe"><span>'.__('Visit my website', 'sn').'</span></i></a></dd>';
                      }
                      echo '</dl>';
                      echo '<div class="clear"></div>';
                      echo '</div>';
                      echo '</article></li>';
                    }
                ?>
                </ul>
            </section>
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
      <?php get_sidebar(); ?>
    </div>
  </div>
<?php get_footer(); ?>
