<?php if ( have_posts() ) : ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
      <header class="article-header">
        <hgroup>
          <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
          <h2 class="byline">
            <?php
            //Format date/time according to whether its an all day event.
            //Use microdata http://support.google.com/webmasters/bin/answer.py?hl=en&answer=176035
            if( eo_is_all_day() ){
               $format = 'd F Y';
               $microformat = 'Y-m-d';
            }else{
               $format = 'd F Y '.get_option('time_format');
               $microformat = 'c';
            }?>
            <i class="social foundicon-torso"></i>
            <time itemprop="startDate" datetime="<?php eo_the_start($microformat); ?>"><?php eo_the_start($format); ?></time>
          </h2>
        </hgroup>
      </header>

      <section class="article-content">
         <?php the_excerpt(); ?>
      </section>     

      <?php if (!is_single()): ?>
        <footer class="article-footer">
          <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="button"><?php _e('Read More', 'sn'); ?></a>
        </footer>
      <?php endif; ?> 
    </article><!-- #post-<?php the_ID(); ?> -->
  <?php endwhile; ?><!--The Loop ends-->

  <?php 
   if ($wp_query->max_num_pages > 1): ?>
      <nav id="nav-below">
         <div class="nav-next events-nav-newer"><?php next_posts_link( __( 'Later events <span class="meta-nav">&larr;</span>' , 'eventorganiser' ) ); ?></div>
         <div class="nav-previous events-nav-newer"><?php previous_posts_link( __( ' <span class="meta-nav">&rarr;</span> Newer events', 'eventorganiser' ) ); ?></div>
      </nav><!-- #nav-below -->
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