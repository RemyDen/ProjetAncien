<?php
include 'includes/config.php';
include 'traitements/traitementConnexion.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="icon/font/css/open-iconic-bootstrap.css" rel="stylesheet">
    <script language="JavaScript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Anciens</title>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="index.php">LeSite</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <?php if(!isset($_SESSION['prenom'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">Inscription</a>
                </li>
            <?php }else {
                //if(isset($_SESSION['typeUtilisateur']) AND $_SESSION['typeUtilisateur'] == "3") {?>
                    <li class="nav-item">
                        <a class="nav-link" href="export.php" aria-haspopup="true" aria-expanded="false">Export d'Anciens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="import.php" aria-haspopup="true" aria-expanded="false">Import d'Etudiants</a>
                    </li>
                <?php// }?>
                <li class="nav-item">
                    <a class="nav-link" href="listeAncien.php" id="listeAncien" aria-haspopup="true" aria-expanded="false">Liste des anciens</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['prenom']; ?></a>
                    <div class="dropdown-menu dropdown-menu-right" id="profile" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="profil.php">Mon profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?deconnexion">Déconnexion</a>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>

<!-- Modal de connexion-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Facebook -->
                <div class="fb-login-button" data-max-rows="1" data-size="medium" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="true" data-use-continue-as="true"></div>
                <!-- Google -->
                <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

                <div class="dropdown-divider"></div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Email :</label>
                        <input type="text" class="form-control" name="mail">
                    </div>

                    <div class="form-group">
                        <label for="">Mot de passe :</label>
                        <input type="password" class="form-control" name="mdp">
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary" name="envoyerConnexion">Envoyer</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>