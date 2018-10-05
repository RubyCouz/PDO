<?php

 $id = $_GET['id'];
 $formError = array(); //déclaration d'un tableau vide, servant à récupérer les différentes erreurs
 $lastnamePattern = '#^[a-zA-Zéùîâêäëïüöû\'\s-]+$#'; //regex pour le nom
 $firstnamePattern = '#^[a-zA-Zéùîâêäëïüöû\'\s-]+$#';
 $phonePattern = '/^(0\d){1}(\d\d){4}$/';
//vérification que les données saisies sont présentes et correspondent à ce qui est demandé (modification d'un rdv)
 if (isset($_POST['validate']))
 {
     $update = new appointment();

    
     if (count($formError) == 0)
     {
         $update->id = $id;


         $update->dateHour = $_POST['dateHour'];

         $updateResult = $update->getModifyAppointment();
     }
 }
 else
 {
     $appointmentId = new appointment();
     $id = $_GET['id'];
     $appointmentId->id = $id;
     $appointmentIdResult = $appointmentId->getAppointmentsId();
 }
?>
