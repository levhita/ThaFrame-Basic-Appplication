<?php
define('TO_ROOT', '.');
include TO_ROOT . "/includes/main.inc.php";

$Page = new PagePattern();
$Page->setPageName('Home');

$Page->display();
