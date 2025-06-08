<?php

class userMeetingController extends Controller
{
  public function book_user_meeting()
  {
    $user_meeting_id = intval($_POST['user_meeting_id']);
    $date = $_POST['date'];
    $time = intval($_POST['time']);
    $patient_id = $_SESSION['user_id'];

    $user_meeting = $this->model('UserMeeting');

    $is_available = $user_meeting->is_available($patient_id, $date, $time);

    if ($is_available) {
      $data = [$patient_id, $user_meeting_id];

      $user_meeting->book_user_meeting($data);

      $user_meeting->log($patient_id, $time);
    }

    header('location:' . APP_URL . '/meetings', 301);
    exit();
  }

  // public function log()
  // {
  //   // $status = $_POST['status'];
  //   $user_id = intval($_POST['user_id']);
  //   $time = intval($_POST['time']);

  //   $log = $this->model('UserMeeting');
  //   $meetings = $log->get_doctor_meetings($user_id, $time);

  //   header('location:' . APP_URL . '/meetings', 301);
  //   exit();
  // }
}

?>