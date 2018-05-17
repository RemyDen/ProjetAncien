<?php
/**
 * Created by PhpStorm.
 * User: Rémy
 * Date: 17/05/2018
 * Time: 09:30
 */
include 'includes/includes.php';
include 'includes/bas.php';

$req = "SELECT * FROM utilisateur WHERE typeUtilisateur = 2";
$exe = $bdd->query($req);
$res = $exe->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <div class="card-columns">


<?php

foreach ($res as $ancien){ ?>
<!--
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action"><?php echo $ancien['nom'].' '.$ancien['prenom']; ?></a>
    </div>
-->

    <div class="card">
        <div class="card-header"><?php echo $ancien['nom'].' '.$ancien['prenom']; ?></div>
        <div class="card-body">
            <h5 class="card-title"><?php if($ancien['entreprise']) echo $ancien['entreprise'].' ('.$ancien['poste'].')';
            else echo 'Chômeur'; ?></h5>
            <p class="card-text">Email : <?php echo $ancien['mail']; ?>
            <br>Ville : <?php echo $ancien['ville']; ?></p>
            <div class="input-group">
                <a class="btn btn-primary" href="">Contacter</a>
                <div class="custom-control custom-checkbox ml-auto">
                    <input type="checkbox" class="custom-control-input" id="<?php echo $ancien['id']; ?>">
                    <label class="custom-control-label" for="<?php echo $ancien['id']; ?>"></label>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

        <div class="alert alert-success fixed-bottom d-none" role="alert">
            Contacter les utilisateurs séléctionnés
        </div>

    <script>
        /*
        $('[type=checkbox]').each(function (index, element) {
            element.on('click',function () {
                $('[type=checkbox]').each(function (index, element) {
                    if(element.prop('checked'))
                        $('.alert.alert-success').removeClass('d-none');
                    else
                        $('.alert.alert-success').addClass('d-none');
                })
            })
        })
        */
        $('[type=checkbox').on('click',function (){
            if($('[type=checkbox]:checked').length > 0)
                $('.alert.alert-success').removeClass('d-none');
            else
                $('.alert.alert-success').addClass('d-none');
        })

    </script>

    </div>
</div>

<?php
include 'includes/bas.php';
