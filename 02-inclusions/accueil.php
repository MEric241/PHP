<?php
require_once('inc/header.inc.php');

/*
    include() et require() sont des fonctions prédéfinies permettant d'inclure des fichiers dans d'autres fichiers
    Différence entre include et require : 
    Il n'y a pas de différence entre les deux... sauf en cas d'erreur sur le nom du fichier : 
        - include génère une erreur et continue l'execution du script
        - require génère une erreur et stop l'execution du script 

    le _once vérifie si le fichier à déjà été inclus, si on tente de l'inclure de nouveau, il ne le ré-inclus pas

    Dans le nommage des fichiers, le '.inc' est un indicatif précisant aux développeurs que le fichier est déstiné à être inclus dans un page.
*/

include_once('inc/nav.inc.php');
?>
        
    <main>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
        Voici le contenu de la page d'accueil<br>
    </main>

<?php 
include('inc/footer.inc.php');
        