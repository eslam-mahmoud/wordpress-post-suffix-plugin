<?php
/*
Plugin Name: Wordpress post suffix
Plugin URI: http://eslam.me
Description: Add some content to the bottom of each post on the fly, will not be saved.
Version: 1.0
Author: Eslam Mahmoud
License: GPL2
*/
//Blocking direct access to the plugin
defined('ABSPATH') or die("No script kiddies please!");

//check if the function was not already defined
if( !function_exists("eslam_me_wordpress_post_suffix")){
	function eslam_me_wordpress_post_suffix($content){
		$post_link = get_permalink($GLOBALS['post']->post_id);
		$post_title = $GLOBALS['post']->post_title;

		$suffix = '
		<div class="eslam_me_wordpress_post_suffix">
			<a target="_blank" href="' . $post_link . '">
			    <img style="margin: 0 5px;" alt="Comments button" src="'.plugins_url( 'images/comments.png', __FILE__).'">
			</a>
			<a target="_blank" href="https://twitter.com/intent/tweet?text=' . $post_title . ' by @eslam_mahmoud&url=' . urlencode($post_link) . '">
			    <img style="margin: 0 5px;" alt="Twitter button" src="'.plugins_url( 'images/twitter.png', __FILE__).'">
			</a>
			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . urlencode($post_link) . '">
			    <img style="margin: 0 5px;" alt="Facebook button" src="'.plugins_url( 'images/facebook.png', __FILE__).'">
			</a>
			<a target="_blank" href="http://www.linkedin.com/shareArticle?url=' . urlencode($post_link) . '&title=' . $post_title . '&summary=' . $post_title . '">
			    <img style="margin: 5px;" alt="LinkedIn button" src="'.plugins_url( 'images/linkedin.png', __FILE__).'">
			</a>
			<a target="_blank" href="https://plus.google.com/share?url=' . urlencode($post_link) . '">
			    <img style="margin: 0 5px;" alt="Google+ button" src="'.plugins_url( 'images/googleplus.png', __FILE__).'">
			</a>
		</div>
		';

		//to change the posts only
		if( !is_page( ) ){
			// append the $suffix text to the end of `the_content`
			return $content . $suffix;
		} else{
			return $content;
		}
	}

	//add our filter function to the hook
	add_filter('the_content', 'eslam_me_wordpress_post_suffix');
}

?>
