<?php

class UserMeeting extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function create_user_meeting($meeting_id, $doctor_id)
  {
    $query = $this->database->prepare("INSERT INTO `user-meetings` (meeting_id,doctor_id) VALUES (?,?)");

    $query->bind_param('ii', $meeting_id, $doctor_id);

    $query->execute();
  }

  public function is_available($patient_id, $date, $time)
  {
    $query = $this->database->prepare("SELECT * FROM `user-meetings` INNER JOIN meetings ON `user-meetings`.meeting_id=meetings.id WHERE `user-meetings`.patient_id=? AND meetings.date=? AND meetings.time=?");

    $query->bind_param('isi', $patient_id, $date, $time);

    $result = $query->execute();

    $rows = $query->get_result();

    if ($rows->num_rows > 0) {
      return false;
    } else {
      return true;
    }
  }

  public function book_user_meeting($data)
  {
    $query = $this->database->prepare("UPDATE `user-meetings` SET patient_id=? WHERE id=?");

    $query->bind_param('ii', ...$data);

    $query->execute();
  }

  public function log($user_id, $time)
  {
    $query = $this->database->prepare("INSERT INTO log (status,user_id, time) VALUES (?,?,?)");

    $status = 'booked';
    $query->bind_param('sii', $status, $user_id, $time);

    $result = $query->execute();

    return $query->get_result();
  }
}

?>