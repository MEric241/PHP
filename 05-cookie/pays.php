<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>05 - COOKIE - Pays</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center my-5">05 - COOKIE - Pays</h1>

        <?php 
        // $_COOKIE : superglobale prédéfinie dans en PHP permettant d'avoir accès aux données stockées dans un fichier de cookie crée par setcookie, c'est une variable de type ARRAY, accessible de partout (espace LOCAL  et GLOBAL)
        echo '<pre>'; print_r($_COOKIE); echo '</pre>';

        if(isset($_GET['pays']))
        {
            $pays = $_GET['pays']; // $pays = it
        }
        elseif(isset($_COOKIE['pays']))
        {
            $pays = $_COOKIE['pays']; // $pays = it
        }
        else 
        {
            $pays = 'fr';
        }

        // Au premier chargement de la page, 1ère visite sur le site, on entre dans le ELSE donc $pays = fr

        //echo time(); // retourne le nombre de secondes écoulées depuis le 1er janvier 1970 à aujourd'hui (c'est un chiffre qui évolue tout le temps, jusqu'en 2038), cela nous permet d'avoir un point de repère dans le temps pour définir à partir de quand nous définissons le fichier de cookie 

        $un_an = 365*24*3600; // permet de définir 1 an en secondes (365j*24h*3600s) 

        // setcookie() : fonction prédéfinie permettant de créer un fichier cookie, c'est un fichier stocké côté client, utilisateur qui contient des informations dites non sensibles (langaue préférée du site, les derniers articles consultés etc...)
        // Le cookie ici dans notre cas sera valable 1 an après la dernière visite de l'utilisateur, l'internaute qui se connecte tous les mois verra son choix garder à l'infini pendant xxxxxx ans.
        // Il n'existe pas de fonction prédéfinie permettant de supprimer un fichier cookie, à la fin de  sa durée de vie, il est supprimé automatiquement

        // arguments : 
        // setcookie("nom_cookie", "valeur_cookie" "durée_de_vie") durée de vie en secondes
        //                  it
        setcookie("pays", $pays, time()+$un_an);

        //       it
        switch($pays)
        {
            case 'fr':
                echo "<p class='alert alert-success text-center col-5 mx-auto'>Vous êtes sur un site en français.</p>";
            break;
            case 'es':
                echo "<p class='alert alert-success text-center col-5 mx-auto'>Vous êtes sur un site en espagnol.</p>";
            break;
            case 'en':
                echo "<p class='alert alert-success text-center col-5 mx-auto'>Vous êtes sur un site en anglais.</p>";
            break;
            case 'it':
                echo "<p class='alert alert-success text-center col-5 mx-auto'>Vous êtes sur un site en italien.</p>";
            break;
        }
        ?>

        <div class="col-4 mx-auto d-flex flex-column">

            <a href="?pays=fr" class="btn btn-dark mb-2">France</a>

            <a href="?pays=es" class="btn btn-info mb-2">Espagne</a>

            <a href="?pays=en" class="btn btn-primary mb-2">Angleterre</a>

            <a href="?pays=it" class="btn btn-success">Italie</a>

        </div>

    </div>
</body>
</html>