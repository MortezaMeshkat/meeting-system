<?php

trait userPolicy
{
  public function is_doctor()
  {
    if (isset($_SESSION['user_id']) && $_SESSION['role_id'] == 1) {
      return true;
    } else {
      return false;
    }
  }
}

?>