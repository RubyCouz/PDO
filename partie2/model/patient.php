<?php

 /**
  * Description of patient
  *
  * @author cedric
  */
 class patient {

     private $connexion;
     public $id;
     public $lastname;
     public $firstname;
     public $birthdate;
     public $phone;
     public $mail;
     public $search;
     public $page;
     public $limit;
     public $start;
     public $totalEntries;
     public $totalPageNumber;

     /**
      * méthode de construction, vérfication de l'envoie du formulaire et de l'absence d'erreur dans le tableau d'erreur
      */
     public function __construct()
     {

         try {
             $this->connexion = NEW PDO('mysql:host=127.0.0.1;dbname=hospitalE2N', 'root', 'couz02072014');
         } catch (Exception $ex) {
             echo 'NOPE!!';
             die($e->getMessage());
         }
     }

     /**
      * méthode pour l'envoie des donné saisies dans le formulaire vers la table patients
      * @param type $lastname
      * @param type $firstname
      * @param type $birthdate
      * @param type $phone
      * @param type $mail
      */
     public function setPatient()
     {
         /*
           $reqPatient = $this->connexion->prepare('INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail)');
           $reqPatient->execute(array(
           'lastname' => $lastname,
           'firstname' => $firstname,
           'birthdate' => $birthdate,
           'phone' => $phone,
           'mail' => $mail
           ));
          * 
          */
         /**
          * PREPARATION DE LA  REQUETE
          */
         $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) '
                 . 'VALUES (:lastname, :firstname, :birthdate, :phone, :mail)'; //  :quelquechose => marqueur nominatif , sans valeur pour l'instant, sera attribuer plus tard (= attribut)
         $reqPatient = $this->connexion->prepare($query);
         $reqPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR); // bindValue( marqueur nominatif, valeur a lui attribuer, type de valeur attribuée) ATTRIBUE UNE VALEUR A UN MARQUER NOMINATIF
         $reqPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
         $reqPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
         $reqPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
         $reqPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
         //EXECUTION DE LA REQUETE
         return $reqPatient->execute();
     }

     /**
      * éthode pour eviter les doublons au seins du tableau
      * @param type $lastname
      * @param type $firstname
      * @param type $birthdate
      * @param type $mail
      * @param type $phone
      */
     public function getNoMultipleClient($lastname, $firstname, $birthdate, $mail, $phone)
     {
         $IsObjectResult = array();
         $noMultipleClient = $this->connexion->query('SELECT `lastname`, `firstname`, `birthdate`, `mail`, `phone` '
                 . 'WHERE `lastname`="' . $lastname . '", `firstname` ="' . $firstname . '",`birthdate` ="' . $birthdate . '",`mail` ="' . $mail . '",`phone` ="' . $phone . '"');
         if (is_object($IsObjectResult))
         {
             $IsObjectResult = $noMultipleClient->fetch(PDO::FETCH_OBJ);
         }
     }

     /**
      * méthode pour afficher les données de la table patients
      * @return type
      */
     public function getPatientList($page, $limit)
     {
         $isObjectResult = array();
         //requete pour affichage des patients sur plusieurs pages
         $start = ($page - 1) * $limit;
         $query = 'SELECT SQL_CALC_FOUND_ROWS `id`, `lastname`, `firstname`, `birthdate`, `mail`, `phone` '
                 . 'FROM `patients` '
                 . 'LIMIT :limit '
                 . 'OFFSET :start';
         $patientList = $this->connexion->prepare($query);
         $patientList->bindValue('start', $start, PDO::PARAM_INT);
         $patientList->bindValue('limit', $limit, PDO::PARAM_INT);
         $patientList->execute();
         $resultFoundRows = $this->connexion->query('SELECT found_rows()');
         //calcul du nombre d'entrée à afficher
         $totalEntries = $resultFoundRows->fetchColumn();
         // nombre de page nécessaire à l'affichage des entrées
         $this->totalPageNumber = ceil($totalEntries / $limit);

         if (is_object($patientList))
         {
             $isObjectResult = $patientList->fetchAll(PDO::FETCH_OBJ);
         }
         return $isObjectResult;
     }

     /**
      * methode pour l'affichage de la fiche d'un patient
      * @return type
      */
     public function getPatientId()
     {
         $patientId = $this->connexion->prepare('SELECT `lastname`, `firstname`, `birthdate`, `mail`, `phone` '
                 . 'FROM `patients` '
                 . 'WHERE `id` = :id');
         $patientId->bindValue(':id', $this->id, PDO::PARAM_INT);
         $patientId->execute();
         if (is_object($patientId))
         {
             $isObjectResult = $patientId->fetch(PDO::FETCH_OBJ);
         }
         return $isObjectResult;
     }

     /**
      * methode pour modifier la fiche patient
      */
     public function getModifyProfilPatient()
     {
         $update = $this->connexion->prepare('UPDATE `patients` '
                 . 'SET `lastname` = :lastname, `firstname` = :firstname,  `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail '
                 . 'WHERE `id` = :id');
         $update->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
         $update->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
         $update->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
         $update->bindValue(':phone', $this->phone, PDO::PARAM_STR);
         $update->bindValue(':mail', $this->mail, PDO::PARAM_STR);
         $update->bindValue(':id', $this->id, PDO::PARAM_INT);
         return $update->execute();
     }

     /**
      * objet permettant la suppression des rdv et d'un patient en simultané
      */
     public function getRemovePatientAppointment()
     {
         try {
             //début de la transaction
             $removeAppointment = $this->connexion->beginTransaction();

             $query = 'DELETE FROM `appointments` WHERE `id` = :id';
             $removeAppointment = $this->connexion->prepare($query);
             $removeAppointment->bindValue(':id', $this->id, PDO::PARAM_INT);
             $removeAppointment->execute();
             $query = 'DELETE FROM `patients` WHERE `id` = :id';
             $removePatient = $this->connexion->prepare($query);
             $removePatient->bindValue(':id', $this->id, PDO::PARAM_STR);
             $removePatient->execute();
             //validation de la transaction s'il n'y a pas d'erreur
             $removeAppointment = $this->connexion->commit();
         } catch (Exception $ex) {
             //annulation de la transaction en cas d'erreur
             $rollback();
             $e->getMessage();
         }
     }

     public function getSearch()
     {
         $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `mail`, `phone` '
                 . 'FROM `patients` '
                 . 'WHERE `lastname` LIKE :search OR `firstname` LIKE :search';
         $search = $this->connexion->prepare($query);
         $search->bindValue(':search', '%' . $this->search . '%', PDO::PARAM_STR);
         $search->execute();
         if (is_object($search))
         {
             $isObjectResult = $search->fetchAll(PDO::FETCH_OBJ);
         }
         return $isObjectResult;
     }

     public function __destruct()
     {
         
     }

 }

?>
