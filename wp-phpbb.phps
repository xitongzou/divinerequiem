<?php
/*
Plugin Name: WP-phpBB
Plugin URI: http://yoda.gatewayy.net/index.php/wp-phpbb/wp-phpbb/
Description: This plugin gives you the recent posts in your phpBB
Version: .91
Author: Brandon Alexander
Author URI: http://yoda.gatewayy.net/
*/

/*
Copyright (c) 2005 by Brandon Alexander

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
//show_posts method takes an integer as a parameter and sets the default to 10
function show_posts($limit = 10) 
{
	global $wpdb;
	//Put your phpBB and wordpress database info here:
	$WPDB = "WPdatabase"; //WP db name
	$PHPBBDB = "PHPBBdatabase";  //phpBB db name
	$USERS_TABLE = "phpbb_users";  //phpbb user table
	$TOPICS_TABLE = "phpbb_topics";  //phpbb topics table
	$POSTS_TABLE = "phpbb_posts";  //phpbb posts table
	$SITEURL = "forum url";  //Forum URL without trailing /
	//Do not edit beyond this point
	
	$wpdb->select($PHPBBDB);
	
	$results = $wpdb->get_results("SELECT * FROM $POSTS_TABLE ORDER BY post_time DESC LIMIT $limit");
	  
	if ($results) 
	{
		foreach ($results as $post)
		{
			$user = $wpdb->get_row("SELECT * FROM $USERS_TABLE WHERE user_id = $post->poster_id");
			$topic = $wpdb->get_row("SELECT * FROM $TOPICS_TABLE WHERE topic_id = $post->topic_id");
			
			if($user && $topic)
			{
				echo "<li>\n";
				echo "<a href='" . $SITEURL . "/viewtopic.php?t=$post->topic_id'>";
				echo "<strong>Poster: </strong>$user->username<br />\n";
				echo "<strong>Topic: </strong>$topic->topic_title<br />\n";
				echo "<strong>Date: </strong>" . date("D M d, Y g:i a", $post->post_time) . "<br />\n";
				echo "</a><br />";
				echo "</li>";
			}
		}
	}
    
	$wpdb->select($WPDB);
}

?>