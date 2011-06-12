<?php
define('TO_ROOT', '../../..');
include TO_ROOT . "/includes/main.inc.php";

$Page = new ListingPattern('Catalog');

$DbConnection = DbConnection::getInstance();
$config = parse_ini_file(TO_ROOT."/configs/catalog.ini", true);

$tables = $config['tables'];
$rows_number = count($tables['table_name']);

$rows = array();
for($x=0; $x < $rows_number;$x++) {
  $rows[] = array (
        'table_name'=>$tables['table_name'][$x], 
  		'description'=>$tables['description'][$x],
      );
}

$Page->setRows($rows);

$Page->setName('table_name','Tabla');
$Page->addAction('table_name','list_table.php','Ver Registros', 'images/toolbars/list.png');
$Page->display();