<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>07 - PDO - formulaire entreprise</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center my-5">07 - PDO - formulaire entreprise</h1>

        <!-- 
        1. Réaliser un formulaire HTML dont les champs correspondent aux colonnes de la tabla sql 'employes' : 
           prenom, nom, sexe, service, date_embauche, salaire et un bouton de validation submit
        2. Contrôler en PHP que l'on receptionne bien toute les données saisie dans le formulaire (print_r)
        3. Connexion à la BDD
        4. Réaliser le traitement PHP + SQL permettant d'insérer un nouvel employe dans la BDD à la validation du formulaire (EXEC + SQL + $_POST) 
        -->

        <?php 
        // 2. Contrôler en PHP que l'on receptionne bien toute les données saisie dans le formulaire (print_r)
        echo '<pre>'; print_r($_POST); echo '</pre>';

        // 3. Connexion à la BDD
        $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]);
        
        // 4. Réaliser le traitement PHP + SQL permettant d'insérer un nouvel employe dans la BDD à la validation du formulaire (EXEC + SQL + $_POST) 
        if($_POST)
        {
            // A la validation du formulaire, on entre dans le IF et on execute la requete d'insertion
            // On injecte dans les valeurs de la requete (VALUES) les données saisie dans le fomumaire accessible via la superglobale $_POST
            //                                                                                                              <style>body { display:none; }</style>
            $nbInsert = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('$_POST[prenom]', '$_POST[nom]', '$_POST[sexe]', '$_POST[service]', '$_POST[date_embauche]', '$_POST[salaire]')");

            echo "<p class='text-center my-5'><span class='badge bg-success'>$nbInsert</span> employé a bien été enregistré.</p>";
        }
        ?>

        <form method="post" class="col-5 mx-auto">
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="mb-3">
                <label for="sexe" class="form-label">Sexe</label>
                <select class="form-select" name="sexe">
                    <option value="m">Monsieur</option>
                    <option value="f">Madame</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="service" class="form-label">Service</label>
                <input type="text" class="form-control" id="service" name="service">
            </div>
            <div class="mb-3">
                <label for="date_embauche" class="form-label">Date Embauche</label>
                <input type="date" class="form-control" id="date_embauche" name="date_embauche">
            </div>
            <div class="mb-3">
                <label for="salaire" class="form-label">Salaire</label>
                <input type="text" class="form-control" id="salaire" name="salaire">
            </div>
            <button type="submit" class="btn btn-dark">Enregistrer</button>
        </form>

    </div>
</body>
</html>