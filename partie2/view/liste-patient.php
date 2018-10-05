<?php
 include '../model/appointments.php';
 include '../model/patient.php';
 include '../controller/patientListController.php'
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
                    <li>
                        <form action="#" method="POST">
                            <div class="input-field">
                                <input id="search" type="search" name="search" required />
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </form>
                    </li>
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
                <div class="col s12 m12 l12 center-align">
                    <a href="../partie2.php" class="waves-effect waves-light btn-large green darken-3">accueil</a> 
                </div>
            </div>
            <?php
             if (count($formError) == 0)
             {
                 if (!empty($_POST['search']))
                 {
                     if ($searchResultList == true)
                     {
                         ?>
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
                                         </tr>
                                     </thead>
                                     <tbody> 
                                         <?php
                                         foreach ($searchResultList as $searchList)
                                         {
                                             ?>
                                         <td><?= $searchList->lastname ?></td>
                                         <td><?= $searchList->firstname ?></td>
                                         <td><?= date('d / m / Y', strtotime($searchList->birthdate)) ?></td>
                                         <td><?= $searchList->mail ?></td>
                                         <td><?= $searchList->phone ?></td>          
                                         <td><a class="waves-effect waves-light btn-large green darken-3" href="profil-patient.php?id=<?= $searchList->id ?>">Afficher</a></td>
                                         <td>
                                             <form action="liste-patient.php?id=<?= $searchList->id ?>" method="POST">
                                                 <input type="submit" id="delete" name="delete" class="waves-effect waves-light btn-large red accent-4" value="Supprimer" />
                                             </form>
                                         </td>
                                         </tr>
                                         <?php
                                     }
                                 }
                                 else
                                 {
                                     ?>
                                     <p><?= $formError['search'] ?></p>
                                     <?php
                                 }
                                 ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
                 <?php
             }
             else
             {
                 ?>
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
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                 foreach ($patientListResult as $patientListDetail)
                                 {
                                     ?>
                                     <tr>
                                         <td><?= $patientListDetail->lastname ?></td>
                                         <td><?= $patientListDetail->firstname ?></td>
                                         <td><?= date('d / m / Y', strtotime($patientListDetail->birthdate)) ?></td>
                                         <td><?= $patientListDetail->mail ?></td>
                                         <td><?= $patientListDetail->phone ?></td>          
                                         <td><a class="waves-effect waves-light btn-large green darken-3" href="profil-patient.php?id=<?= $patientListDetail->id ?>">Afficher</a></td>
                                         <td>
                                             <form action="liste-patient.php?id=<?= $patientListDetail->id ?>" method="POST">
                                                 <input type="submit" id="delete" name="delete" class="waves-effect waves-light btn-large red accent-4" value="Supprimer" />
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
                 <?php
             }
         }
         else
         {
             ?>
             <p class="error"><?= $formError['search'] ?></p>
             <?php
         }
        ?>
        <div class="row center-align">
            <div class="col s12 m12 l12">
                <ul class="pagination">
                    <li class="<?= (($page - 1)) <= 0 ? 'disabled' : 'waves-effect' ?>"><a href="<?= (($page - 1) <= 0) ? '#' : 'liste-patient.php?page=' . ($page - 1) ?>"><i class="material-icons">chevron_left</i></a></li>
                    <?php
                     for ($pageResult = 1; $pageResult <= $patientList->totalPageNumber; $pageResult ++)
                     {
                         ?>
                         <li class="<?= ($page == $pageResult) ? 'active' : '' ?>"><a href="liste-patient.php?page=<?= $pageResult ?>"><?= $pageResult ?></a></li>
                         <?php
                     }
                    ?>
                         <li class="<?= (($page) >= $patientList->totalPageNumber) ? 'disabled' : 'waves-effect' ?>"><a href="<?= ($page >= $patientList->totalPageNumber) ? '#' : 'liste-patient.php?page=' . ($page + 1) ?>"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
        <div class="row ">
            <div class="col s10 m10 l10 left-align">
                <a href="ajout-patient.php" class="waves-effect waves-light btn-large green darken-3">Ajouter un patient</a> 
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