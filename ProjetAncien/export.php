<?php
/**
 * Created by PhpStorm.
 * User: Rémy
 * Date: 23/05/2018
 * Time: 15:50
 */

include 'includes/includes.php';
?>
<div class="container mt-5">
    <form action="traitements/export.php" method="post" name="export" enctype="multipart/form-data">
        <fieldset>

            <!-- Form Name -->
            <h5 class="display-4">Export d'anciens</h5>

            <!-- File Button -->
            <!--<div class="form-group mt-4">
                <label for="">Choisissez votre fichier</label>
                <input type="file" class="form-control-file" name="file" id="" placeholder=""
                       aria-describedby="fileHelpId">
                <small id="fileHelpId" class="form-text text-muted">Le fichier doit être sous forme de CSV</small>
            </div>-->

            <!-- Button -->
            <button type="submit" name="export" class="btn btn-primary button-loading mt-3" data-loading-text="Chargement...">Exporter</button>

        </fieldset>

</div>

</div>

<?php
include 'includes/bas.php'
?>
