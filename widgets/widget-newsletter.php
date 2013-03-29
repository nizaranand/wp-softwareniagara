<?php
/**
 * Plugin Name: Newsletter Widget.
 * Description: Sign-up for newsletter.
 * Version: 0.1
 * Author: Nickolas Kenyeres
 * Author URI: http://knicklabs.github.com
 */
add_action('widgets_init', 'newsletter_widget');

function newsletter_widget() {
   register_widget('Newsletter_Widget');
}

class Newsletter_Widget extends WP_Widget {
   function Newsletter_Widget() {
      $widget_options = array('classname' => 'widget-newsletter', 'description' => __('Display a block prompting user to sign-up to newlsetter', 'sn'));
      $control_options = array('id_base' => 'widget-newsletter');
      $this->WP_Widget('widget-newsletter', __('Newsletter Widget', 'sn'), $widget_options, $control_options);
   }

   function widget($args, $instance) {
      extract($args);

      $title = apply_filters('widget_title', $instance['title']);
      $body = $instance['body'];
      $modal = $instance['modal_id'];
      $modal_title = $instance['modal_title'];
      $modal_body = $instance['modal_body'];
      $action = $instance['action'];

      echo $before_widget;
      if ($title) {
         echo $before_title.$title.$after_title;
      }

      if ($body) {
         echo '<p>'.$body.'</p>';
      }

      if ($modal) {
         echo '<a href="#" class="button" data-reveal-id="'.$modal.'">'.__('Subscribe', 'sn').'</a>';
         echo '<div id="'.$modal.'" class="reveal-modal">';
         if ($modal_title) {
            echo '<h3>'.$modal_title.'</h3>';
         }
         if ($modal_body) {
            echo '<p>'.$modal_body.'</p>';
         }
      }
      echo '<form action="'.$action.'" method="post" id="mc-embedded-subscribe-form" class="mc-embedded-subscribe-form" data-validate="parsley" data-focus="first" target="_blank">';
      echo '<label for="mce-EMAIL">'.__('Email', 'sn').'</label>';
      echo '<input type="email" name="EMAIL" class="email" id="mce-EMAIL" placeholder="'.__('email address', 'sn').'" data-required="true" data-type="email">';
      echo '<input type="submit" value="'.__('Subscribe', 'sn').'" name="subscribe" id="mce-embedded-subscribe" class="button">';
      if ($modal) {
         echo '<a class="close-reveal-modal">x</a>';
         echo '</div>';
      }
      echo $after_widget;
   }

   function update($new_instance, $old_instance) {
      $instance = $old_instance;

      $instance['title'] = strip_tags($new_instance['title']);
      $instance['body'] = strip_tags($new_instance['body']);
      $instance['modal_id'] = strip_tags($new_instance['modal_id']);
      $instance['modal_title'] = strip_tags($new_instance['modal_title']);
      $instance['modal_body'] = strip_tags($new_instance['modal_body']);
      $instance['action'] = strip_tags($new_instance['action']);

      return $instance; 
   }

   function form($instance) {
      $defaults = array('title' => __('Subscribe', 'sn'), 'body' => __('Subscribe to our newsletter', 'sn'), 'modal_id' => 'modal-subscribe', 'action' => __('', 'sn'));
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
         <label for="<?php echo $this->get_field_id('modal_id'); ?>"><?php _e('Modal ID:', 'sn'); ?></label>
         <input id="<?php echo $this->get_field_id('modal_id'); ?>" name="<?php echo $this->get_field_name('modal_id'); ?>" value="<?php echo $instance['modal_id']; ?>" style="width:100%;" />
         <small><?php _e('Enter a unique modal id. Leave blank to display form inline.', 'sn'); ?></small>
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('modal_title'); ?>"><?php _e('Modal Title:', 'sn'); ?></label>
         <input id="<?php echo $this->get_field_id('modal_title'); ?>" name="<?php echo $this->get_field_name('modal_title'); ?>" value="<?php echo $instance['modal_title']; ?>" style="width:100%;" />
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('modal_body'); ?>"><?php _e('Modal Body:', 'sn'); ?></label>
         <textarea id="<?php echo $this->get_field_id('modal_body'); ?>" name="<?php echo $this->get_field_name('modal_body'); ?>" style="width:100%;"><?php echo $instance['modal_body']; ?></textarea>
      </p>

      <p>
         <label for="<?php echo $this->get_field_id('action'); ?>"><?php _e('Action:', 'sn'); ?></label>
         <input id="<?php echo $this->get_field_id('action'); ?>" name="<?php echo $this->get_field_name('action'); ?>" value="<?php echo $instance['action']; ?>" style="width:100%;" />
      </p>

      <?php 
   }
}
?>