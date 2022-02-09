<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>04 - GET - Fiche produit</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center my-5">04 - GET - Fiche produit</h1>

        <?php 
        echo '<pre>'; print_r($_GET); echo '</pre>';

        /*
            $_GET : superglobale de type ARRAY, prédéfinie en PHP, accessible de partout (espace LOCAL et GLOBAL) permettant de stocker les données transmises dans l'URL

            Array
            (
              indice   valeur
                [id] => 1
                [article] => pull
                [couleur] => noir
                [prix] => 15
            )

            Exo : afficher les données transmise dans l'URL sur la page web (avec un 'echo'), de 2 façons différentes : 
                1. à l'aide d'une boucle (faites en sorte de ne pas avoir l'id à l'affichage)
                2. en allant piocher dans la superglobale
        */
        
        // Si les indices 'id', 'article', 'couleur' et 'prix' sont définit, existe dans $_GET donc dans l'URL, alors on entre dans la condition et on affiche les données
        if(isset($_GET['id'], $_GET['article'], $_GET['couleur'], $_GET['prix']))
        {
            // 1. à l'aide d'une boucle (faites en sorte de ne pas avoir l'id à l'affichage)
            echo '<div class="alert alert-success col-3 mx-auto text-center">'; 
            //                  id        1
            foreach($_GET as $indice => $valeur)
            {
                // On ne rentre pas dans la condition, seulement au premier tour de boucle, lorsque $indice a pour valeur 'id'
                //     id
                if($indice != 'id')
                    echo "$indice : $valeur<br>";
            }
            echo '</div>';

            // 2. en allant piocher dans la superglobale
            echo '<div class="alert alert-primary col-4 mx-auto text-center mt-3">'; 
                echo "article : $_GET[article]<br>"; // 1ère synthaxe
                echo "couleur : " . $_GET['couleur'] . "<br>"; // 2ème synthaxe
                echo "prix : $_GET[prix]<hr>";

                echo "article : $_GET[article] - couleur : $_GET[couleur] - prix : $_GET[prix]";
            echo '</div>';
        }
        else // Sinon, 1 ou plusieurs indices ne sont pas définit dans $_GET donc dans l'URL, on entre dans la condition else
        {
            // header() : fonction prédéfinie permettant d'effectuer une redirection
            // Si des indices ne sont pas définit dans l'URL, donc dans $_GET, cela veut que l'internaute a potentiellement modifier les paramètres de l4URL, on le redirige vers la boutique.php
            // /!\ surtout pas d'espace entre 'location' et les deux points ':'
            header('location: boutique.php');
            echo "<p class='bg-danger text-white text-center p-3 mx-auto'>D'où tu touche à l'URL ?</p>";
        }

        ?>

    </div>
</body>
</html>