<?php
if(isset($_POST['envoyer'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaissance = $_POST['dateNaissance'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['codePostal'];
    $ville = $_POST['ville'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];
    $typeUtilisateur = $_POST['type'];
    $niveauEtude = $_POST['niveauEtude'];
    $anneeDiplome = $_POST['anneeDiplome'];
    $entreprise = $_POST['entreprise'];
    $poste = $_POST['poste'];
    $anneePoste = $_POST['anneePoste'];

    $anneeDiplome = !empty($anneeDiplome) ? "'$anneeDiplome'" : "NULL";
    $anneePoste = !empty($anneePoste) ? "'$anneePoste'" : "NULL";

    if($mdp == $mdp2) { //On vérifie que les mots de passe correspondent
        $mdp = password_hash($mdp, PASSWORD_DEFAULT);

        //On regarde maintenant si le mail saisi n'existe pas déjà
        $req = "SELECT * FROM utilisateur WHERE mail = '".$mail."'";
        $exe = $bdd->query($req);
        $res = $exe->fetchAll(PDO::FETCH_ASSOC);
        if(empty($res)) {
            $req = "INSERT INTO utilisateur (nom, prenom, dateNaissance, adresse, codePostal, ville, mail, mdp, typeUtilisateur, niveauEtude, anneeDiplome, entreprise, poste, anneePoste) 
                    VALUES ('$nom', '$prenom', '$dateNaissance', '$adresse', $codePostal, '$ville', '$mail', '$mdp', $typeUtilisateur, '$niveauEtude', $anneeDiplome, '$entreprise', '$poste', $anneePoste)";
            $exe = $bdd->query($req);
            if ($exe) {
                echo "<script>alert('Inscription validée')</script>";
                $_SESSION['prenom'] = $prenom;
                $_SESSION['nom'] = $nom;
                $_SESSION['typeUtilisateur'] = $typeUtilisateur;
                $_SESSION['mail'] = $res['mail'];
                header('Location: index.php');
            } else {
                echo $bdd->errorInfo();
            }
        } else {
            echo "<script>alert('L adresse mail utilisée existe déjà')</script>";
        }
    } else {
        echo "<script>alert('Les mots de passe ne correspondent pas')</script>";
    }
}
?>