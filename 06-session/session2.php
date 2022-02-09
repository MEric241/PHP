<?php 

// session_start() permet de créer un fichier de session mais permet aussi d'avoir accès à la session en cours de l'utilisateur
session_start();

// On observe ici les données enregisrté dans la session mais dans le fichier session1.php, accessible dans le fichier session2.php, d'où la puissance des sessions !!
echo '<pre>'; print_r($_SESSION); echo '</pre>';