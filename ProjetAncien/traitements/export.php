<?php
/**
 * Created by PhpStorm.
 * User: Rémy
 * Date: 23/05/2018
 * Time: 15:52
 */
include '../includes/config.php';

if(isset($_POST['export'])) {
    $req = "SELECT nom, prenom, dateNaissance, mail, adresse, codePostal, ville, 
 anneeDiplome, entreprise, poste, anneePoste FROM utilisateur WHERE typeUtilisateur = 2";
    $exe = $bdd->query($req);
    $res = $exe->fetchAll(PDO::FETCH_ASSOC);
}

// output headers so that the file is downloaded rather than displayed
header('Content-type: text/csv');
header('Content-Disposition: attachment; filename="liste_ancien.csv"');

// do not cache the file
header('Pragma: no-cache');
header('Expires: 0');

// create a file pointer connected to the output stream
$file = fopen('php://output', 'w');
fputs($file, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

// send the column headers
fputcsv($file, array('Nom', 'Prénom', 'Date de naissance', 'Email', 'Adresse', 'Code Postale', 'Ville',
    'Année d\'obtention du diplôme', 'Entreprise', 'Poste', 'Année d\'entrée à ce poste'),';');

// Sample data. This can be fetched from mysql too

// output each row of the data
foreach ($res as $row)
{
    fputcsv($file, $row, ";");
}

exit();
