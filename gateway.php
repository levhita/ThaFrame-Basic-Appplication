<?php
/**
 * Provides a gateway between files that are menat to be served directly by
 * the webserver, without having to make thaframe publicy accesible.
 *
 * @package ThaFrame
 * @author Argel Arias <levhita@gmail.com>
 * @copyright Copyright (c) 2007, Argel Arias <levhita@gmail.com>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version 22
 * @filesource
 */

define('TO_ROOT', '.');
include TO_ROOT . "/includes/main.inc.php";

$file = $_GET['file'];

$match=FALSE;
$allowed_extensions = array('png','jpg','gif','js','txt','html', 'css');
foreach($allowed_extensions AS $extension){
  if ( preg_match("/\.$extension$/i", $file) > 0) {
    $match=TRUE;
  }
}
if ( !$match ) {
  header("HTTP/1.0 403 Forbidden");
  loadErrorPage('403');
}

/** Sanitize access to folders up in the hierarchy **/
if(strpos($file,"../")!==FALSE){
  header("HTTP/1.0 403 Forbidden");
  loadErrorPage('403');
}

$filename = THAFRAME . "/gateway/$file";

if ( !file_exists($filename) ) {
  header("HTTP/1.0 404 Not Found");
  loadErrorPage('404');
}

$MimeType = new MimeType();
$basename = basename($filename);
$mimetype = $MimeType->getType($filename);

header("Content-type: $mimetype");
header("Expires: ");
header("Cache-Control: ");
header("Pragma: ");
header("Etag: \"". md5_file($filename)."\"");
header('Content-Length: '. filesize($filename));

if ( @readfile($filename)===false ) {
  header("HTTP/1.0 500 Internal Server Error");
  loadErrorPage('500');
}
