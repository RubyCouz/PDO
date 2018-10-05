<?php
include '../model/patient.php';
include '../controller/formController.php';
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
        <div class="container"><?php
            if (isset($_POST['create']) && (count($formError) == 0)) {
                    ?>
            <div class="row" id="#">
                <div class="col s12 m12 l12" id="#">
                    <p class="valid">Formulaire envoyé!</p>
                </div>
            </div>
            <div class="row">
                <div class="col s6 m6 l6 center-align">
                    <a href="ajout-patient.php" class="waves-effect waves-light btn-large green darken-3">Ajouter un patient</a> 
                </div>
                <div class="col s6 m6 l6 center-align">
                    <a href="partie2.php" class="waves-effect waves-light btn-large green darken-3">accueil</a> 
                </div>
            </div>
                        
               <!-- <?php //} else { ?> -->
         <!--   <div class="row">
                <div class="col s12 m12 l12">
                    <p>Client existant!</p>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12 l12 center-align">
                    <a href="ajout-patient.php" class="waves-effect waves-light btn-large green darken-3">Retour au formulaire</a> 
                </div>
            </div> -->
                    <?php
                
            } else {
                ?>
            <form action="#" method="POST">
                <div class="row" id="form">
                    <div class="col s12 m12 l6 input-field">
                        <label for="lastname">Nom de famille</label>
                        <input type="text" id="lastname" class="validate" name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" />
                        <small><?= isset($formError['lastname']) ? $formError['lastname'] : ' ' ?></small>
                    </div>
                    <div class="col s12 m12 l6">
                        <label for="birthdate">Date de naissance</label>
                        <input type="date" id="birthdate" class="validate" name="birthdate" value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : '' ?>" />
                        <small><?= isset($formError['birthdate']) ? $formError['birthdate'] : ' ' ?></small>
                                
                    </div>                    
                </div>
                <div class="row">
                    <div class="col s12 m12 l6 input-field">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" class="validate" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" />
                        <small><?= isset($formError['firstname']) ? $formError['firstname'] : ' ' ?></small>
                    </div>
                    <div class="col s12 m12 l6 input-field">
                        <label for="phone">Téléphone</label>
                        <input type="text" id="phone" class="validate" name="phone" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" />
                        <small><?= isset($formError['phone']) ? $formError['phone'] : ' ' ?></small>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l12 input-field">
                        <label for="email">Adresse mail</label>
                        <input type="email" id="email" class="validate" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" />
                    </div>
                </div>
                <div class="row">
                    <div class="co s12 m12 l12">
                        <input type="submit" id="create"  name="create" class="waves-effect waves-light btn-large green darken-3" placeholder="create" value="Créer" />
                    </div>
                </div>
            </form>
        </div>
        <?php } ?>
            
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="../assets/js/materialize.min.js"></script>
        <script src="../assets/js/script.js"></script>
    </body>
</html>