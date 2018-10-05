<?php

 $formError = array();
 $searchPattern = '#^[a-zA-Zéùîâêäëïüöû\'\s-]+$#';
 //controller pour la suppresion d'un patient
 IF (isset($_POST['delete']))
 {
     //instanciation de l'objet pour supprimer un patient
     $removeAppointmentPatient = new patient();
     $id = $_GET['id'];
     $removeAppointmentPatient->id = $id;
     $removeAppointmentPatientResult = $removeAppointmentPatient->getRemovePatientAppointment();
 }

//affichage de la recherche
 if (!empty($_POST['search']))
 {
     if (preg_match($searchPattern, $_POST['search']))
     {
         $search = $_POST['search'];
         //instanciation de l'objet affichant la recherche saisie
         $searchResult = new patient();
         $searchResult->search = $search;
         $searchResultList = $searchResult->getSearch();
         if ($searchResultList == false)
         {
             $formError['search'] = 'Aucune trace de vie par ici...';
         }
     }
     else
     {
         $formError['search'] = 'Oups! je n\'ai pas compris votre demande...';
     }
 }
 else
 {
     $patientList = new patient();
     $page = (!empty($_GET['page']) ? $_GET['page'] : 1);
     $limit = 10;
     $patientListResult = $patientList->getPatientList($page, $limit);
     
 }
?>
