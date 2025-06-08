<?php

require 'app/policies/userPolicy.php';

class meetingController extends Controller
{
  use userPolicy;

  public function show_new_meeting_view()
  {
    if ($this->is_doctor()) {
      $this->show_header('header', 'new meeting');
      $this->show_view('meetings/new_meeting');
      $this->show_footer('footer');
    } else {
      header('location:' . APP_URL . '/home', 301);
      exit();
    }
  }

  public function new_meeting()
  {
    $date = strval($_POST['date']);
    $time = intval($_POST['time']);
    $price = floatval($_POST['price']);

    $meeting = $this->model('Meeting');
    $meeting_id = $meeting->create_meeting($date, $time, $price);

    $doctor_id = $_SESSION['user_id'];

    $user_meeting = $this->model('UserMeeting');
    $user_meeting->create_user_meeting($meeting_id, $doctor_id);

    header('location:' . APP_URL . '/meetings/report', 301);
    exit();
  }

  public function show_meetings_view()
  {
    if (isset($_SESSION['user_id'])) {
      $meeting = $this->model('Meeting');
      $meetings = $meeting->get_meetings();

      $this->show_header('header', 'meetings');
      $this->show_view('meetings/meetings', ['meetings' => $meetings]);
      $this->show_footer('footer');
    } else {
      header('location:' . APP_URL . '/home', 301);
      exit();
    }
  }

  public function show_meetings_report_view()
  {
    if ($this->is_doctor()) {
      $doctor_id = $_SESSION['user_id'];

      $meeting = $this->model('Meeting');
      $meetings = $meeting->get_doctor_meetings($doctor_id);

      $this->show_header('header', 'meetings report');
      $this->show_view('meetings/meetings_report', ['meetings' => $meetings]);
      $this->show_footer('footer');
    } else {
      header('location:' . APP_URL . '/home', 301);
      exit();
    }
  }
}

?>