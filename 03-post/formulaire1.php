<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>03 - formulaire 1</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center my-5">03 - formulaire 1</h1>

        <?php 
        echo '<pre>'; print_r($_POST); echo '</pre>';

        /*
            $_POST est une supergloable prédéfinie en PHP, de type ARRAY permettant de stocker, de récupérer en PHP les données saisie dans un formulaire

            Les indices du tableau ARRAY $_POST correspondent aux attributs 'name' définit dans le formulaire HTML

            Array
            (
                $indice    $valeur
                [email] => gregorylacroix78@gmail.com
                [password] => rthrthrthrth
            )

            Au premier chargement de la page, sans la condition IF, nous avons 2 erreurs 'undefined' (index non définit), cela est dû au fait que le formulaire n'a pas été validé et par conséquent que $_POST est vide, les indices 'name' du formulaire ne sont détectés dans $_POST 
            Si nous validons le formulaire, les erreurs disparaissent, les indices 'name' du formulaire sont détéctés et définit dans $_POST
            La condition retourne TRUE seulement dans le cas où nous avons soumit le formulaire et que $_POST contient bien les données saisie dans le formulaire
            Au premier chargement de la page, on entre pas dans la condition puisque le formulaire n'a pas été validé et par conséquent les indice dans $_POST ne sont pas détéctés

        */

        if($_POST)
        {
            // 1. A l'aide d'une boucle 
            //                [password] => toto78950
            foreach($_POST as $indice => $valeur)
            {
                //    password   : azdazdadazdazd
                echo "$indice : $valeur<br>";
            }
            echo '<hr>';

            // 2. En piochant aux différents indices de $_POST
            echo "email : " . $_POST['email'] . '<br>';
            echo "password : " . $_POST['password'] . '<br>';   

            // Autre synthaxe : 
            // Il est possible d'appeler un ARRAY entre guillemets, mais il ne faut surtout mettre les '' quotes dans les crochets [] (ne fonctionne pas avec les tableaux multidimensionnel)
            echo "password : $_POST[password]<br>";
        }
        
        ?>

        <!-- method : attribut HTML permettant de définir comment vont circuler les données saisie dans le formulaire (get ou post) -->
        <form method="post" class="col-6 mx-auto">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="email Help">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password">
                <!-- name : attribut HTML permettant en PHP de récuperer la valeur saisie dans le champ du formulaire -->
            </div>
            <button type="submit" class="btn btn-dark">Continuer</button>
        </form>

    </div>
</body>
</html>