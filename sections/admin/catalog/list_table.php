<?php
define('TO_ROOT', '../../..');
include TO_ROOT . "/includes/main.inc.php";

$Page = new ListingPattern();


if( !empty($_GET['table_name']) ) {
 $table_name = $_GET['table_name'];
} else {
 $Page->goToPage('index.php',"Esa tabla no existe");
}
$Page->setPageName("Editar tabla: $table_name");

$DbConnection = DbConnection::getInstance();
$sql = "SELECT * FROM $table_name;";
$rows = $DbConnection->getAllRows($sql);

$Page->setRows($rows);
$Page->hideField("{$table_name}_id");

//$Page->addLink("{$table_name}_id","{$table_name}_id", "edit.php?table_name=$table_name",'Editar Registro');
$Page->addAction("{$table_name}_id", "edit.php?table_name=$table_name",'Editar Registro', 'images/toolbars/edit.png');
$Page->addGeneralAction("javascript:history.back()",'Back','',0, 'images/toolbars/undo.png');
$Page->addGeneralAction("edit.php?table_name=$table_name",'Add Register',"{$table_name}_id",0, 'images/toolbars/add.png');
$Page->display();