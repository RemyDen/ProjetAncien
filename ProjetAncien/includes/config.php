<?php
try {
    //On se connecte à la base en PDO
    $user = "root";
    $mdp = "";
    $bdd = new PDO('mysql:host=localhost;dbname=projet', $user, $mdp);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
}

session_start();
?>