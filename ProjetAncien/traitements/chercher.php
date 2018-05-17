<?php
/**
 * Created by PhpStorm.
 * User: Polo
 * Date: 17/05/2018
 * Time: 17:00
 */

if(isset($_GET['recherche'])) {
    $recherche = $_GET['recherche'];

    $req = "SELECT * FROM utilisateur WHERE nom LIKE '%".$recherche."%' OR prenom LIKE '%".$recherche."%' OR ville LIKE '%".$recherche."%' OR entreprise LIKE '%".$recherche."%' OR poste LIKE '%".$recherche."%'";
    $exe = $bdd->query($req);
    $res = $exe->fetchAll(PDO::FETCH_ASSOC);

    var_dump($res);
}