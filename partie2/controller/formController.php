<?php

 $formError = array(); //déclaration d'un tableau vide, servant à récupérer les différentes erreurs
 $lastnamePattern = '#^[a-zA-Zéùîâêäëïüöû\'\s-]+$#'; //regex pour le nom
 $firstnamePattern = '#^[a-zA-Zéùîâêäëïüöû\'\s-]+$#';
 $phonePattern = '/^(0\d){1}(\d\d){4}$/';

//vérification que les données saisies sont présentes et correspondent à ce qui est demandé
 if (isset($_POST['create']))
 {
     $patient = new patient();
     if (!empty($_POST['lastname']))
     {
         if (preg_match($lastnamePattern, $_POST['lastname']))
         {
             $patient->lastname = htmlspecialchars($_POST['lastname']);
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
             $patient->firstname = htmlspecialchars($_POST['firstname']);
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
         $patient->birthdate = htmlspecialchars($_POST['birthdate']);
     }
     else
     {
         $formError['birthdate'] = 'Champ obligatoire';
     }
     if (!empty($_POST['phone']))
     {
         if (preg_match($phonePattern, $_POST['phone']))
         {
             $patient->phone = htmlspecialchars($_POST['phone']);
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
             $patient->mail = htmlspecialchars($_POST['email']);
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
         if (!$patient->setPatient())
         {
             $formError['create'] = 'Il y a eu un problème';
         }
     }
 }


 /* if (isset($_POST['create']) && (count($formError) == 0))
   {
   //instanciation de la classe comparant les données saisie et celle deja présente dans le tableau en cas de doublon
   $noMultipleClient = new patient();
   $noMultipleClientlist = $noMultipleClient->getNoMultipleClient($lastname, $firstname, $birthdate, $phone, $mail);
   if ($noMultipleClient == true)
   {
   //instanciation de la classe patient pour envoyer les données dans la tables patients
   $patient = new patient();
   $patientList = $patient->setPatient($lastname, $firstname, $birthdate, $phone, $mail);
   }
   } */
?>
