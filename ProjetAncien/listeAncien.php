<?php
/**
 * Created by PhpStorm.
 * User: Rémy
 * Date: 17/05/2018
 * Time: 09:30
 */
include 'includes/includes.php';
include 'includes/bas.php';
include 'traitements/envoiMail.php';
include 'traitements/chercher.php';

if(!isset($_SESSION['mail'])) header('Location:index.php');

if(!isset($_GET['recherche']) OR strlen($_GET['recherche']) <= 2) {
    $req = "SELECT * FROM utilisateur WHERE typeUtilisateur = 2";
    $exe = $bdd->query($req);
    $res = $exe->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container mt-5">

    <!-- barre de recherche -->
    <form method="get" action="">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Chercher un ancien" aria-label="Chercher un ancien" aria-describedby="basic-addon2" name="recherche">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button"><span class="oi oi-magnifying-glass"></span></button>
            </div>
        </div>
    </form>


    <div class="card-columns">
<?php

foreach ($res as $ancien){ ?>
<!--
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action"><?php echo $ancien['nom'].' '.$ancien['prenom']; ?></a>
    </div>
-->

    <div class="card">
        <div class="card-header"><?php echo $ancien['prenom'].' '.$ancien['nom']; ?></div>
        <div class="card-body">
            <h5 class="card-title"><?php if($ancien['entreprise']) echo $ancien['entreprise'].' ('.$ancien['poste'].')';
            else echo 'Chômeur'; ?></h5>
            <p class="card-text">Email : <span class="mail"><?php echo $ancien['mail']; ?></span>
            <br>Ville : <?php echo $ancien['ville']; ?></p>
            <div class="input-group">
                <a class="btn btn-primary contact" data-email="<?php echo $ancien['mail']; ?>" data-toggle="modal" data-target="#mailModal" href="">Contacter</a>
                <div class="custom-control custom-checkbox ml-auto">
                    <input type="checkbox" class="custom-control-input" data-email="<?php echo $ancien['mail']; ?>" id="<?php echo $ancien['id']; ?>">
                    <label class="custom-control-label" for="<?php echo $ancien['id']; ?>"></label>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

        <div class="alert alert-primary fixed-bottom d-none" role="alert" style="margin-bottom: 0">
            Contacter les utilisateurs séléctionnés <button class="btn btn-primary" id="mails"
                    data-toggle="modal" data-target="#mailModal"><span class="oi oi-envelope-closed"></span></button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true">
            <form method="post" action="">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelTitleId">Email</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="">Destinataire : </label>
                                    <input type="text"
                                           class="form-control" name="dest" id="dest"
                                           placeholder="" disabled>

                                </div>

                                <div class="form-group">
                                    <label for="">Objet : </label>
                                    <input type="text" class="form-control" name="obj" id="obj"
                                           placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="">Corps : </label>
                                    <textarea class="form-control" name="corps" id="corps" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" name="mails">Envoyer</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <script>
            //Affiche l'alerte pour envoyer les mails à plusieurs utilisateurs
        $('[type=checkbox').on('click',function (){
            if($('[type=checkbox]:checked').length > 0)
                $('.alert.alert-primary').removeClass('d-none');
            else
                $('.alert.alert-primary').addClass('d-none');
        })

        $('#mails').on('click',function () {
            var liste="";
            var length = $('[type=checkbox]:checked').length;
            $('[type=checkbox]:checked').each(function (index) {
                liste+=$(this).attr('data-email')
                if(index != length-1) liste += ';'

            })
            $('#dest').val(liste);
        })

        $('.contact').click( function () {
            $('#dest').val($(this).attr('data-email'));
        })

    </script>

    </div>
</div>

<?php
include 'includes/bas.php';
