<?php
class AppUserModel extends UserModel {
  
  public function __construct($id)
  {
    return parent::__construct('user', $id);  
  }
}