<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=colyseum', 'root', 'couz02072014');
// stockage de la requète sql dans une variable
$clientView = 'SELECT `lastname`, `firstname` FROM `clients`';
// on execute la requete et on stock le resultat (objet pdo) dans une variable
$reqClientView = $pdo->query($clientView);
$showTypesView = 'SELECT `type` FROM `showTypes`';
$reqShowTypesView = $pdo->query($showTypesView);
$twentyClients = 'SELECT `lastname`, `firstname` FROM `clients` LIMIT 20';
$reqTwentyClients = $pdo->query($twentyClients);
$fidelityCard = 'SELECT '
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>PDO</title>
        <link rel="stylesheet" href="assets/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body>
        <nav class="nav-extended">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Partie 1</a></li>
                    <li><a href="badges.html">Partie 2</a></li>
                    <li><a href="collapsible.html">T.P</a></li>
                </ul>
                <ul class="side-nav" id="mobile-demo">
                    <li><a href="sass.html">Partie 1</a></li>
                    <li><a href="badges.html">Partie 2</a></li>
                    <li><a href="collapsible.html">T.P</a></li>
                </ul>
            </div>
            <div class="nav-content">
                <ul class="tabs tabs-transparent">
                    <li class="tab"><a href="#exercice1">Exercice 1</a></li>
                    <li class="tab"><a href="#exercice2">Exercice 2</a></li>
                    <li class="tab"><a href="#exercice3">Exercice 3</a></li>
                    <li class="tab"><a href="#exercice4">Exercice 4</a></li>
                    <li class="tab"><a href="#exercice5">Exercice 5</a></li>
                    <li class="tab"><a href="#exercice6">Exercice 6</a></li>
                    <li class="tab"><a href="#exercice7">Exercice 7</a></li>
                </ul>
            </div>
        </nav>
        <div id="exercice1" class="container">
            <h2 class="center-align">Exercice 1</h2>
            <div class="row center-align">
                <div class="col s12 m12 l12">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            WHILE ($row = $reqClientView->fetch()) { //boucle permettant les valeurs choisies dans le tableau client de la bdd colyseum
                                ?>
                                <tr>
                                    <!-- affichage des valeurs cherchées -->
                                    <td><?= $row['lastname'] ?></td>
                                    <td><?= $row['firstname'] ?></td>
                                </tr>
                                <?php
                            }
                            $reqClientView->closeCursor(); // fermeture curseur car plus besoin
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="exercice2" class="container">
            <h2 class="center-align">Exercice 2</h2>
            <div class="row center-align">
                <div class="col s12 m12 l12">
                    <table>
                        <thead>
                            <tr>
                                <th>Types de show</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            WHILE ($row = $reqShowTypesView->fetch()) {
                                ?>
                                <tr>
                                    <td><?= $row['type'] ?></td>                                    
                                </tr>
                                <?php
                            }
                            $reqShowTypesView->closeCursor();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="exercice3" class="container">      
            <h2 class="center-align">Exercice 3</h2>
            <div class="row center-align">
                <div class="col s12 m12 l12">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            WHILE ($row = $reqTwentyClients->fetch()) { //boucle permettant les valeurs choisies dans le tableau client de la bdd colyseum
                                ?>
                                <tr>
                                    <!-- affichage des valeurs cherchées -->
                                    <td><?= $row['lastname'] ?></td>
                                    <td><?= $row['firstname'] ?></td>
                                </tr>
                                <?php
                            }
                            $reqTwentyClients->closeCursor(); // fermeture curseur car plus besoin
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="exercice4" class="container">
            <h2 class="center-align">Exercice 4</h2>

        </div>
        <div id="exercice5" class="container">      
            <h2 class="center-align">Exercice 5</h2>
        </div> 
        <div id="exercice6" class="container">
            <h2 class="center-align">Exercice 6</h2>

        </div>
        <div id="exercice7" class="container">
            <h2 class="center-align">Exercice 7</h2>

        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="assets/js/materialize.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>