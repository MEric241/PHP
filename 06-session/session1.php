<?php 

echo "<h1>06 - session PHP</h1>";

// Création d'un fichier de session
// session_start() : fonction prédéfinie permettant de créer un fichier de session stocké sur le serveur
// dans xampp dans le dossier 'C://xampp/tmp/'
session_start();

// Le fichier de session est accessible / exmploitable en PHP via la superglobale $_SESSION
// C'est une variable de type ARRAY, accessible de partout (espace LOCAL et GLOBAL)
// Les sessions sont des fichiers stockés côté serveur, qui contient des données dites plus sensibles (nom, prenom, email, informations du panier etc...)
// Techniquement, les sessions permettent de garder des variables actives quelque soit le fichier ou la page dans laquelle nous nous trouvons
// C'est par exemple ce qui vous permet d'être authentifié (connecté) sur un site et de pouvoir naviguer sans être deconnecté à chaque fois que vous changez de page

// Dans la session, on crée différents indices
$_SESSION['pseudo'] = 'GregFormateur';
$_SESSION['nom'] = 'LACROIX';   
$_SESSION['prenom'] = 'Grégory';

/*
    Array(
        ['user'] => Array(
            [nom] => 'toto',

        )
        ['panier'] => Array(
            [0] => 1245,
            [1] => 'tee-shirt'
        )
    )
*/

// unset permet de vider une partie de la session
unset($_SESSION['pseudo']);

echo '<pre>'; print_r($_SESSION); echo '</pre>';

// Il est possible de supprimer le fichier de session 
// session_destroy();

