<?php
include '../includes/config.php';
if(isset($_POST['envoyer'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $req = "SELECT * FROM utilisateur WHERE mail = '" . $mail . "'";
    $exe = $bdd->query($req);
    $res = $exe->fetch(PDO::FETCH_ASSOC);

    if(empty($res)) {
        echo "<script>alert('Identifiants incorrects')</script>";
    } else {
        if(password_verify($mdp, $res['mdp'])) { //On vérifie le mdp
            echo "<script>alert('Connecté !')</script>";
            $_SESSION['typeUtilisateur'] = $res['typeUtilisateur'];
            $_SESSION['prenom'] = $res['prenom'];
            $_SESSION['nom'] = $res['nom'];
            $_SESSION['mail'] = $res['mail'];
        } else {
            echo "<script>alert('Mot de passe incorrect')</script>";
        }
    }
    var_dump(password_verify($mdp, $res['mdp']));
    header('Location: ../index.php');
}
?>