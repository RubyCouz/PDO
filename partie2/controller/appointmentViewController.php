<?php

 if (isset($_POST['delete']))
 {
//instanciation de l'objet permettant la suppression d'un rdv
     $removeAppointment = new appointment();
     $id = $_GET['id'];
     $removeAppointment->id = $id;
     $removeAppointmentResult = $removeAppointment->getRemoveAppointment();
 }
//instanciation de l'objet affichant la liste de rdv
 $appointmentView = new appointment();
 $appointmentViewResult = $appointmentView->getAppointmentVIew();
?>

