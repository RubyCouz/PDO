<?php

 /**
  * Description of appointment
  *
  * @author cedric
  */
 class appointment {

     private $connexion;
     public $lastname;
     public $firstname;
     public $id;
     public $date;
     public $hour;
     public $dateHour;
     public $idPatients;

     public function __construct()
     {
         try {
             $this->connexion = NEW PDO('mysql:host=127.0.0.1;dbname=hospitalE2N', 'root', 'couz02072014');
         } catch (Exception $ex) {
             die($e->getMessage());
         }
     }

     /**
      * methode pour la prise de rdv
      * @return type
      */
     public function getAppointment()
     {

         $query = 'INSERT INTO `appointments` (`dateHour`, `idPatients`) VALUES (:dateHour, :idPatients)';
         $appointment = $this->connexion->prepare($query);
         $appointment->bindValue(':dateHour', $this->dateHour, PDO:: PARAM_STR);
         $appointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
         $appointment->execute();
         IF (is_object($appointment))
         {
             $isObjectResult = $appointment->fetch(PDO::FETCH_OBJ);
         }
         return $isObjectResult;
     }

     /**
      * methode pour l'affichage des rdv
      * @return type
      */
     public function getAppointmentVIew()
     {
         $isObjectResult = array();
         $query = 'SELECT `appointments`.`id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail`, `dateHour` '
                 . 'FROM `appointments` '
                 . 'LEFT jOIN `patients` '
                 . 'ON `patients`.`id` = `appointments`.`idPatients`';

         $appointmentView = $this->connexion->query($query);
         if (is_object($appointmentView))
         {
             $isObjectResult = $appointmentView->fetchAll(PDO::FETCH_OBJ);
         }
         return $isObjectResult;
     }

     /**
      * instanciation de l'objet permettant la recuperation de l'id des rdv
      * @return type
      */
     public function getAppointmentsId()
     {
         $appointmentId = $this->connexion->prepare('SELECT `lastname`, `firstname`, `birthdate`, `phone`, `mail`, `dateHour` '
                 . 'FROM `appointments` '
                 . 'LEFT JOIN `patients`'
                 . 'ON `patients`.`id` = `appointments`.`idPatients` '
                 . 'WHERE `appointments`.`id` = :id');
         $appointmentId->bindValue(':id', $this->id, PDO::PARAM_INT);
         $appointmentId->execute();
         if (is_object($appointmentId))
         {
             $isObjectResult = $appointmentId->fetch(PDO::FETCH_OBJ);
         }
         return $isObjectResult;
     }

     /**
      * instanciation de l'objet pour modifier les rdv
      * @return type
      */
     public function getModifyAppointment()
     {
         $modify = $this->connexion->prepare('UPDATE `appointments` '
                 . 'SET `dateHour` = :dateHour '
                 . 'WHERE `id` = :id');
         $modify->bindValue(':id', $this->id, PDO::PARAM_INT);
         $modify->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);


         $modify->execute();
         if (is_object($modify))
         {
             $isObjectResult = $modify->fetchAll(PDO::FETCH_OBJ);
         }
         return $isObjectResult;
     }

     /**
      * instanciation de l'objet affichant uniquement les rdv
      * @return type
      */
     public function getAppointementOnly()
     {
         $query = 'SELECT `dateHour` '
                 . 'FROM `appointments` '
                 . 'LEFT JOIN `patients` '
                 . 'ON `patients`.`id` = `appointments`.`idPatients` '
                 . 'WHERE `appointments`.`idPatients` = :id';

         $appointmentOnly = $this->connexion->prepare($query);
         $appointmentOnly->bindValue(':id', $this->id, PDO::PARAM_STR);
         $appointmentOnly->execute();
         if (is_object($appointmentOnly))
         {
             $isObjectResult = $appointmentOnly->fetchAll(PDO::FETCH_OBJ);
             return $isObjectResult;
         }
     }

     public function getRemoveAppointment()
     {
         $query = 'DELETE FROM `appointments` WHERE `id` = :id';
         $removeAppointment = $this->connexion->prepare($query);
         $removeAppointment->bindValue(':id', $this->id, PDO::PARAM_INT);
         $removeAppointment->execute();
     }

     public function __destruct()
     {
         
     }

 }
 