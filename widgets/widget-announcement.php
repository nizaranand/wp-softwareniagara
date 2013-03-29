<?php
/**
 * Plugin Name: Announcement Widget.
 * Description: Announcement something and link to somewhere.
 * Version: 0.1
 * Author: Nickolas Kenyeres
 * Author URI: http://knicklabs.github.com
 */
add_action('widgets_init', 'announcement_widget');

function announcement_widget() {
   register_widget('Announcement_Widget');
}

class Announcement_Widget extends WP_Widget {
   function Announcement_Widget() {
      $widget_options = array('classname' => 'widget-announcement', 'description' => __('Display a block for an announcement', 'sn'));
      $control_options = array('id_base' => 'widget-announcement');
      $this->WP_Widget('widget-announcement', __('Announcement Widget', 'sn'), $widget_options, $control_options);
   }

   function widget($args, $instance) {
      extract($args);

      $title = apply_filters('widget_title', $instance['title']);
      $body = $instance['body'];
      $link_title = (isset($instance['link_title'])) ? $instance['link_title'] : __('Read more', 'sn');
      $link_url = $instance['link_url'];

      echo $before_widget;
      if ($title) {
         echo $before_title.$title.$after_title;
      }

      if ($body) {
         echo '<p>'.$body.'</p>';
      }

      if ($link_title && $link_url) {
         echo '<a href="'.$link_url.'" title="'.$link_title.'" class="button">'.$link_title.'</a>';
      }
      echo $after_widget;
   }

   function update($new_instance, $old_instance) {
      $instance = $old_instance;

      $instance['title'] = strip_tags($new_instance['title']);
      $instance['body'] = strip_tags($new_instance['body']);
      $instance['link_title'] = strip_tags($new_instance['link_title']);
      $instance['link_url'] = strip_tags($new_instance['link_url']);

      return $instance; 
   }

   function form($instance) {
      $defaults = array('title' => __('My Announcement', 'sn'), 'body' => __('I have something to say.', 'sn'), 'link_title' => __('Read more'));
      $instance = wp_parse_args((array)$instance, $defaults);
      ?>

      <p>
         <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'sn'); ?></label>
         <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('body'); ?>"><?php _e('Body:', 'sn'); ?></label>
         <textarea id="<?php echo $this->get_field_id('body'); ?>" name="<?php echo $this->get_field_name('body'); ?>" style="width:100%;"><?php echo $instance['body']; ?></textarea>
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('link_title'); ?>"><?php _e('Link Title:', 'sn'); ?></label>
         <input id="<?php echo $this->get_field_id('link_title'); ?>" name="<?php echo $this->get_field_name('link_title'); ?>" value="<?php echo $instance['link_title']; ?>" style="width:100%;" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('link_url'); ?>"><?php _e('Link URL:', 'sn'); ?></label>
         <input id="<?php echo $this->get_field_id('link_url'); ?>" name="<?php echo $this->get_field_name('link_url'); ?>" value="<?php echo $instance['link_url']; ?>" style="width:100%;" />
      </p>

      <?php 
   }
}
?>