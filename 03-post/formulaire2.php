<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>03 - formulaire 2</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center my-5">03 - formulaire 2</h1>

        <!-- 
        1. Réaliser un formulaire HTML avec les champs suivant : 
           pseudo, nom, prenom, email, mot de passe (password), confirmer mot de passe (confirm_password),  adresse, ville, code postal (code_postal) et un bouton submit de validation 
        2. Contrôler en PHP que l'on receptionne bien toute les données saisie dans le formulaire (print_r)
        3. Faites en sorte d'informer l'internaute si le champ 'pseudo' est laissé vide
        4. Faites en sorte d'informer l'internaute si la taille du champ 'nom' n'est pas comprise entre 2 et 50 caractères (iconv_strlen)
        5. Faites en sorte d'informer l'internaute si les mots de passe ne correspondent pas 
        6. Faites en sorte d'informer l'internaute si l'email n'est pas du bon format (filter_var)
        7. Faites en sorte d'informer l'internaute si la taille du code postal est différente de 5 (iconv_strlen) et si il n'est pas type numérique (is_numeric)
        8. Afficher un message de validation si l'internaute a correctement rempli le formulaire
        -->

        <?php 
        // 2. Contrôler en PHP que l'on receptionne bien toute les données saisie dans le formulaire (print_r)
        echo '<pre>'; print_r($_POST); echo '</pre>';

        if($_POST)
        {
            // On stock une classe CSS bootstrap dans une variable afin d'affecter une bordure rouge au champ input en cas d'erreur de saisie
            $border = 'border border-danger';

            //  3. Faites en sorte d'informer l'internaute si le champ 'pseudo' est laissé vide
            // Si la valeur du champ 'pseudo' ($_POST['pseudo']) est vide (empty), alors on entre dans la condition IF
            if(empty($_POST['pseudo']))
            {
                // On stock le message utilisateur dans une variable afin de l'appeler et d'afficher le message où l'on souhaite sur la page
                $errorPseudo = "<small class='fst-italic text-danger'>Merci de saisir un pseudo.</small>";

                $error = true;
            }

            //  4. Faites en sorte d'informer l'internaute si la taille du champ 'nom' n'est pas comprise entre 2 et 50 caractères (iconv_strlen)
            if(iconv_strlen($_POST['nom']) < 2 || iconv_strlen($_POST['nom']) > 50)
            {
                $errorNom = "<small class='fst-italic text-danger'>Taille non conforme (entre 2 et 50 caractères).</small>";

                $error = true;
            }

            // 5. Faites en sorte d'informer l'internaute si les mots de passe ne correspondent pas 
            // SI la valeur du champ 'password' est différente (!=) de la valeur du champ 'confirm_password', alors on entre dans le IF
            if($_POST['password'] != $_POST['confirm_password'])
            {
                $errorPassword = "<small class='fst-italic text-danger'>Vérifier les mots de passe</small>";

                $error = true;
            }

            //  6. Faites en sorte d'informer l'internaute si l'email n'est pas du bon format (filter_var)
            // Si la valeur du champ 'email' N'EST PAS (!) du bon format/filtre, alors on entre dans la condition IF
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $errorEmail = "<small class='fst-italic text-danger'>Format Email invalide (ex : exemple@gmail.com).</small>";

                $error = true;
            }

            // 7. Faites en sorte d'informer l'internaute si la taille du code postal est différente de 5 (iconv_strlen) et si il n'est pas type numérique (is_numeric)
            if(iconv_strlen($_POST['code_postal']) != 5 || !is_numeric($_POST['code_postal']))
            {
                $errorCp = "<small class='fst-italic text-danger'>Format code postal invalide (ex: 75012).</small>";

                $error = true;
            }

            // 8. Afficher un message de validation si l'internaute a correctement rempli le formulaire
            // Si la variable $error N'EST PAS (!) définit (isset), cela veut dire l'internaute n'est entré dans aucune des conditions IF de contrôle ci-dessus et par conséquent que la variable n'est pas déclarée, elle n'est définit qu'en cas d'erreur de saisie
            if(!isset($error))
            {
                echo "<p class='bg-success text-white text-center p-3 col-6 mx-auto'>Félicitations !! Vous êtes mainteant inscrit sur le site !</p>";

                // Requete SQL d'insertion (INSERT)
            }
        }
        ?>

        <form method="post" class="col-6 mx-auto">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>

                <!-- Si le champ 'pseudo' est laissé vide, donc si $errorPseudo est définit (isset), alors on affecte la classe 'border border-danger' stockée dans la variable $border, au champ input afin d'avoir une bordure rouge en cas d'erreur de saisie -->
                <input type="text" class="form-control <?php if(isset($errorPseudo))  echo $border; ?>" id="pseudo" name="pseudo">

                <!-- SI la variable $errorPseudo est définit (isset), cela veut dire que l'internaute n'a pas remplie le champs 'pseudo' et par conséquent est entré dans la condition IF de contrôle, alors on affiche le message d'erreur contenu dans $errorPseudo -->
                <?php if(isset($errorPseudo)) echo $errorPseudo; ?>
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>

                <input type="text" class="form-control <?php if(isset($errorNom)) echo $border; ?>" id="nom" name="nom">

                <?php if(isset($errorNom)) echo $errorNom; ?>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>

                <input type="text" class="form-control <?php if(isset($errorEmail)) echo $border; ?>" id="email" name="email" aria-describedby="email Help">

                <?php if(isset($errorEmail)) echo $errorEmail; ?>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>

                <input type="text" class="form-control <?php if(isset($errorPassword)) echo $border; ?>" id="password" name="password">

            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmer votre mot de passe</label>

                <input type="text" class="form-control <?php if(isset($errorPassword)) echo $border; ?>" id="confirm_password" name="confirm_password">

                <?php if(isset($errorPassword)) echo $errorPassword; ?>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse">
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville">
            </div>
            <div class="mb-3">
                <label for="code_postal" class="form-label">Code postal</label>

                <input type="text" class="form-control <?php if(isset($errorCp)) echo $border; ?>" id="code_postal" name="code_postal">

                <?php if(isset($errorCp)) echo $errorCp; ?>
            </div>
            <button type="submit" class="btn btn-dark mb-5">Continuer</button>
        </form>

    </div>
</body>
</html> 

    