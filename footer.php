    <footer class="footer" role="contentinfo">
      <div id="footer-inner">
        <div class="site-details">
          <p><?php bloginfo('description'); ?></p>
          <p class="copyright"><small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved', 'sn'); ?>.</small></p>
        </div>
        <nav class="site-links" role="navigation">
          <?php sn_footer_links(); ?>
        </nav>
      </div>
    </footer>
		<?php wp_footer(); ?>
	</body>
</html>
