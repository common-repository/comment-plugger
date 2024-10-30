<?php
/*
Plugin Name: Comment Plugger
Plugin URI: http://wordpress.org/extend/plugins/comment-plugger/
Description: Gives a list of that last people to comment on a post, with a link to their site if they provided one.
Version: 1.1
Author: Nick Momrik
Author URI: http://nickmomrik.com/
*/

function mdv_comment_plugger($before = '', $limit = 10) {
	global $wpdb, $id;

	$commenters = $wpdb->get_results("SELECT comment_author, comment_author_email, comment_author_url, UNIX_TIMESTAMP(comment_date) AS unixdate FROM $wpdb->comments WHERE comment_post_ID='$id' AND comment_approved = '1' AND comment_type <> 'pingback' AND comment_type <> 'trackback' GROUP BY comment_author_email, comment_author ORDER BY comment_date DESC LIMIT $limit");

	if ($commenters) {
		$output = '';
		$commenters = array_reverse($commenters); // Reserve the order so most recent commenter is last in the array

		foreach ($commenters as $commenter) {
			if (!empty($commenter->comment_author)) {
				if (!empty($commenter->comment_author_url))
					$output .= '<li><a href="' . $commenter->comment_author_url . '" title="Visit ' . $commenter->comment_author . '">' . $commenter->comment_author . '</a> </li>';
				else
					$output .= '<li>' . $commenter->comment_author . ' </li>';
			}
		}

		echo $before . '<ul>' . $output . '</ul>';
	}
}
?>
