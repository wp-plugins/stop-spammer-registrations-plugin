<?php
// just to be absolutely safe
if (!defined('ABSPATH')) exit;

/*
	the principle of this plugin is to redirect options from network blogs to the global
	options in blog #1. In this way stats and options for all blogs can be controlled by one blog.
	
	1) hook the init before the main plugin does.
	2) see if the MU flag is set in the blog 1 options.
	3) set the options hooks
*/

// kpg_sf_mu_load loads up early to hook the mu options
function kpg_sf_mu_load() {
	// remove the hooks so we don't recurse.
	remove_action('init','kpg_sf_mu_load');
	kpg_ssp_global_setup(); // redirects options
	kpg_load_all_checks();
}	

// load up the get_options code
require_once('stop-spam-reg-get-options.php');

function kpg_sp_rightnow_mu() {
	$stats=kpg_sp_get_stats();
	extract($stats);
	switch_to_blog(1);
	//options-general.php?page=stop-spammer-registrations-plugin/settings/stop-spam-reg-options.php
	//$ppath=plugin_dir_path( __FILE__ ).'/settings/';
	//$me=get_admin_url( 1,$ppath.'stop-spam-reg-stats.php');
	$me=get_admin_url(1,'network/settings.php').'?page=stop-spammer-registrations-plugin/settings/stop-spam-reg-stats.php';
	restore_current_blog();
	if ($spmcount>0) {
		// steal the akismet stats css format 
		// get the path to the plugin
		echo "<p><a style=\"font-style:italic;\" href=\"$me\">Stop Spammers</a> has prevented $spmcount spammers from registering or leaving comments.";
		echo"</p>";
	} else {
		echo "<p><a style=\"font-style:italic\" href=\"$me\">Stop Spammers</a> has not stopped any spammers, yet.";
		echo"</p>";
	}
	if (count($wlreq)==1) {
		echo "<p><a style=\"font-style:italic;\" href=\"$me\">".count($wlreq)." user</a> has been denied access and requested that you add them to the white list";
		echo"</p>";
	} else if (count($wlreq)>0) {
		echo "<p><a style=\"font-style:italic;\" href=\"$me\">".count($wlreq)." users</a> have been denied access and requested that you add them to the white list";
		echo"</p>";
	}
	
}

// mu admin stuff

// add an admin menu item to the plugin screen
if (has_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links' ) ) 
remove_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links', 10, 2 );
add_filter( 'plugin_action_links', 'kpg_sp_plugin_action_links_mu', 10, 2 );
function kpg_sp_plugin_action_links_mu( $links, $file ) {
	if ( basename($file) == basename(__FILE__))  {
		switch_to_blog(1);
		$ppath=plugin_dir_path( __FILE__ ).'/network/settings/';
		$me=get_admin_url( 1,$ppath.'stop-spam-reg-stats.php');
		restore_current_blog();
		$links[] = "<a href=\"$me\">".__('Settings').'</a>';
	}
	return $links;

}

?>