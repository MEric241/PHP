<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>07 - PDO PHP data object</title>
</head>
<body>
    <div class="container">

        <h1 class="display-4 text-center my-5">07 - PDO PHP data object</h1>

        <?php 
        echo "<h2 class='text-center my-5'>01. PDO: connexion BDD</h2>";

        /*
            PDO (php data object) est une classe prédéfinie en PHP permettant de seconnecter et de dialoguer avec une base de données à partir d'une page web
            Cette classe possède ses propres méthodes (fonctions)
            Pour pouvoir utiliser la classe PDO, nous devons en créer un nouvel exemplaire, un nouvel objet grace au mot clé "new"
            'new' permet de déployer la classe PDO afin que l'on puisse s'en servir 
            arguments : 
            1. serveur (mysql)
            2. hôte : adresse http du serveur (localhost ou 127.0.0.1)
            3. Le nom de la BDD (entreprise)
            4. L'identifiant (root)
            5. mot de passe (vide sur xampp | 'root' sur mampp)
            6. options PDO (alert warning en cas de mauvaise connexion, encodage en utf8 dans la BDD etc...)

            $pdo est un objet issu de la classe PDO permettant d'être connecté à la BDD et de pouvoir formuler et executer des requetes SQL 
            $pdo est comme un conteneur, une boite qui contient un certain nombre de fonctions (méthodes) permettant de réaliser des traitements spécifique sur la BDD
        */

        $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ]);

        echo '<pre>'; var_dump($pdo); echo '</pre>';
        echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';

        echo "<h2 class='text-center my-5'>02. PDO: EXEC - INSERT / UPDATE / DELETE</h2>";

        /*
            EXEC() : méthode (fonction) issue de la classe PDO ($pdo) permettant de formuler et d'executer des requetes SQL ne retournant pas de jeu de résultats (INSERT / UPDATE / DELETE). Il n'est pas possible d'executer une requete SQL de selection (SELECT) avec la méthode EXEC()
            On lui fournit en argument (entre les parenthèses) la requete SQL à executer
            EXEC() retourne le nombre d'enregistrement affecté par la requete (ex: si nous supprimons (DELETE) 15 employes dans la BDD, exec() retourne un integer de 15) 
        */

        // INSERT 
        $nbInsert = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Grégory', 'LACROIX', 'm', 'PDG', '2022-02-02', 30000)");

        echo "nombre d'enregistrement affecté par INSERT : <span class='badge bg-success'>$nbInsert</span><hr>";

        // UDPATE 
        // Exo : réaliser le traitement PHP + SQL permettant de modifier le salaire de l'employé id 350 par 1200
        $nbUpdate = $pdo->exec("UPDATE employes SET salaire = 1200 WHERE id_employes = 350");

        echo "nombre de modification affecté par UPDATE : <span class='badge bg-success'>$nbUpdate</span><hr>";

        // DELETE 
        // Exo : réaliser le traitement PHP + SQL permettant de supprimer l'employé id 350
        $nbDelete = $pdo->exec("DELETE FROM employes WHERE id_employes = 350");

        echo "nombre de suppression affecté par DELETE : <span class='badge bg-success'>$nbDelete</span><hr>";

        echo "<h2 class='text-center my-5'>03. PDO: QUERY - SELECT + FETCH_ASSOC (1 seul résultat)</h2>";

        /*
            QUERY() : méthode issue de la classe PDO permettant de formuler et d'executer des requetes SQL (INSERT, UPDATE, DELETE, SELECT)
            QUERY() retourne un autre objet issu d'une autre classe : PDOStatement
            PDOStatement est une classe prédéfinie en PHP qui possède ses propres méthodes (fonctions)
        */

        // Selection des données de l'employé id 388
        $pdoStatement = $pdo->query("SELECT * FROM employes WHERE id_employes = 388");

        /*
            $pdoStatement est un objet issu de la classe PDOStatement
            $pdoStatement est l'objet inexploitable en l'état mais il contient une méthode (fonction) : FETCH()
            FETCH() : méthode issue de la classe PDOStatement permettant d'obtenir un résultat exploitable sous forme de tableau de données ARRAY
        */

        echo '<pre>'; var_dump($pdoStatement); echo '</pre>';
        echo '<pre>'; print_r(get_class_methods($pdoStatement)); echo '</pre>';

        /*
            PDO::FETCH_ASSOC -> constante de la classe PDO qui retourne un ARRAY indexé avec le nom des champs/colonne de la table SQL
            PDO::FETCH_NUM -> constante de la classe PDO qui retourne un ARRAY indexé numériquement
            PDO::FETCH_BOTH -> constante de la classe PDO qui retourne un ARRAY indexé à la fois numériquement et avec le nom des champs/colonne de la table SQL
            PDO::FETCH_OBJ -> constante de la classe PDO qui retourne un objet issu de la classe stdClass (class standart de PHP) avec comme indices des propriétés public de l'objet
        */

        $employe = $pdoStatement->fetch(PDO::FETCH_ASSOC);  
        // $employe = $pdoStatement->fetch(PDO::FETCH_NUM);
        // $employe = $pdoStatement->fetch(PDO::FETCH_BOTH);
        // $employe = $pdoStatement->fetch(PDO::FETCH_OBJ);

        // echo $employe->prenom . '<hr>';

        echo '<pre>'; print_r($employe); echo '</pre>'; 

        echo "bonjour $employe[prenom] ! <hr>";

        // Exo : afficher les données (affichage conventionnel 'echo') de l'employé 388 en passant par le tableau Array $employe à l'aide d'une boucle
        echo '<div class="col-3 mx-auto bg-success text-white text-center p-3">'; 
        foreach($employe as $key => $value)
        {
            echo "$key: $value<br>";
        }
        echo '</div>';

        echo "<h2 class='text-center my-5'>04. PDO: QUERY - WHILE + SELECT + FETCH_ASSOC (plusieurs résultats)</h2>";

        $pdoStatement = $pdo->query("SELECT * FROM employes");

        // rowCount() : méthode (fonction) issue de la classe pdoStatement qui retourne le nombre de résultats issue de la requete de selection
        echo "Nombre d'employés : <span class='badge bg-success'>" . $pdoStatement->rowCount() . "</span><hr>";

        echo '<pre>'; var_dump($pdoStatement); echo '</pre>';

        /*
            la boucle WHILE tourne autant de fois qu'il y a de lignes de résultats par rapport à la requete de selection
            Ici la boucle tourne 37 fois puisque nous avons selectionné les 37 employés dans la requete SELECT
            fetch() s'execute pour chaque tour de boucle et WHILE et retourne 1 array par tour de boucle contenant une ligne de résultat de la table SQL, c'est à dire les données d'1 employé par tour de boucle

            class PDO 
            {
                const FETCH_ASSOC = .......
            }
            PDO::FETCH_ASSOC
            les '::' permettent d'atteindre un élément qui appartient à la classe (static)
        */

        //    1 ARRAY par tour de boucle contenant les données d'1 employé
        while($employes = $pdoStatement->fetch(PDO::FETCH_ASSOC))
        {
            echo '<pre>'; print_r($employes); echo '</pre>';

            echo '<div class="col-3 mx-auto bg-info text-white text-center p-3">'; 
                echo "Prénom : $employes[prenom]<br>";
                echo "Nom : $employes[nom]<br>";
                echo "Service : $employes[service]<br>";
                echo "Salaire : $employes[salaire]<br>";
            echo '</div>';
        }

        //########################################################

        $pdoStatement = $pdo->query("SELECT * FROM employes");

        //     ARRAY 417   
        while ($employes = $pdoStatement->fetch(PDO::FETCH_ASSOC)) {
            echo '<pre>'; print_r($employes); echo '</pre>';

            echo '<div class="col-3 mx-auto bg-primary text-white text-center p-3">'; 
            //    ARRAY 417   [salaire] => 2300
            foreach($employes as $key => $value)
            {
                echo "$key: $value<br>";
            }
            // On transmet à la boucle FOREACH chaque Array retourné par fetch() afin de parcourir chaque données de chaque employé
            // La boucle crée une div pour chaque tour de boucle contenant les données d'1 employé
            echo '</div>';
        }

        echo "<h2 class='text-center my-5'>05. PDO: QUERY - FETCHALL + FETCH_ASSOC (plusieurs résultats)</h2>";

        $pdoStatement = $pdo->query("SELECT * FROM employes");

        $employesMulti = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        /*
            fetchAll() : méthode issue de la classe PDOStatement qui retourne un tableau multidimensionnel contenant les Array de chaque employés, de chaque ligne de résultats de la BDD, indexés numériquement.

            Exo : afficher l'ensemble du tableau mutlidimensionnel, comme l'exemple ci-dessus en passant par le tableau multi $employes à l'aide de boucle foreach()

            foreach()
            {
                foreach()
                {

                }
            }

        */

        // $tab receptionne 1 ARRAY contenant les données d'1 employé par tour de boucle
        // Il n'est pas possible de faire un 'echo $tab' -> on ne peut pas convertir un ARRAY en chaine de caractères
        // On transmet chaque tableau ARRAY $tab à la seconde boucle FOREACH afin de parcourir les données des différents ARRAY du tableau multi 
        //                         [1]    ARRAY 415                         
        foreach($employesMulti as $key => $tab)
        {
            echo '<div class="col-3 mx-auto bg-danger text-white text-center p-3 mb-2">';
            //           [salaire] => 2300
            foreach($tab as $key2 => $value)
            {
                echo "$key2: $value<br>";
            }
            echo '</div>';
        }

        echo '<pre>'; print_r($employesMulti); echo '</pre>';

        echo "<h2 class='text-center my-5'>06. PDO EXO : QUERY + FETCH + BDD</h2>";

        // Exercice : afficher la liste des base de données, puis la mettre dans une liste ul li (commande sql permettant de 'voir les BDD')

        $pdoStatement = $pdo->query("SHOW DATABASES");

        $tab_multi = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        echo '<pre>'; print_r($tab_multi); echo '</pre>';

        echo '<ul class="col-4 mx-auto text-center list-group">';
        foreach($tab_multi as $tab)
        {
            foreach($tab as $value)
            {
                echo "<li class='list-group-item'>$value</li>";
            }
        }
        echo '</ul>';

        echo "<h2 class='text-center my-5'>07. PDO : QUERY + FETCHALL + TABLE</h2>";

        $pdoStatement = $pdo->query("SELECT * FROM employes");

        $empMulti = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        echo '<pre>'; print_r($empMulti); echo '</pre>';

        // On va crocheter à l'indice [0] du tableau multi afin d'avoir accès au 1er tableau ARRAY et on stock chaque indice de l'array dans des cellule <th></th> (entetes du tableau)
        echo '<table class="table table-bordered text-center"><tr>'; 
        //                  id_employes 
        foreach($empMulti[0] as $key => $value)
        {
            // ucfrist() : fonction prédéfinie permettant de mettre la 1ère de la chaine de caractère en majuscule
            echo "<th>" . ucfirst($key) . "</th>";
        }
        echo '</tr>';
        foreach($empMulti as $key => $tab)
        {
            echo '<tr>'; 
            foreach($tab as $value)
            {
                echo "<td>$value</td>";
            }
            echo '</tr>';
        }
        echo '</table>';
        ?>

    </div>
</body>
</html>