<?php

class Controller
{
  public function show_header($header_name, $title)
  {
    require 'views/layout/' . $header_name . '.php';
  }

  public function show_view($view_name, $data = [])
  {
    require 'views/' . $view_name . '.php';
  }

  public function show_footer($footer_name)
  {
    require 'views/layout/' . $footer_name . '.php';
  }

  public function model($model_name)
  {
    require 'app/models/' . $model_name . '.php';
    return new $model_name;
  }
}

?>