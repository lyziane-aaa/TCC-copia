 <?php
if (!isset($_SESSION)) {
		session_start();
	}
ob_start();
$dir = __DIR__;
$dir = substr($dir,0,20);
define('SITE_ROOT',$dir);
