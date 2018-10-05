<?php
 include '../model/appointments.php';
 include '../model/patient.php';
 include '../controller/rdvController.php';
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
        <div class="container">
            <div class="row center-align">
                <div class="col s12 m12 l12">
                    <h1>Prise de rendez-vous</h1>
                    <?php
                     if (isset($_POST['create']))
                     {
                         ?>
                         <p>Rendez-vous enregistré!</p>
                         <a href="partie2.php" class="waves-effect waves-light btn-large green darken-3">Retour à l'accueil</a>
                         <?php
                     }
                     else
                     {
                         ?>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col s12 m12 l12">
                         <form action="#" method="POST">
                             <div class="row" id="form">
                                 <div class="input-field col s12">
                                     <select name="id">
                                         <option value="" disabled selected>Choix du patient</option>
                                         <?php
                                         foreach ($patientListResult as $patientListDetail)
                                         {
                                             ?>
                                             <option value="<?= $patientListDetail->id ?>"><?= $patientListDetail->lastname . ' ' . $patientListDetail->firstname . ',  né(e) le ' . $patientListDetail->birthdate . ', ' . $patientListDetail->phone . ' ' . $patientListDetail->mail ?>  </option>
         <?php var_dump($patientListDetail->id);
     }
     ?>

                                     </select>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col s12 m12 l6 input-field">
                                     <label for="date">Date du rendez-vous</label>
                                     <input type="date" id="date" class="datepicker" name="date" value="" />
                                 </div>
                                 <div class="col s12 m12 l6 input-field">
                                     <label for="hour">Heure du rendez-vous</label>
                                     <input type="time" id="hour" class="timepicker" name="hour" value="" />
                                 </div>
                             </div>
                             <div class="row center-align">
                                 <div class="col s12 m12 l6">
                                     <a href="ajout-patient.php" class="waves-effect waves-light btn-large green darken-3">Créer un nouveau patient</a>
                                 </div>
                                 <div class="col s12 m12 l6">
                                     <input type="submit" id="create"  name="create" class="waves-effect waves-light btn-large green darken-3" placeholder="create" value="Créer un RDV" />
                                 </div>

                             </div>
                         </form> 
                     </div>                
                 </div>
             </div>
     <?php
 }
?>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/materialize.min.js"></script>
        <script src="../assets/js/script.js"></script>
    </body>
</html>