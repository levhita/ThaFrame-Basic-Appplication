<?php
  /**
   * Configuration file for the application, based on the default ThaFrame Configuration File
   *
   * @package Cepos
   * @author Argel Arias <levhita@gmail.com>
   * @copyright Copyright (c) 2011, Argel Arias <levhita@gmail.com>
   * @license http://opensource.org/licenses/gpl-license.php GNU Public License
   * @filesource
   */
  
  /** Framework Path **/ 
  define('THAFRAME', TO_ROOT . "/../thaframe");
  
  include THAFRAME . "/core/Autoloader.php";
  Autoloader::registerAutoload();
  
  $Config = Config::getInstance();
  
  /** System Info **/
  define('SYSTEM_WEB_ROOT'  , $Config->system_web_root);
  define('SYSTEM_NAME'      , $Config->system_name);
  define('SYSTEM_COPYRIGHT' , $Config->system_copyright);
  define('SYSTEM_AUTHOR'    , $Config->system_author);
  define('SYSTEM_LANGUAGE'  , $Config->system_language);

  ini_set('session.use_only_cookies', 1);
  ini_set('session.cookie_lifetime', 0);
  //ini_set('session.cookie_domain', 'cepos.thasystems.net');
  
  session_start();
  
  /** Enable short open tags to improve template design **/ 
  ini_set( "short_open_tag", 1 );
   
  include THAFRAME . "/core/functions.inc.php";
  /*include TO_ROOT . "/includes/functions.inc.php";
  include THAFRAME . "/includes/DbConnection.inc.php";*/
  
  $start_time = Utils::microtime_float();
    
  /** Default Language **/
  //Utils::LoadLanguage();
  include TO_ROOT . '/languages/spanish_lang.php';
  include TO_ROOT . '/includes/functions.inc.php';
  