<?php

DEFINE('SHOW_ERRORS', 1);
error_reporting(3);
ini_set(display_errors, SHOW_ERRORS);

$db_host = "localhost";
$db_name = "iamdashnet";
$db_user = "root";
$db_pass = "";

// DB Connection
function db($action) {
     global $db_host, $db_user, $db_pass, $db_name;
     if ($action == "on") {
          if (!mysql_connect($db_host, $db_user, $db_pass)) {
               print mysql_error();
          }
          if (!mysql_select_db($db_name)) {
               print mysql_error();
          }
     } elseif ($action == "off")
          mysql_close();
}

/**
 * Prints out debug information about given variable.
 *
 * Only runs if debug level is greater than zero.
 *
 * @param boolean $var Variable to show debug information for.
 * @param boolean $showHtml If set to true, the method prints the debug data in a screen-friendly way.
 * @param boolean $showFrom If set to true, the method prints from where the function was called.
 */
function debug($var = false, $showHtml = false, $showFrom = true) {
     if (SHOW_ERRORS > 0) {
          if ($showFrom) {
               $calledFrom = debug_backtrace();
               echo '<strong>' . substr(str_replace(ROOT, '', $calledFrom[0]['file']), 1) . '</strong>';
               echo ' (line <strong>' . $calledFrom[0]['line'] . '</strong>)';
          }
          echo "\n<pre class=\"cake-debug\">\n";

          $var = print_r($var, true);
          if ($showHtml) {
               $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
          }
          echo $var . "\n</pre>\n";
     }
}

/**
 * 	@name	stringToSlug
 * 	@desc	Strip out non-alphanumeric characters and replace with a dash
 * 	@param	string	String to format
 * 	@return string	Formatted string
 * */
function stringToSlug($string) {
     return preg_replace("/[^a-zA-Z0-9\s]/", "-", strtolower(str_replace(' ', '-', $string)));
}

/**
 * 	@name	filterEmptyArrayItems
 * 	@desc	Remove empty array items
 * 	@param	array	Array to filter
 * 	@return array	Filtered array
 * */
function filterEmptyArrayItems($arr) {
     $new_arr = array();
     foreach ($arr as $key => $value) {
          if (is_null($value) || empty($value) || $value == '') {
               unset($arr[$key]);
          } else {
               $new_arr[] = $value;
          }
     }
     return $new_arr;
}

/**
 * 	@name	_getUrlVars
 * */
function _getUrlVars() {
     $urlVars = parse_url($_SERVER["REQUEST_URI"]);
     $urlVars = explode('/', $urlVars['path']);
     $urlVars = filterEmptyArrayItems($urlVars);
     reset($urlVars);
     return $urlVars;
}

/**
 * 	@name	_getCurrentPageSlug
 * */
function getCurrentPageSlug() {

     $non_templates = array('submit');


     $urlVars = _getUrlVars();
     $cur_slug = $urlVars[count($urlVars) - 1];

     if (!in_array($cur_slug, $non_templates)) {
          if ($cur_slug == '') {
               return 'home';
          }
          if (isset($_GET['page']) && $_GET['page'] == 'portfolio') {
               return 'project';
          }
          if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/pages/' . $cur_slug . '.php')) {
               return '404';
          }
     }


     return $cur_slug;
}

function snippet($text, $chars, $dots = false) {
     $end_char = substr($text, $chars, 1);
     if (preg_match('#\S#', $end_char)) {
          $chars += strpos($text, ' ', $chars) - $chars;
     }
     $ret = ($dots) ? substr($text, 0, $chars) . '...' : substr($text, 0, $chars);
     return $ret;
}

function getProjectImages($dir) {
     $image_dir = $_SERVER['DOCUMENT_ROOT'].'/images/projects/'.$dir.'/grabs';
     if (is_dir($image_dir)) {
          if ($handle = opendir($image_dir)) {
               while (($file = readdir($handle))) {
                    if ($file != 'Thumbs.db' && substr($file, 0, 1) != '.') {
                         $countAfter++;
                         $proj_images[] = $file;
                    }
               }
               closedir($handle);
          }
     }
     sort($proj_images);
     return $proj_images;
}

?>
