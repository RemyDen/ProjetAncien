<?php
include 'includes/includes.php';
include 'includes/bas.php';

unset($_SESSION['typeUtilisateur']);

$_SESSION['mail'] = 'zszu@gmail.com';
$_SESSION['prenom'] = 'Paul';
$_SESSION['nom'] = 'Naszalyi';

var_dump($_SESSION);
?>

<fb:login-button
    scope="public_profile,email"
    onlogin="init();">
</fb:login-button>
