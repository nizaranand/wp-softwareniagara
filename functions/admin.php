<?php
// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

function change_contact_info($contactmethods) {
   unset($contactmethods['aim']);
   unset($contactmethods['yim']);
   unset($contactmethods['jabber']);
   $contactmethods['facebook'] = 'Facebook';
   $contactmethods['twitter'] = 'Twitter';
   $contactmethods['linkedin'] = 'LinkedIn';
   $contactmethods['googleplus'] = 'Google+';
   return $contactmethods;
}
add_filter('user_contactmethods', 'change_contact_info');