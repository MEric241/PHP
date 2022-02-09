<?php 
// 2. Connexion à la BDD
$bdd = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

// 4. Controler en PHP que l'on receptionne bien toute les données du formulaire (print_r)
// echo '<pre>'; print_r($_POST); echo '</pre>';

if(isset($_POST['pseudo'], $_POST['message']))
{
    // Traitements failles XSS 
    $_POST['pseudo'] = htmlentities($_POST['pseudo']);
    $_POST['message'] = htmlentities($_POST['message']);

    //               pseudo   GregFormateur
    //               message   Yep !
    foreach($_POST as $key => $value)
    {
        // $_POST['pseudo'] = htmlentities(GregFormateur)
        // $_POST['message'] = htmlentities(Yep !)
        $_POST[$key] = htmlentities($value);
    }

    // 5. Réaliser le traitement PHP + SQL permettant d'insérer un nouveau commentaire à la validation du formulaire (INSERT)
    // NOW() : fonction prédéfinie SQL qui retourne la date et l'heure
    // $req = "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES ('$_POST[pseudo]', NOW(), '$_POST[message]')";

    // $nbPost = $bdd->exec($req);

    // $msgPost = "<p class='text-center mt-5'><span class='badge bg-success'>$nbPost</span> nouveau message posté.</p>";

    // echo "<hr>$req<hr>";

    // Requete préparée pour parer aux injections SQL
    $req = "INSERT INTO commentaire (pseudo, date_enregistrement, message) VALUES (:pseudo, NOW(), :message)";

    $pdoStmt = $bdd->prepare($req);
    $pdoStmt->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);
    $pdoStmt->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
    $pdoStmt->execute();

    echo "<hr>$req<hr>";

    $msgPost = "<p class='text-center mt-5'><span class='badge bg-success'>" . $pdoStmt->rowCount() . "</span> nouveau message posté.</p>";

    /*  
        prepare() : méthode (fonction) issue de la classe PDO qui permet : 
        1. Si nous avons une requete recuurente, que nous formulons XXXX fois dans notre code, prepare permet de ne formuler la requete qu'une seule fois et de pouvoir l'executer autant de fois que possible 
        2. permet de parer aux injections SQL

        :pseudo / :message : ce sont des marqueurs nominatifs, que l'on peut comparer à des boites vide permettant d'enfermer une valeur. Ici ils permettent d'enfermer les valeurs saisie dans le formulaire, si l'internaute injecte du code SQL, il sera enfermé dans le marqueur et ne pourra pas détourner le comportement initial de notre requete SQL (INSERT)
        Les marqueurs se déclarent toujours avec les ':' suivi du nom du marqueur que nous définissons

        prepare() retourne un objet issu de la classe PDOStatement

        bindValue() : méthode issue de la classe PDOStatement permettant d'associer / injecter / envoyer une valeur dans les marqueurs nominatif déclarés (:pseudo / :message)

        execute() : méthode issue de la classe PDOStatement permettant d'executer la requete préparée.
    */
}

//  6. Réaliser le traitement PHP + SQL permettant d'afficher tout les messages postés, donc enregistrés dans la table sql commentaire (SELECT)
// DATE_FORMAT() : fonction prédéfinie SQL permettant de formater une date/heure locale
$pdoStatement = $bdd->query("SELECT pseudo, DATE_FORMAT(date_enregistrement, '%d/%m/%Y à %H:%i:%s') AS dateheureFr, message FROM commentaire");

$msg = '';
while($comment = $pdoStatement->fetch(PDO::FETCH_ASSOC))
{
    // echo '<pre>'; print_r($comment); echo '</pre>';

    $msg .= "<div class='col-8 mx-auto alert alert-info'>";

        $msg .= "<p class='fst-italic'><small>Posté par <strong>$comment[pseudo]</strong>, le $comment[dateheureFr]</small></p><hr>";

        $msg .= "<p class='mb-0'>$comment[message]</p>";

    $msg .= "</div>";
}

/*
    FAILLES SECURITES

    1. Failles XSS (cross-site scripting) : faille de sécurité des sites Web permettant d'injecter du contenu dans une page, provoquant ainsi des actions sur les navigateurs web visitant la page.

    Injection de code html directement dans le formulaire :
    <style>
    body{
        display: none;
    }
    </style>

    <script>
    var point = true;
    while(point == true)
    alert("niqué");
    </script>

    Pour parer aux failles XSS, il existes des fonctions prédéfinies
    htmlentities : convertit tout les caractères éligibles en entités HTML (le < est convertit en '&lt;' dans la BDD), donc les balises injectées dans la BDD à perdu son pouvoir, ce n'est plus une balise HTML mais une chaine de caractères, de ce fait le navigateur le les interprètre pas 
    strip_tags : permet de supprimer les balises HTML
    htmlspecialchars : Convertit toutles caractères spéciaux en entités HTML

    2. Injections SQL : c'est le fait d'injecter du SQL dans un formulaire, et ce code va detourner le comportement initial de notre requete SQL

    ok'); DELETE FROM commentaire; (
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>08 - PDO - TCHAT - failles sécurités</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center my-5">Bienvenue sur le TCHAT !</h1>

        <?php 
        // Affichage des commentaires postés stockés dans $msg
        echo $msg;

        // Affichage message utilisateur
        if(isset($msgPost)) echo $msgPost;
        ?>

        <!-- 3. Création d'un formulaire HTML pour l'ajout de message (pseudo, message et bouton submit) -->
        <form method="post" class="col-8 mx-auto">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-dark mb-5">Poster</button>
        </form>

    </div>
</body>
</html>