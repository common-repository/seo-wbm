<?php
/**
* Plugin Name: seo_wbm
* Plugin URI: http://www.websitesbymark.co.uk/seo_wbm/
* Description: The SEO plugin by Websites by Mark is an attempt to bridge the gap between current WordPress plugins and the sort of features you need in professional SEO. Currently the plugin addresses on page analysis and using competition analysis as its basis of advice.
* Version: 0.45
* Author: Mark Excell
* Author URI: http://www.websitesbymark.co.uk/
* License: You are allowed to install and use this plugin but are not allowed to change any plugin code or extract the source to include in your own project files.
*/

/** Version 0.45 - Tidy up presentation for release */
/** Version 0.4 - Give top 3 analyisis for the Body */
/** Version 0.3 - Give top 3 analyisis for the H tags */
/** Version 0.2 - Give top 3 analyisis for the path */
/** Version 0.15 - Tidy up 0.1 code */
/** Version 0.1 - Give top 3 analyisis for the title tag */

// description of fields used
require_once('data-dictionary/data-dictionary.php');


// use curl to read files
require_once('io/curl.php');

// Add meta to editor
require_once('meta/add-meta.php');
/**
 * Outputs the content of the meta box
 */
function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );

 // cp = currentpage
 // c# = competitor
 // html = page html
 // url = url
 // sp = search phrase
 // sw = search word (part of phrase)
 // tt = content within the title tag
 // am = count of items
 // cl = clean
 // ch = characters
 // bd = body html
 // ht = h tag
 // cc= clean html
 // st = strip tags

// Read current page
$cp_url = get_the_permalink();
$cp_html = curl_get_contents(get_the_permalink());

// Read url 1
$c1_url = get_post_meta( get_the_ID(), '_wbm-url-1', true );
$c1_html = curl_get_contents(get_post_meta( get_the_ID(), '_wbm-url-1', true ));

// Read url 2
$c2_url = get_post_meta( get_the_ID(), '_wbm-url-2', true );
$c2_html = curl_get_contents(get_post_meta( get_the_ID(), '_wbm-url-2', true ));

// Read url 3
$c3_url = get_post_meta( get_the_ID(), '_wbm-url-3', true );
$c3_html = curl_get_contents(get_post_meta( get_the_ID(), '_wbm-url-3', true ));

// Get whole search phrase
$sp = get_post_meta( get_the_ID(), '_wbm-search-phrase', true );

// Get search phrase explode
$sw =  explode(" ", $sp);

// title tag current
$findme   = '<title'; $pos = strpos($cp_html, $findme); $findme   = '>'; $startpos = strpos($cp_html, $findme,$pos); $findme   = '</title>'; $finalpos = strpos($cp_html, $findme,$startpos); 
$fieldlength = ($finalpos)-($startpos+1);
$cp_tt = substr ($cp_html,$startpos+1,$fieldlength);

// title tag url 1
$findme   = '<title'; $pos = strpos($c1_html, $findme); $findme   = '>'; $startpos = strpos($c1_html, $findme,$pos); $findme   = '</title>'; $finalpos = strpos($c1_html, $findme,$startpos); 
$fieldlength = ($finalpos)-($startpos+1);
$c1_tt = substr ($c1_html,$startpos+1,$fieldlength);

// title tag url 2
$findme   = '<title'; $pos = strpos($c2_html, $findme); $findme   = '>'; $startpos = strpos($c2_html, $findme,$pos); $findme   = '</title>'; $finalpos = strpos($c2_html, $findme,$startpos); 
$fieldlength = ($finalpos)-($startpos+1);
$c2_tt = substr ($c2_html,$startpos+1,$fieldlength);

// title tag url 3
$findme   = '<title'; $pos = strpos($c3_html, $findme); $findme   = '>'; $startpos = strpos($c3_html, $findme,$pos); $findme   = '</title>'; $finalpos = strpos($c3_html, $findme,$startpos); 
$fieldlength = ($finalpos)-($startpos+1);
$c3_tt = substr ($c3_html,$startpos+1,$fieldlength);

// Times whole search phrase appears in title tag?
$cp_sp_am = substr_count(strtoupper($cp_tt), strtoupper($sp));
$c1_sp_am = substr_count(strtoupper($c1_tt), strtoupper($sp));
$c2_sp_am = substr_count(strtoupper($c2_tt), strtoupper($sp));
$c3_sp_am = substr_count(strtoupper($c3_tt), strtoupper($sp));

// Times part search phrase appears in title tag?
// processing needs to happen in the loop.


// display meta input fields
require_once('meta/input-meta-fields.php');

// output seo info to screen

echo "<p><strong>Top 3 Seo analysis</p><p>Try and get within the range of your competitiors for high rankings.</strong></p><p>Over Optimised results (OO) are highlighted, under optimised in orange (UO).</p><p>WPM = Whole phrase matches</p>";

// Show Title Tag report section
require_once('report-sections/title-tag.php');

// Show Path report section
require_once('report-sections/path.php');

// Show H report section
require_once('report-sections/h.php');


// Show H report section
require_once('report-sections/body.php');

// clear the float
echo '<div style="clear:both;">&nbsp;</div>';
}

// save meta boxes
require_once('meta/save-meta.php');
?>