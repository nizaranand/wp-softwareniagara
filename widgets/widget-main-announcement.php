<?php
/**
 * Plugin Name: Main Announcement Widget.
 * Description: A major announcement.
 * Version: 0.1
 * Author: Nickolas Kenyeres
 * Author URI: http://knicklabs.github.com
 */
add_action('widgets_init', 'dynamic_announcement_widget');

function dynamic_announcement_widget() {
   register_widget('Dynamic_Announcement_Widget');
}

class Dynamic_Announcement_Widget extends WP_Widget {
   function Dynamic_Announcement_Widget() {
      $widget_options = array('classname' => 'widget-dynamic-announcement', 'description' => __('Display most recent post with tag', 'sn'));
      $control_options = array('id_base' => 'widget-dynamic-announcement');
      $this->WP_Widget('widget-dynamic-announcement', __('Dynamic Announcement Widget', 'sn'), $widget_options, $control_options);
   }

   function widget($args, $instance) {
      extract($args);

      $title = apply_filters('widget_title', $instance['title']);
      $tag = $instance['tag'];

      echo $before_widget;
      if ($title) {
         echo $before_title.$title.$after_title;
      }

      if ($tag) {
        $q = new WP_Query(array('tag' => $tag));
        if ($q->have_posts()) {
          while ($q->have_posts()) {
            $q->the_post();
            echo '<h3>'.get_the_title().'</h3>';
            echo '<p>'.get_the_excerpt().'</p>';
            echo '<a href="'.get_permalink().'" class="button">Read More</a>';
          }
        }
      }
      wp_reset_query();

      echo $after_widget;
   }

   function update($new_instance, $old_instance) {
      $instance = $old_instance;

      $instance['title'] = strip_tags($new_instance['title']);
      $instance['tag'] = strip_tags($new_instance['tag']);

      return $instance; 
   }

   function form($instance) {
      $defaults = array();
      $instance = wp_parse_args((array)$instance, $defaults);
      ?>

      <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'sn'); ?></label>
         <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
      </p>


      <p>
         <label for="<?php echo $this->get_field_id('tag'); ?>"><?php _e('Tag(s):', 'sn'); ?></label>
         <input id="<?php echo $this->get_field_id('tag'); ?>" name="<?php echo $this->get_field_name('tag'); ?>" value="<?php echo $instance['tag']; ?>" style="width:100%;" />
      </p>
      <?php 
   }
}
?>