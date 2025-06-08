<?php

class Model
{
  public $database;

  public function __construct()
  {
    $this->database = new mysqli('localhost', 'root', '', 'meeting-system');
  }
}

?>