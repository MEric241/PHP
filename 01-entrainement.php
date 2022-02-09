<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>01 - entrainement PHP</title>
</head>

<body>
    <div class="container">

        <h1 class="display-4 text-center my-5">01 - entrainement PHP</h1>

        <?php 
        // ouverture de la balise PHP
        // pour coder en php dans un fichier extension .php, il faut ouvrir les balises PHP 
        // Il est possible d'ouvrir/fermer les balises PHP autant de fois que souhaité dans le fichier
        // Chaque instruction se termine toujours par un point virgule ';'

        echo 'Bonjour'; // instruction d'affichage 'echo' que l'on peut traduire par 'affiche moi' 

        echo '<br>'; // nous pouvons aussi y mettre du HTML
        echo 'Bonjour';

        echo '<h2>Commentaires</h2>';

        echo 'texte<br>'; // un commentaire sur une seule ligne 
        echo 'texte<br>'; /*
            un commentaire sur 
            plusieurs lignes
        */
        echo 'texte'; # un commentaire sur une seule ligne

        echo '<h2>Variables : types / déclaration / affectation</h2>';

        // Une variable est un espace nommé permettant de conserver une valeur 
        // Déclaration d'une variable toujours avec le signe '$' suivi du nom de la variable que nous définissons 
        // Caractères autorisés : A à Z | a à z | 0 à 9 | _ 
        // Pas d'accent, pas d'espace

        // $2a --> /!\ erreur ! pas de chiffre après le signe '$'
        // $a2 --> OK !  

        // gettype() : fonction prédéfinie PHP (prochain chapitre) qui retourne le type d'une variable

        $a = 127; // affectation de la valeur 127 pour la variable nommée 'a'
        echo gettype($a); // un chiffre entier, type : INTEGER
        echo '<br>';

        $b = 1.5;
        echo gettype($b); // un nombre à virgule, type : DOUBLE 
        echo '<br>';

        $c = 'Une chaine de caractères';
        echo gettype($c); // une chaine de caractères, type : STRING
        echo '<br>';

        $d = '127';
        echo gettype($d); // la valeur de la variable est 127 mais son type est différent puisque déclaré entre quote '', donc type : STRING
        echo '<br>';

        $e = true; // ou false
        echo gettype($e); // type : BOOLEAN
        echo '<br>';

        echo '<h2 class="">Concaténation</h2>';

        $x = "Bonjour ";
        $y = "Tout le monde";

        echo $x . $y . '<br>'; // point de concaténation que l'on peut traduire par 'suivi de'
        echo "$x $y <br>"; // entre guillemets, les variables sont interprétés
        echo '$x $y <br>'; // entre simple quotes, les variables ne sont pas interprétées, c'est une chaine de caractères
        echo 'aujourd\'hui'; // pour échapper l'apostrophe dans la chaine de caractère, nous utilisons un caractère d'échappement, '\'

        echo "<h2>Concaténation lors de l'affectation</h2>";
        
        $prenom = "Nicolas ";
        $prenom .= "Marie"; // cela ajoute la valeur "Marie" à la variable déclarée $prenom sans remplacer la valeur précédente gràce à l'opérateur '.='  
        echo $prenom . '<br>';
        echo "$prenom<br>";
        // Contexte : pratique pour stocker différents messages utilisateurs sans avoir à déclarer X variables

        echo "<h2>Constantes et constante magiques</h2>";

        // Une constante tout comme une variable permet de conserver une valeur, mais comme son nom l'indique elle est... CONSTANTE ! c'est à dire que l'on ne pourra pas modifier sa valeur durant l'execution du script 

        // define() : fonction prédéfinie permettant de déclarer des constantes 
        // arguments : 
        // define("NOM_CONSTANTE", "valeur_constante");
        // Une constante se déclare par convention toujours en MAJUSCULE
        define("CAPITALE", "Paris");
        echo CAPITALE . '<br>';

        // define("CAPITALE", "Rome"); /!\ erreur ! il n'est pas possible de redéfinir une constante déjà déclarée
        
        // contexte : pratique pour garder de manière certaine la connexion à la BDD

        // Constante magiques 
        // Ces constantes sont prédéfinie dans le code PHP et retourne un certain type d'informations
        echo __FILE__ . '<br>'; // retourne le chemin complet vers le fichier  
        echo __LINE__ . '<br>'; // retourne le numéro de la ligne où la constante est executée

        echo "<h2>Exerice variable</h2>";

        // Exo : afficher 'vert-jaune-rouge' (avec les tirets) en plaçant chaque couleur dans une variable. Faites en sorte que chaque mot soit de la bonne couleur.
        $vert = '<span id="vert">vert</span>';
        $jaune = '<span id="jaune">jaune</span>';
        $rouge = '<span id="rouge">rouge</span>';

        echo $vert . '-' . $jaune . '-' . $rouge . '<br>';
        echo "$vert-$jaune-$rouge<br>";

        echo "<h2>Opérateurs arithmétique</h2>";

        $a = 10; $b = 2;

        echo $a + $b . '<br>'; // 12 
        echo $a - $b . '<br>'; // 8
        echo $a * $b . '<br>'; // 20
        echo $a / $b . '<br>'; // 5 
        //   10   2
        echo $a % $b . '<hr>'; // 0

        // opération / affectation 
        $a += $b; // equivaut à $a = $a + $b | 12
        echo $a . '<br>';
        $a -= $b; // equivaut à $a = $a - $b | 10
        echo $a . '<br>';
        $a *= $b; // equivaut à $a = $a * $b | 20
        echo $a . '<br>';
        $a /= $b; // equivaut à $a = $a / $b | 10 
        echo $a . '<br>';

        // contexte : pratique pour le calcul d'un panier

        echo "<h2>Structure conditionnelle (if / else) - opérateurs de comparaisons</h2>";

        $var1 = 0;
        $var2 = "";

        // empty() : fonction qui test si une variable contient 0, si elle est vide ou si elle est non définit
        if(empty($var1))
        {
            echo "0, vide ou non définie<hr>";
        }
        // Contexte : empty nous permettra plus tard de vérifier si un champ d'un formulaire est vide ou non.

        // isset() : fonction qui test l'existence d'une variable, si elle est définit ou non
        if(isset($var2))
        {
            echo "var2 existe mais ne contient pas de valeur<hr>";
        }
        // Contexte : isset permettra de vérifier si l'internaute a validé le bouton submit du formulaire, ou permet de vérifier si certaines informations sont définit dans l'URL ou non

        /*
            OPERATEURS DE COMPARAISONS 
            =           égal à 
            ==          comparaison de la valeur 
            ===         comparaison de la valeur et du type 
            <           strictement inférieur 
            >           strictement supérieur 
            <=          inférieur ou égal à 
            >=          supérieur ou égal à 
            !           n'est pas 
            !=          différent de 
            AND &&      ET 
            OR ||       OU 
            XOR         OU exclusif
        */

        // if / else
        $a = 10; $b = 5; $c = 2;

        // Si la condtion dans les parenthèses du IF retourne TRUE, on entre les accolades et le code s'execute
        // 10 > 5
        if($a > $b)
        {
            echo "A est supérieur à B<br>";
        }
        else // Sinon... dans tout les autres cas, si la condition retourne FALSE, on tombe dans le cas ELSE 
        {
            echo "Non c'est B qui est supérieur à A<br>";
        }

        // if / elseif / else 
        $a = 10; $b = 5; $c = 2;

        // 10
        if($a == 10)
        {
            echo "A est égal à 10<br>";
        } //   5    2
        elseif($b > $c)
        {
            echo "B est supérieur à C<br>";
        }
        else 
        {
            echo "Tout le monde a faux<br>";
        }
        // ELSEIF permet d'ajouter des cas supplémentaire à la condition 
        // Si une des conditions retourne TRUE, tout les cas suivants ne seront pas évalués

        // Condition ternaire (2ème possiblité d'écriture if/else) 
        echo ($a == 10) ? "A est égal à 10<br>" : "A n'est pas égal à 10";
        // le ? remplace le IF 
        // les ':' remplace le ELSE
        
        echo "<h2>Condition SWITCH</h2>";
        
        $perso = 'Mario';
        switch($perso)
        {
            case 'Toad':
                echo "Vous avez choisi Toad";
            break;
            case 'Yoshi':
                echo "Vous avez choisi Yoshi";
            break;
            case 'Bowser': 
                echo "Vous avez choisi Bowser";
            break;
            default: // cas par défaut qui n'est pas indispensable
                echo "Vous êtes fou c'est Mario le meilleur !!<br>";
            break;
        }
        // La condition SWITCH permet de comparer une valeur a différents cas potentiels
        // Les 'case' représentent les cas dans lesquels nous pouvons potentiellement tomber
        // 'break' permet de stopper l'execution de la condition du SWITCH si nous entrons dans un des cas

        // Est-il possible de faire la même chose que la condition SWITCH avec des conditions if/elseif/else ? Si oui, faites le.
        $perso = 'Mario';

        if($perso == 'Toad')
            echo "Vous avez choisi Toad<br>";
        elseif($perso == 'Yoshi')
            echo "Vous avez choisi Yoshi<br>";
        elseif($perso == 'Bowser')
            echo "Vous avez choisi Bowser<br>";
        else
            echo "Vous êtes fou c'est Mario le meilleur!<br>";

        // le == permet de comparer la valeur d'une variable
        // Si il n'y a qu'une seule instruction dans les conditions, les accolades {} ne sont pas nécessaires

        echo "<h2>Fonction prédéfinies</h2>";

        // Comme dans tout langage de programmation, PHP possède ses propres fonctions prédéfinies, elles permettent d'executer des traitements spécifiques, vous pouvez les consulter à cette adresse : https://www.php.net/manual/fr/indexes.functions.php

        // Fonction date() : permet de formater un date / heure locale
        echo 'Date : <strong>' . date('d/m/Y') . '</strong>';

        // Une fonction s'appele toujours avec des parenthèses puisqu'on peut potentiellement lui transemttre des arguments

        echo "<h2>Traitements des chaines (iconv_strlen, strpos, substr)</h2>";

        // strpos (string position)
        $email = 'gregorylacroix78@gmail.com';
        echo "@ se trouve à la position : " . strpos($email, '@') . "<hr>";

        $email2 = "bonjour";
        echo "@ se trouve à la position : " . strpos($email2, '@') . "<hr>"; // cette ligne ne sort rien, pourtant il y a bien quelque chose à l'intérieur : FALSE !! 

        // print_r()
        var_dump(strpos($email2, '@')); // Grace au var_dump(), on aperçoit le FALSE si le caractère '@' n'est pas trouvé. var_dump() est donc une instruction d'affichage améliorée que l'on utilise régulièrement en phase de développement. C'est un outil de debugg. Il existe print_r()

        /*
            strpos : fonction prédéfinie permettant de trouver la position d'un caractère dans une chaine
            arguments : 
            1. La chaine dans laquelle nous souhaitons chercher
            2. L'information à chercher
        */

        // iconv_strlen (internation convertion string lenght)
        $phrase = "une chaine de caractères";
        echo "<hr>Taille de la chaine de caractères : " . iconv_strlen($phrase) . "<hr>"; //  24

        // imaginons le pseudo recupéré en PHP via un formulaire
        $pseudo = "GregFormateur";

        //              13                      13
        if(iconv_strlen($pseudo) < 5 || iconv_strlen($pseudo) > 30)
        {
            echo "Format pseudo non valide (entre 5 et 30 caractères)<br>";
        }
        else 
        {
            echo "Pseudo valide<br>";
        }

        /*
            iconv_strlen : fonction prédéfinie permettant de calculer la taille d'une chaine de caractères
            contexte : nous pourrons l'utiliser pour savoir si le pseudo ou le mot de passe ont des tailles conformes
        */

        // substr (substract string)
        $texte = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque rem, molestias alias recusandae accusantium maxime facilis consectetur consequatur ullam tempora inventore, temporibus aut nam placeat quo fugit odit? Repudiandae libero laudantium ipsum pariatur explicabo nemo accusamus nesciunt eveniet repellat esse dolorem tenetur voluptatibus ducimus, repellendus delectus error, assumenda quasi praesentium.';

        echo substr($texte, 0, 20) . "...<a href='#'>Lire la suite</a>";

        /*
            substr() : fonction prédéfinie permettant de scinder la chaine de caractères, de retourner une partie de la chaine de caractères
            arguments: 
            1. La chaine que l'on souhaite couper 
            2. La position de départ
            3. Le nombre de caractères souhaités
        */

        echo "<h2>Fonctions utilisateur</h2>";

        // EN PHP, il est possible de déclarer nos propres fonctions utilisateurs, si nous avons redondant que nous copions/collons dans notre script, il serait préférable de l'encapsuler dans une fonction utilisateur

        // Une fonction se déclare toujours avec le mot clé 'function' suivi du nom de la fonction que nous définissons
        // toujours des parenthèses puisqu'une fonction peut potentiellement recevoir des arguments

        function separation()
        {
            // le code à executer à l'appel de la fonction
            echo '<hr><hr><hr>';
        }

        separation(); // execution de la fonction

        // fonction avec arguments
        //                  'Fred'
        function direBonjour($qui)
        {
            //            'Fred'
            echo "Bonjour $qui ! Comment vas-tu ?<br>";
        }
        
        direBonjour('Fred'); // execution de la fonction
        // direBonjour();

        //                  1, 'tee-shirt', 'http://', 25, 5
        // function ajoutPanier($id, $titre, $photo, $prix, $qte)
        // {
        //    // traitement ajout 
        // }

        // ajoutPanier(1, 'tee-shirt', 'http://', 25, 5);

        //                    2000
        function appliqueTva($nombre)
        {
            //       2000
            return $nombre*1.2; // 1.2 coefficient d'un taux de 20% de TVA 
            echo 'Allo'; // cette ligne ne sort pas parce qu'il y a un return dans la fonction 
            // return retourne le résultat de la fonction, le triatement de la fonction et une fois le return executé, on quitte la fonction
            // return ne génère pas d'affichage mais retourne ce que résulte de la fonction 
        }

        echo appliqueTva(2000) . '<br>';

        // function test($a)
        // {
        //     if($a == 10)
        //         $a = $a + 50;
        //     elseif($a != 10)
        //         $a = $a - 100; 
        //     else 
        //         $a = 200;

        //     return $a;
        // }

        // test(6000);

        // Exo : pourriez-vous améliorer cette fonction afin que l'on puisse calculé un nombre avec les taux de notre choix (19.6%, 5.5%, 7% etc...)

        //                    4000   , 20
        function appliqueTva2($nombre, $taux)
        {
            //      4000  *     20     
            return $nombre*(1+$taux/100); // 1+20/100 = 1.2
            // (1+$taux/100) : permet de calucler le coefficient d'un taux de TVA
        }

        echo appliqueTva2(4000, 20) . '<br>';
        echo appliqueTva2(4000, 19.6) . '<br>';

        // ########################################################
        meteo('hiver', 6); // il est possible d'executer une fonction avant qu'elle ne soit déclarée dans le code

        //              'hiver', 6
        function meteo($saison, $temperature)
        {
            //                    hiver                  6
            echo "Nous sommes en $saison et il fait $temperature degré(s)<hr>";
        }

        // Exo : faites en sorte de gérer le 's' de dégré en fonction de la temperature (singulier / pluriel). Pensez aux articles ("en hiver", "au printemps")

        //                  'hiver', 0
        function exoMeteo($saison, $temperature)
        {
            // Gestion temperature 
            //     -2                   -2
            if($temperature < -1 || $temperature > 1)
                $degre = 'degrés';
            else // 0, 1 et -1
                $degre = 'degré';

            // Gestion saison
            if($saison == 'printemps')
                $art = 'au';
            else // été, automne, hiver
                $art = 'en';

            echo "Nous sommes $art $saison et il fait $temperature $degre<hr>";
        }

        // Execution de la fonction
        exoMeteo('hiver', 0);
        exoMeteo('automne', 1);
        exoMeteo('été', -1);
        exoMeteo('printemps', 5);
        exoMeteo('hiver', -5);

        echo "<h2>Portée des variables (espace LOCAL / GLOBAL)</h2>";

        // espace LOCAL vers GLOBAL
        function jourSemaine()
        {
            // ESPACE LOCAL (à l'intérieur d'une fonction)
            $jour = 'Vendredi'; // variable LOCALE
            return $jour; 

            // Une variable déclarée dans une fonction n'est accessible que dans la fonction, impossible de l'exporter vers l'espace GLOBAL (à l'extérieur de la fonction)
        }

        // ESPACE GLOBALE (à l'extérieur de la fonction, espace par défaut de PHP)
        // echo $jour; /!\ erreur ! Notice: Undefined variable: jour 
        $recup = jourSemaine(); // vendredi
        echo $recup . '<br>';

        // espace GLOBAL vers LOCAL

        $repas = "steak"; // variable GLOBAL (à l'extérieur d'une fonction)

        function manger()
        {
            // espace LOCAL
            global $repas; // 'global' est un mot clé permettant d'importer une variable déclarée dans l'espace GLOBAL (à l'extérieur de la fonction) vers l'espace LOCAL (à l'intérieur de la fonction)
            echo $repas;
        }
        manger(); // execution de la fonction

        echo "<h2>Structure itérative : Les boucles</h2>";

        echo "<h4>Boucle WHILE</h4>";

        $i = 0; // 4 | initialisation, point de départ

        //    4
        while($i <= 3)
        {
            // Instrcution pour chaque tour de boucle
            //    3---
            echo "$i---";
            $i++; // incrémentation, équivaut à $i = $i + 1
        }

        echo '<hr>';

        // 0---1---2---3---

        // Exo : faites en sorte de ne pas avoir les tirets à la fin : 0---1---2---3

        $j = 0;
        while($j <= 3)
        {
            // On entre une seule fois dans le IF, lorsque $j vaut 3
            if($j == 3)
                echo $j;
            else // on entre lorsque $j vaut 0, 1 et 2
                echo "$j---";

            $j++; 
        }

        echo "<h4>Boucle FOR</h4>";

        // initialisation / condition d'entrée / incrémentation
        for($k = 0; $k <= 10; $k++)
        {
            // Intrcution pour cahque tour de boucle
            echo "$k<br>";
        }

        echo '<hr><select>';
            echo '<option>1</option>';
            echo '<option>2</option>';
            echo '<option>3</option>';
        echo '</select><hr>';

        // Exo : créer un selecteur de 30 options à l'aide d'une boucle FOR php (mélange html & php)

        echo '<select>';
        for($d = 0; $d <= 30; $d++)
        {
            echo "<option>$d</option>";
        }
        echo '</select><hr>';

        echo '<table class="table table-bordered text-center border border-dark">'; // déclaration du tableau
            echo '<tr>'; // une ligne du tableau
                echo '<td>1</td>'; // une cellule du tableau
                echo '<td>2</td>';
                echo '<td>3</td>';
            echo '</tr>';
        echo '</table><hr>';

        // Exo : faites une boucle de 0 à 9 sur la même ligne (soit 10 tours) dans un tableau HTML (mélange html & php)

        /*
            -----------------------------------------
            | 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 |
            -----------------------------------------
        */

        echo '<table class="table table-bordered text-center border border-dark"><tr>';
        for($s = 0; $s < 10; $s++)
        {
            // Pour chaque tour de boucle, la boucle crée une cellule du tableau avec la valeur de $s dans chaque cellule
            echo "<td>$s</td>";
        }
        echo '</tr></table><hr>';

        /*
            Exo : faire le même chose en allant de 0 à 99 sur plusieurs lignes sans faire 10 boucles (boucle imbriquée)

            for() crée une ligne <tr> pour chaque tour de boucle
            {
                for() crée 10 cellule <td> par ligne dans le tableau
                {

                }
            }

            ---------------------------------------------------
            | 0  | 1  | 2  | 3  | 4  | 5  | 6  | 7  | 8  | 9  |
            ---------------------------------------------------
            | 10 | 11 | 12 | 13 | 14 | 15 | 16 | 17 | 18 | 19 |
            ---------------------------------------------------
            | 20 | 21 | 22 | 23 | 24 | 25 | 26 | 17 | 28 | 29 |
            ---------------------------------------------------
            | 30 | 31 | 32 | 33 | 34 | 35 | 36 | 37 | 38 | 39 |
            ---------------------------------------------------
            | 90 | 91 | 92 | 93 | 94 | 95 | 96 | 97 | 98 | 99 |
            ---------------------------------------------------
        */
        
        $compteur = 0; // 11
        echo '<table class="table table-bordered text-center border border-dark">';
        //           1      1
        for($ligne = 0; $ligne < 10; $ligne++)
        {
            echo '<tr>';
            //             1      1
            for($cellule = 0; $cellule < 10; $cellule++)
            {
                //            11
                echo "<td>$compteur</td>";
                $compteur++;
            }
            echo '</tr>';
        }
        echo '</table><hr>';

        /*
            | 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 |
            | 10| 11|
        */

        ?>

        <hr>
        <table class="table table-bordered text-center border border-dark"><tr>
        <?php for($i = 0; $i < 10; $i++): ?>

            <td><?= $i ?></td>

        <?php endfor; ?>
        </tr></table>

        <!-- 
            Autre possibilité d'écriture 
            for(): / endfor; 
            while(): / endwhile; 
            if(): / elseif(): / endif;
            
            les ':' remplace l'accoldae ouvrante 
            'endfor' remplace l'accolade fermante 

            On privilégie l'affichage du code HTML
            < ?= -> raccourci pour executer un 'echo'
        -->

        <?php 
        echo "<h2>Tableau de données ARRAY</h2>";

        // Un tableau ARRAY permet de conserver un ensemble de valeur, il se déclare un peu à la manière d'une variable améliorée. En règle général, lorsque nous selectionnson des données dans la BDD en php, nous les receptionnons sous forme de tableau de données ARRAY

        // Les crochets [] permettent de déclarer un tableau ARRAY, on liste les données dans les crochets, séparées par une virgule 
        $perso = ['Mario', 'Luigi', 'Toad', 'Bowser', 'Yoshi'];

        // echo $perso; // /!\ erreur !! il n'est pas possible d'afficher sur la page web un tableau en passant par un 'echo' --> Notice: Array to string conversion

        // var_dump() et print_r() sont des outils de debugg utilisé en phase de développement permettant de consulter le contenu d'un tableau Array, d'un objet $variable, du résultat d'une fonction, les valeurs d'un formulaire, la connexion à la bdd etc...
        echo '<h4>var_dump()</h4>';

        // var_dump() affiche plus d'informations (nombre d'éléments dans le tableau, type, taille des chaines)
        // <pre> : (présentation) permet ici de formater la sortie du print_r() ou var_dump()
        echo '<pre>'; 
        var_dump($perso); 
        echo '</pre>';

        echo '<h4>print_r()</h4>';

        echo '<pre>'; 
        print_r($perso); 
        echo '</pre>';

        /*
            Tableau de données ARRAY associatif, il y a toujours un indice associé à une valeur dans le tableau
            Array
            (
              indice   valeur
                [0] => Mario
                [1] => Luigi
                [2] => Toad
                [3] => Bowser
                [4] => Yoshi
            )

            Exo : tenter d'afficher 'Toad' sur la page web en passnt par le tableau ARRAY $perso sans faire un "echo Toad"
        */

        // On utilise les crochets pour piocher dans le tableau ARRAY à l'indice correspondant pour sortir la valeur
        echo $perso[2] . '<hr>';

        echo '<h4>Boucle FOREACH pour les tableaux de données ARRAY</h4>';

        // La boucle FOREACH est un moyen simple de passer en revue un tableau de données ARRAY
        // arguments : 
        // 1. La tableau de donnée à parcourir 
        // 2. le mot clé 'as' qui fait partie du langage et est obligatoire
        // 3. Une variable de reception que nous définissons dans les parenthèses du FOREACH et qui recptionne une valeur du tableau par tour de boucle
        // Une fois l'ensemble des valeurs parcouru, la boucle s'arrete automatiquement

        //      ARRAY     Yoshi 
        foreach($perso as $valeur)
        {
            // Instruction pour chaque tour de boucle
            echo "$valeur<br>"; // on affiche successivement les valeurs du tableau
        }

        echo '<hr>';

        // Lorsqu'il y a 2 variables, l'une parcours la colonne des indices ($indice) et la deuxième parcours la colonne des valeurs ($valeur)
        //      ARRAY        [4] => Yoshi
        foreach($perso as $indice => $valeur)
        {
            echo "$indice : $valeur<br>"; // on affiche successivment les indices et les valeurs du tableau
        }

        echo '<hr>';
        
        /*
             Array
            (
              $indice  $valeur
              indice   valeur
                [0] => Mario
                [1] => Luigi
                [2] => Toad
                [3] => Bowser
                [4] => Yoshi
            )
        */

        // Il est possible de définir les indices du tableau ARRAY
        $arrayCouleur = [
            // indice => valeur,
            'j' => 'jaune',
            'r' => 'rouge',
            'v' => 'orange',
            'b' => 'bleu' 
        ];

        echo '<pre>';
        print_r($arrayCouleur);
        echo '</pre>';

        // count et sizeof : fonctions prédéfinies qui retournent le nombre d'éléments déclarés dans un ARRAY. Pas de différence entre les 2
        echo "Nombre d'éléments dans le tableau ARRAY : " . count($arrayCouleur) . "<hr>";
        echo "Nombre d'éléments dans le tableau ARRAY : " . sizeof($arrayCouleur) . "<hr>";

        echo '<h4>Tableau ARRAY multidimensionnel</h4>';

        // On parle de tableau multidimensionnel losqu'un tableau est contenu dans un autre tableau
        $tab_multi = [
            0 => [
                'prenom' => 'Grégory',
                'nom' => 'LACROIX'
            ],
            1 => [
                'prenom' => 'François',
                'nom' => 'DUPONT'
            ]
        ];

        echo '<pre>';
        print_r($tab_multi);
        echo '</pre>';

        /*
        Array
        (
          indice   valeur  
            [0] => Array
                (
                    indice      valeur
                    [prenom] => Grégory
                    [nom] => LACROIX
                )

            [1] => Array
                (
                    [prenom] => François
                    [nom] => DUPONT
                )

        )

        Exo : tenter d'afficher 'François' sur la page web en passant par le tableau ARRAY multi $tab_multi
        */

        echo $tab_multi[1]['prenom'] . '<hr>'; // nous rentrons d'abord à l'indice [1] pour allez ensuite dans l'autre tableau à l'indice 'prenom'

        // Exo : afficher l'ensemble des données du tableau ARRAY multi sur la page web à l'aide de boucle FOREACH (boucle imbriquée)

        /*
            foreach()
            {
                foreach()
                {

                }
            }
        */

        // $tab receptionne un ARRAY entier par tour de boucle, donc il n'est pas possible d'executer un "echo $tab"
        // On transmet le tableau ARRAY $tab à la 2ème boucle afin de le parcourir

        //                      1       ARRAY
        foreach($tab_multi as $indice => $tab)
        {
            // echo $tab; /!\ erreur ! Array to string conversion
            //     ARRAY   nom    DUPONT 
            foreach($tab as $key => $value)
            {
                echo "$key : $value<br>";
            }
        }

        echo "<h2>Les superglobales</h2>";

        /*
            Les superglobales sont des variables de type ARRAY, accessible de partout (espace LOCAL et GLOBAL) qui permettent de véhiculer un certain type de données
            Elle s'appellent toujous avec le '_' suivi du nom de la superglobale en MAJUSCULE

            $_SERVER : permet de véhiculer des données lié au serveur
            $_GET : permet de véhiculer les données transmise dans l'URL
            $_POST : permet de véhiculer les données saisies dans un formulaire
            $_FILES : permet de véhiculer les données d'un fichier uploadé
            $_COOKIE : permet de véhiculer les données lié à un fichier cookie
            $_SESSION : permet de véhiculer les informations d'une session en cours
            $_REQUEST : Un tableau associatif qui contient par défaut le contenu des variables $_GET, $_POST et $_COOKIE.
        */

        echo '<pre>'; print_r($_SERVER); echo '</pre>';

        echo "<h2>Classe et objet</h2>";

        // Une classe permet de regrouper des infromations, des données, on peut y déclarer des variables (appelé propriétés ou attributs) mais aussi des fonctions (appelées méthodes), c'est comme un plan de construction
        class Etudiant 
        {
            public $prenom = "Grégory";
            public $age = 25;

            public function pays()
            {
                return "France";
            }

            public function login($email, $password)
            {
                // algo de 200 lignes pour s'authentifié
            }
        }

        // echo $age; /!\ variable non définit ! ce n'est pas la même variable que celle déclarée dans la classe

        // new est un mot clé permettant d'instancier la classe et d'en faire un objet. C'est ce qui nous permet de déployer la classe afin que l'on puisse s'en servir. On se sert de ce qui est déclaré dans la classe à travers l'objet 
        $objet = new Etudiant;
        echo '<pre>'; var_dump($objet); echo '</pre>';

        // $objet->login($_POST['email'], $_POST['password']);

        // get_class_methods() : fonction prédéfinie permettant d'afficher toute les méthodes (fonction) issue d'une classe
        echo '<pre>'; print_r(get_class_methods($objet)); echo '</pre>';

        // nous piochons dans un Array avec les [], nous devons piocher dans un objet avec la flèche '->'
        echo "Prénom : $objet->prenom  <hr>"; 
        echo "Age : " . $objet->age . '<hr>'; 
        echo "Pays : " . $objet->pays() . '<hr>'; 

        // $bdd = new PDO();


        // fermeture de la balise PHP
        ?>

    </div>
</body>

</html>