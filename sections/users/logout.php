<?php
define('TO_ROOT', '../..');
include TO_ROOT . "/includes/main.inc.php";

$Page = new PagePattern();
Session::deleteSession();
$Page->goToPage('login.php', t('Succesfully Logged Out'), 'success');