<?php

class Meeting extends Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function create_meeting($date, $time, $price)
  {
    $query = $this->database->prepare("INSERT INTO meetings (date,time,price) VALUES (?,?,?)");

    $query->bind_param('sid', $date, $time, $price);

    $query->execute();

    return $this->database->insert_id;
  }

  public function get_doctor_meetings($doctor_id)
  {
    $query = $this->database->prepare("SELECT meetings.date, meetings.time, meetings.price, `user-meetings`.patient_id FROM meetings INNER JOIN `user-meetings` ON meetings.id=`user-meetings`.meeting_id WHERE `user-meetings`.doctor_id=? ORDER BY meetings.date DESC");

    $query->bind_param('i', $doctor_id);

    $result = $query->execute();

    return $query->get_result();
  }

  public function get_meetings()
  {
    $query = $this->database->prepare("SELECT meetings.id AS meeting_id, `user-meetings`.id AS user_meeting_id, users.name, meetings.date, meetings.time, meetings.price FROM meetings INNER JOIN `user-meetings` ON meetings.id=`user-meetings`.meeting_id INNER JOIN users ON `user-meetings`.doctor_id=users.id WHERE `user-meetings`.patient_id IS NULL ORDER BY meetings.date DESC");

    $result = $query->execute();

    return $query->get_result();
  }
}

?>