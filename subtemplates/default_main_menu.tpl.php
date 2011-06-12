<?php
  if(!Session::assertLoggedIn()) {
    $_selected_menu_='logged_out';
    $_selected_tab_='login';
  }
  $Data = (object)get_defined_vars();
  $Helper = new HelperPattern($Data);
  $Helper->loadSubTemplate(THAFRAME."/subtemplates/default_main_menu.tpl.php", true); 