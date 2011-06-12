<?php
  /** Functions to be added into the xajax server **/  
  $functions = array();
  
  /*
   * Provides a set of function that can be  call trough xajax functions
   * @package ThaFrame
   */
  if ( !defined('TO_ROOT') ) {
    define('TO_ROOT', '..');
    header("Cache-Control: no-cache, must-revalidate");
    ini_set('html_errors', 0);
  }
  require_once TO_ROOT . "/includes/main.inc.php";
  require_once THAFRAME . "/vendors/xajax/xajax.inc.php";
    
  /**
   * Saves a Generic {@link Row} of Data, to be used at catalog
   *
   * @param Array $data
   * @return xajaxResponse
   *
   * @todo Custom error Message
   */
  function saveCatalogRow($data)
  {    
    if ( !Session::assertLoggedIn() ) {
      die();
    }
    
    $DbConnection = DbConnection::getInstance();
    $User = Session::getUser();
    
    $objResponse = new xajaxResponse();
    
    if (!$User->hasPermission('/', all) ) {
      die();
    }
    
    $table_name = $data['table_name'];
    unset($data['table_name']);
   
    if( ! XajaxHelper::saveRow($data, $table_name) ){
      $objResponse->addAlert(   t("Couldn't save data: %1% ", $DbConnection->getErrorsString()));
      return $objResponse;
    }
    
    $objResponse->addRedirect( TO_ROOT . "/catalog/list_table.php?table_name=$table_name");
    return $objResponse;
  }
  $functions[] ='saveCatalogRow';
  
  $xajax = new xajax(TO_ROOT ."/includes/ajax_server.php");
  
  foreach($functions AS $function){
    $xajax->registerFunction($function);
  }
  $xajax->processRequests();
?>
