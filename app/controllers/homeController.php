<?php

class homeController extends Controller
{
  public function show_home_view()
  {
    $this->show_header('header', 'home');
    $this->show_view('home');
    $this->show_footer('footer');
  }
}

?>