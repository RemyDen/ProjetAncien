<?php
if(isset($_GET['deconnexion'])) {
    unset($_SESSION['typeUtilisateur']);
    unset($_SESSION['prenom']);
    unset($_SESSION['nom']);
    header('Location: index.php');
}