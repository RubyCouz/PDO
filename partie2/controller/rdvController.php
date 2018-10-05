 
<?php
 if (isset($_POST['create']))
 {
     $appointment = new appointment();
     $appointment->idPatients = $_POST['id'];
     $appointment->dateHour = date('Y-m-d', strtotime($_POST['date'])) . ' ' . $_POST['hour'];
     $newAppointment = $appointment->getAppointment();
     var_dump($_POST['id']);
     var_dump($appointment);
 }

 $patientList = new patient();
  $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
     $limit = 10;
 $patientListResult = $patientList->getPatientList($page, $limit);