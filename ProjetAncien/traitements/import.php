<?php
/**
 * Created by PhpStorm.
 * User: Rémy
 * Date: 23/05/2018
 * Time: 14:10
 */

function gen_mdp($p_nbChar){
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $p_nbChar);
}

if(isset($_POST['import'])) {

    $filename=$_FILES["file"]["tmp_name"];

    if($_FILES["file"]['size'] > 0) {
        if (($file = fopen($filename, "r")) !== FALSE) {
            while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
                var_dump($data);
                $nom = $data[0];
                $prenom = $data[1];
                $dateNaissance = $data[2];
                $mail = $data[3];
                $adresse = $data[4];
                $cp = $data[5];
                $ville = $data[6];
                $niv = $data[7];


                //génération du mot de passe et envoi du mail à l'étudiant
                //$mdp = gen_mdp(8);
                //echo($mdp);
                $mdp = "test";

                $obj = "Mot de passe SiteAncien";
                $corps = "Bonjour ".$prenom." ".$nom.", voici ton mot de passe pour le site des Anciens: ".$mdp.".<br>
                Pense à le changer le plus rapidement possible pour des raisons de sécurité!";
                $header = 'From: L3Miage';

                //if(mail($mail, $obj, $corps, $header)) echo "Mail envoyé !";
                //else print_r(error_get_last());

                $mdp = password_hash($mdp, PASSWORD_DEFAULT);

                $req = "INSERT INTO utilisateur(nom, prenom, dateNaissance, adresse, codePostal, ville, mail, mdp,
                         typeUtilisateur, niveauEtude)
                          VALUES('$nom', '$prenom', '$dateNaissance', '$adresse', '$cp', '$ville', '$mail','$mdp',
                           1, '$niv')";
                $exe = $bdd->query($req);
                if($exe) {
                    echo "Import réussi!";
                }
                else echo "Erreur";

            }
            fclose($file);
        }
    }
    header('Location: index.php');

}