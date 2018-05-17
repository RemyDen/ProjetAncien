<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
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
            <?php if(!isset($_SESSION['typeUtilisateur'])) {?>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">Inscription</a>
                </li>
            <?php }else {?>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="traitements/traitementConnexion.php">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                    <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>