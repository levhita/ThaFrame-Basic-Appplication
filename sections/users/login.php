<?php
define('TO_ROOT', '../..');
include TO_ROOT . "/includes/main.inc.php";

$Page = new PagePattern('Login');

$Page->_on_load = 'focusOnFirst()';

$Page->display();