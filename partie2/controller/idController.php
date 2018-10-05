<?php
 $id = $_GET['id'];
 $formError = array(); //déclaration d'un tableau vide, servant à récupérer les différentes erreurs
 $lastnamePattern = '#^[a-zA-Zéùîâêäëïüöû\'\s-]+$#'; //regex pour le nom
 $firstnamePattern = '#^[a-zA-Zéùîâêäëïüöû\'\s-]+$#';
 $phonePattern = '/^(0\d){1}(\d\d){4}$/';
//vérification que les données saisies sont présentes et correspondent à ce qui est demandé
 if (isset($_POST['validate']))
 {
     $modify = new patient();

     if (!empty($_POST['lastname']))
     {
         if (preg_match($lastnamePattern, $_POST['lastname']))
         {
             $modify->lastname = htmlspecialchars($_POST['lastname']);
         }
         else
         {
             $formError['lastname'] = 'Saisie invalide';
         }
     }
     else
     {
         $formError['lastname'] = 'Champ obligatoire';
     }
     if (!empty($_POST['firstname']))
     {
         if (preg_match($firstnamePattern, $_POST['firstname']))
         {
             $modify->firstname = htmlspecialchars($_POST['firstname']);
         }
         else
         {
             $formError['firstname'] = 'Saisie invalide';
         }
     }
     else
     {
         $formError['firstname'] = 'Champ obligatoire';
     }
     if (!empty($_POST['birthdate']))
     {
         $modify->birthdate = htmlspecialchars($_POST['birthdate']);
     }
     else
     {
         $formError['birthdate'] = 'Champ obligatoire';
     }
     if (!empty($_POST['phone']))
     {
         if (preg_match($phonePattern, $_POST['phone']))
         {
             $modify->phone = htmlspecialchars($_POST['phone']);
         }
         else
         {
             $formError['phone'] = 'Saisie invalide';
         }
     }
     else
     {
         $formError['phone'] = 'Champ obligatoire';
     }
     if (!empty($_POST['email']))
     {
         $mail = htmlspecialchars($_POST['email']);
         if (FILTER_VAR($mail, FILTER_VALIDATE_EMAIL))
         {
             $modify->mail = htmlspecialchars($_POST['email']);
         }
         else
         {
             $formError['email'] = 'Saisie invalide';
         }
     }
     else
     {
         $formError['email'] = 'Champ obligatoire';
     }
     if (count($formError) == 0)
     {
       $modify->id = $id;

         $modify->lastname = $_POST['lastname'];
         $modify->firstname = $_POST['firstname'];
         $modify->birthdate = $_POST['birthdate'];
         $modify->mail = $_POST['email'];
         $modify->phone = $_POST['phone'];
         $modifyResult = $modify->getModifyProfilPatient();  
     }
 }
 else
 { //instanciation de la classe premettant d'afficher les données d'un patient
       $patientList = new patient();
     $patientList->id = $id;
     $patientListResult = $patientList->getPatientId();
     //instanciation de la classe permettant d'afficher les rdv d'un patient
     $appointmentOnly = new appointment();
     $appointmentOnly->id = $id;
     $appointmentOnlyResult = $appointmentOnly->getAppointementOnly();
    
   
 }
?>