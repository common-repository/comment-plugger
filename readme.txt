=== Comment Plugger ===
Contributors: nickmomrik
Tags: comments, links, plugger
Stable tag: trunk

Gives a list of that last people to comment on a post, with a link to their site if they provided one.

== Installation ==
1. Upload `comment-plugger.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php mdv_comment_plugger(); ?>` in your template where you want the commenter "plugs" to display.

== Configuration ==
You may pass parameters when calling the function to configure some of the options.
Example: `mdv_comment_plugger('Last Commented By: ', 7)`

The parameters:
$before - text to be displayed before the commenters names are displayed
$limit - the maximum number of commenter names to display (default is 10)
