<?php

class App
{
  public function __construct()
  {
    $request_method = $_SERVER['REQUEST_METHOD'];
    $url = $_GET['path'];

    $routes = [
      'home_view' => [
        'method' => 'GET',
        'pattern' => '/^home$/',
        'controller' => 'homeController',
        'action' => 'show_home_view'
      ],
      'register_view' => [
        'method' => 'GET',
        'pattern' => '/^register$/',
        'controller' => 'authController',
        'action' => 'show_register_view'
      ],
      'register' => [
        'method' => 'POST',
        'pattern' => '/^register$/',
        'controller' => 'authController',
        'action' => 'register'
      ],
      'login_view' => [
        'method' => 'GET',
        'pattern' => '/^login$/',
        'controller' => 'authController',
        'action' => 'show_login_view'
      ],
      'login' => [
        'method' => 'POST',
        'pattern' => '/^login$/',
        'controller' => 'authController',
        'action' => 'login'
      ],
      'logout' => [
        'method' => 'POST',
        'pattern' => '/^logout$/',
        'controller' => 'authController',
        'action' => 'logout'
      ],
      'new_meeting_view' => [
        'method' => 'GET',
        'pattern' => '/^meetings\/new$/',
        'controller' => 'meetingController',
        'action' => 'show_new_meeting_view'
      ],
      'new_meeting' => [
        'method' => 'POST',
        'pattern' => '/^meetings\/new$/',
        'controller' => 'meetingController',
        'action' => 'new_meeting'
      ],
      'meetings_view' => [
        'method' => 'GET',
        'pattern' => '/^meetings$/',
        'controller' => 'meetingController',
        'action' => 'show_meetings_view'
      ],
      'book_user_meeting' => [
        'method' => 'POST',
        'pattern' => '/^meetings\/book\/(\d+)$/',
        'controller' => 'userMeetingController',
        'action' => 'book_user_meeting'
      ],
      'meetings_report' => [
        'method' => 'GET',
        'pattern' => '/^meetings\/report$/',
        'controller' => 'meetingController',
        'action' => 'show_meetings_report_view'
      ]
    ];

    foreach ($routes as $route) {
      if (preg_match($route['pattern'], $url, $matches) && $route['method'] == $request_method) {
        unset($matches[0]);

        $controller = $route['controller'];
        require 'app/controllers/' . $controller . '.php';
        $obj = new $controller;

        $action = $route['action'];

        call_user_func_array([$obj, $action], array_values($matches));
      }
    }
  }
}

?>