<?php

class User extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function create_user($name, $email, $password, $role_id)
  {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = $this->database->prepare("INSERT INTO users (name,email,password,role_id) VALUES (?,?,?,?)");

    $query->bind_param('sssi', $name, $email, $password, $role_id);

    $query->execute();
  }

  public function login_user($email, $password)
  {
    $query = $this->database->prepare("SELECT * FROM users WHERE email=?");

    $query->bind_param('s', $email);

    $result = $query->execute();

    $users = $query->get_result();

    if ($users->num_rows > 0) {
      $user = $users->fetch_assoc();

      if (password_verify($password, $user['password'])) {
        $result = [
          'msg' => 'success',
          'user_id' => $user['id'],
          'role_id' => $user['role_id']
        ];
      } else {
        $result = [
          'msg' => 'incorrect password'
        ];
      }
    } else {
      $result = [
        'msg' => 'incorrect email'
      ];
    }

    return json_encode($result);
  }
}

?>