<?php

class authController extends Controller
{
  public function show_register_view()
  {
    if (!isset($_SESSION['user_id'])) {
      $this->show_header('header', 'register');
      $this->show_view('register');
      $this->show_footer('footer');
    } else {
      header('location:' . APP_URL . '/home', 301);
      exit();
    }
  }

  public function register()
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = intval($_POST['role_id']);

    $user = $this->model('User');
    $user->create_user($name, $email, $password, $role_id);

    header('location:' . APP_URL . '/login', 301);
    exit();
  }

  public function show_login_view()
  {
    if (!isset($_SESSION['user_id'])) {
      $this->show_header('header', 'login');
      $this->show_view('login');
      $this->show_footer('footer');
    } else {
      header('location:' . APP_URL . '/home', 301);
      exit();
    }
  }

  public function login()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $this->model('User');
    $result = json_decode($user->login_user($email, $password));

    if ($result->msg == 'success') {
      $_SESSION['user_id'] = $result->user_id;
      $_SESSION['role_id'] = $result->role_id;

      if ($result->role_id == 1) {
        header('location:' . APP_URL . '/meetings/report', 301);
      } else {
        header('location:' . APP_URL . '/meetings', 301);
      }
    } else {
      header('location:' . APP_URL . '/login', 301);
    }

    exit();
  }

  public function logout()
  {
    session_destroy();
    session_start();

    header('location:' . APP_URL . '/login', 301);
    exit();
  }
}

?>