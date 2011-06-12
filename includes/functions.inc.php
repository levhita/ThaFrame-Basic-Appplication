<?php
function assertLoggedIn() {
  if ( !Session::assertLoggedIn() ) {
    PagePattern::goToPage(TO_ROOT . '/sections/users/login.php', t('User not logged in'), GOTO_MESSAGE_WARNING);
  }
}