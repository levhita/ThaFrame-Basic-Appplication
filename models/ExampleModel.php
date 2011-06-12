<?php
/**
 * 
 * Enter description here ...
 * @author levhita
 *
 */
class ExampleModel extends RowModel{
  
  protected static $_table_name = 'example';
  protected static $_id_field   = 'example_id';
  
  public function __construct($id)
  {
    return parent::__construct(self::$_table_name, $id);  
  }
}