<?php
define('TO_ROOT', '../../..');
include TO_ROOT . "/includes/main.inc.php";
include TO_ROOT . "/includes/ajax_server.php";

$Page = new PagePattern('Editar');

$table_name = $_GET['table_name'];
$id   = (empty($_GET["{$table_name}_id"])) ? 0 : Utils::cleanToDb($_GET["{$table_name}_id"]);

$Row = new RowModel($table_name, (int)$id, $DbConnection);
$Row->load();
$Form=new FormPattern();

$Form->setRow($Row);
$Form->loadConfig("{$table_name}_catalog", false);

$aux = array(
	'label' => t('Table name'),	
	'type' => 'hidden',	
	'value' => $table_name
);

$Form->insertField('table_name', $aux , "{$table_name}_id", 'before');
$Form->hideField("{$table_name}_id");
$Form->AddGeneralAction('javascript:history.back()','Back',"/images/toolbars/undo.png");
$Form->AddGeneralAction('saveCatalogRow','Save Row',"/images/toolbars/save.png",true);
$Page->assign('form', $Form->getAsString());
$Page->display();
