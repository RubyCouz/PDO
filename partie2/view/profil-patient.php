<?php
 include '../model/patient.php';
 include '../model/appointments.php';
 include '../controller/idController.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Hopital E2N</title>
        <link rel="stylesheet" href="../assets/css/materialize.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" href="../assets/css/style.css" />
    </head>
    <body class="part2">
        <!-- Dropdown Structure sommaire-->
        <ul id='dropdownSummary' class='dropdown-content'>
            <li><a href="../view/ajout-patient.php">Ajouter un patient</a></li>
            <li><a href="../view/liste-patient.php">Liste des patients</a></li>
            <li><a href="../view/ajout-rendezvous.php">Prise de rendez-vous</a></li>
            <li><a href="../view/liste-rendezvous.php">Liste des rendez-vous</a></li>
        </ul>
        <nav class="nav-extended nav2">
            <div class="nav-wrapper">
                <a href="../../index.php" class="brand-logo"><i class="large material-icons">local_hospital</i></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#" data-activates="dropdownSummary">Sommaire</a></li>
                    <li><a href="../../partie1/view/partie1.php">Partie 1</a></li>
                    <li><a href="../partie2.php">Partie 2</a></li>
                    <li><a href="../../TP1/tp1.php">T.P 1</a></li>
                    <li><a href="../../TP2/tp2.php">T.P 2</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="../../partie1/view/partie1.php">Partie 1</a></li>
                    <li><a href="../partie2.php">Partie 2</a></li>
                    <li><a href="../../TP1/tp1.php">T.P 1</a></li>
                    <li><a href="../../TP2/tp2.php">T.P 2</a></li>
                </ul>
            </div>
        </nav>

        <?php
         if (isset($_POST['modify']))
         {
             ?>
             <div class="container">
                 <div class="row">
                     <div class="col s12 m12 l12">
                         <form action="#" method="POST">
                             <label for="lastname">Nom : </label>
                             <input type="text" id="lastname" class="" name="lastname" value="<?= $patientListResult->lastname ?>" />
                             <label for="firstname">Prénoms :</label>
                             <input type="text" id="firstname" class="" name="firstname" value="<?= $patientListResult->firstname ?>" />
                             <label for="birthdate">date de naissance :</label>
                             <input type="date" id="birthdate" class="" name="birthdate" value="<?= date('d / m / Y', strtotime($patientListResult->birthdate)) ?>" />
                             <label for="email">Email :</label>
                             <input type="email" id="email" class="" name="email" value="<?= $patientListResult->mail ?>"/>
                             <label for="phone">Téléhone :</label>
                             <input type="text" id="phone" class="" name="phone" value="<?= $patientListResult->phone ?>"/>
                             <div class="row center-align">
                                 <div class="col s6 m6 l6">
                                     <a href="liste-patient.php" id="cancel" class="waves-effect waves-light btn-large red accent-4">Annuler</a>       
                                 </div>
                                 <div class="col s6 m6 l6">
                                     <input type="submit" id="validate" class="waves-effect waves-light btn-large green darken-3" name="validate" value="Valider" />                                                                
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>  
             </div>


             <?php
         }
         else
         {
             ?>
             <div class="container">
                 <h2 class="center-align">Fiche de renseignements</h2>
                 <div class="row">
                     <div class="col s12 m12 l12">
                         <?php
                         if (isset($_POST['validate']))
                         {
                             ?>
                             <p>Fiche patient modifiée</p>
                             <div class="row">
                                 <div class="col s12 m12 l12">
                                     <a href="liste-patient.php" class="waves-effect waves-light btn-large green darken-3">Retour à la liste</a>
                                 </div>
                             </div>
                             <?php
                         }
                         else
                         {
                             ?>
                             <p>Nom : <?= isset($_POST['validate']) ? $update->lastname : $patientListResult->lastname ?></p>
                             <p>Prénom :  <?= isset($_POST['validate']) ? $update->firstname : $patientListResult->firstname ?></p>
                             <p>Date de naissance :  <?= isset($_POST['validate']) ? $update->birthdate : date('d / m / Y', strtotime($patientListResult->birthdate)) ?></p>
                             <p>Email :  <?= isset($_POST['validate']) ? $update->mail : $patientListResult->mail ?></p>
                             <p>Téléphone :  <?= isset($_POST['validate']) ? $update->phone : $patientListResult->phone ?></p>
                             <p>Rendez -vous : </p>
                             <ul>
                                 <?php
                                 foreach ($appointmentOnlyResult as $appointmentDetail)
                                 {
                                     ?>
                                     <li><?= $appointmentDetail->dateHour ?></li>                                 
                                 </ul>
                                 <?php
                             }
                             ?>

                         </div>            
                     </div>
                     <div class="row center-align">
                         <div class="col s6 m6 l6">
                             <a href="liste-patient.php" class="waves-effect waves-light btn-large red accent-4" name="back">Retour</a>    
                         </div>
                         <div class="col s6 m l6">
                             <form action="#" method="POST">
                                 <input type="submit" id="modify" class="waves-effect waves-light btn-large green darken-3" name="modify" value="Modifer" />                        
                             </form>  
                         </div>
                     </div>            
                 </div>
                 <?php
             }
         }
        ?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/materialize.min.js"></script>
        <script src="../assets/js/script.js"></script>
    </body>
</html>