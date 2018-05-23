<?php
if(isset($_POST['envoyerConnexion'])) {
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];

    $req = "SELECT * FROM utilisateur WHERE mail = '" . $mail . "'";
    $exe = $bdd->query($req);
    $res = $exe->fetch(PDO::FETCH_ASSOC);

    if(empty($res) OR $res['estCompte'] == 0) {
        echo "<script>alert('Identifiants incorrects')</script>";
    } else {
        if (password_verify($mdp, $res['mdp'])) { //On vérifie le mdp
            echo "<script>alert('Connecté !')</script>";
            $_SESSION['typeUtilisateur'] = $res['typeUtilisateur'];
            $_SESSION['prenom'] = $res['prenom'];
            $_SESSION['nom'] = $res['nom'];
            $_SESSION['mail'] = $res['mail'];
            header('Location: ./index.php');
        } else {
            echo "<script>alert('Identifiants incorrects')</script>";
        }
    }
}

if(isset($_POST['userId'])){
    $_SESSION['prenom']= $_POST['firstName'];
    $_SESSION['nom'] = $_POST['lastName'];
    $_SESSION['mail'] = $_POST['email'];
}
?>