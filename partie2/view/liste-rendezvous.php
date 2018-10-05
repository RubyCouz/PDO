<?php
 include '../model/patient.php';
 include '../model/appointments.php';
 include '../controller/appointmentViewController.php'
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
        <div class="container" id="home">
            <div class="row" id="#">
                <div class="col s6 m6 l6 center-align">
                    <a href="ajout-patient.php" class="waves-effect waves-light btn-large green darken-3">Ajouter un patient</a> 
                </div>
                <div class="col s6 m6 l6 center-align">
                    <a href="ajout-rendezvous.php" class="waves-effect waves-light btn-large green darken-3">Ajoutez un rendez-vous</a> 
                </div>

            </div>
            <div class="row">
                <div class="col s12 l12 m12">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Date de naissance</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Date et Heure de rendez-vous</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             foreach ($appointmentViewResult as $appointmentViewDetail)
                             {
                                 ?>
                                 <tr>
                                     <td><?= $appointmentViewDetail->lastname ?></td>
                                     <td><?= $appointmentViewDetail->firstname ?></td>
                                     <td><?= date('d / m / Y', strtotime($appointmentViewDetail->birthdate)) ?></td>
                                     <td><?= $appointmentViewDetail->mail ?></td>
                                     <td><?= $appointmentViewDetail->phone ?></td>      
                                     <td><?= $appointmentViewDetail->dateHour ?></td>    
                                     <td><a class="waves-effect waves-light btn-large green darken-3" href="rendezvous.php?id=<?= $appointmentViewDetail->id ?>">Afficher</a></td>
                                     <td>
                                         <form action="liste-rendezvous.php?id=<?= $appointmentViewDetail->id ?>" method="POST">
                                             <input type="submit" name="delete" class="waves-effect waves-light btn-large red accent-4" value="Supprimer" />
                                         </form>
                                     </td>
                                 </tr>
                                 <?php
                             }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col s5 m5 l5 center-align">
                <a href="ajout-patient.php" class="waves-effect waves-light btn-large green darken-3">Ajouter un patient</a> 
            </div>
            <div class="col s5 m5 l5 center-align">
                <a href="ajout-rendezvous.php" class="waves-effect waves-light btn-large green darken-3">Ajouter un rendez-vous</a> 
            </div>
            <div class="col s2 m2 l2 right-align">
                <a href="#home" class="btn-floating btn-large waves-effect waves-dark js-scrollTo"><i class="material-icons">arrow_upward</i></a>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/materialize.min.js"></script>
        <script src="../assets/js/script.js"></script>
    </body>
</html>