<?php
define('TO_ROOT', '../..');
include TO_ROOT . "/includes/main.inc.php";
assertLoggedIn();
$Page = new PagePattern('Admin');
$Page->display();