<?php
/*
Plugin Name: SimpleCode for WordPress
Plugin URI: http://www.village-idiot.org/archives/2006/04/09/wp-simplecode/
Description: Simplecode for WordPress takes ordinary markup, and processes it for use within code examples. It's inspired by Dan Cederholm's SimpleCode script.
Author: whoo
Version: 2.5
Author URI: http://www.village-idiot.org/
*/ 


function sc_menu () {

	add_submenu_page('post-new.php', 'SimpleCode', 'SimpleCode', 9, basename(__FILE__), 'sc_form');

}

function sc_form () {
echo "<div class=\"wrap\">";
echo "<h2>SimpleCode</h2>";
echo "<p>Enter normal (X)HTML in the markup box below. Press \"Process\" and it will spit out entity-encoded markup suitable for &lt;code&gt; examples.</p>";
echo "<h3>1. Enter Markup</h3>";
echo "<div class=\"form\">";?>
<form action="post-new.php?page=<?php echo basename(__FILE__); ?>" method="post">
<?php
echo "<textarea name=\"html\" rows=\"10\" cols=\"40\"></textarea><br />";
echo "<input name=\"send\" type=\"submit\" id=\"send\" value=\"Process\" class=\"submit\" /></form></div>";
echo "<h3>2. Cut n' Paste</h3>";
echo "<div class=\"paste\">";
echo "<textarea rows=\"10\" cols=\"40\">";
echo "&lt;code&gt;";
if( $_POST['send'] ) {
echo nl2br((htmlentities(htmlentities(stripslashes($_REQUEST["html"])))));
}
echo "&lt;/code&gt;";
echo "</textarea>";
echo "</div>";
echo "<h3>3. Preview</h3>";
echo "<div class=\"preview\">";
echo "<textarea rows=\"10\" cols=\"40\">";
echo "<pre>";
if( $_POST['send'] ) {
echo stripslashes($_REQUEST["html"]);
}
echo "</pre></textarea>";
echo "</div>";
echo "</div>";
}
add_action('admin_menu', 'sc_menu');
?>