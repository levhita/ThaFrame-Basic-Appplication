<?php
define('TO_ROOT', '../..');
include TO_ROOT . "/includes/main.inc.php";

$Page = new PagePattern('Validates Login');

$Request = PostRequest::getInstance();
if ( !isset($Request->user) || !isset($Request->password) ){
  $Page->goToPage('login.php', 'User or password wrong', GOTO_MESSAGE_ERROR);
}
if(!$User = UserModel::getUserByName($Request->user) ){
  $Page->goToPage('login.php', 'User or password wrong', GOTO_MESSAGE_ERROR);
}

if ( !$User->validatePassword($Request->password) ) {
  $Page->goToPage('login.php', 'User or password wrong', GOTO_MESSAGE_ERROR);
}

Session::setAsLoggedIn($User->getId());
$Page->goToPage(TO_ROOT .'/sections/dashboard/', 'Successfully Logged In', GOTO_MESSAGE_SUCCESS);