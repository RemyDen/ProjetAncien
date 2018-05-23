<?php
include 'includes/includes.php';
include 'traitements/import.php';
?>

<div class="container mt-5">
    <form action="" method="post" name="upload_excel" enctype="multipart/form-data">
        <fieldset>

            <!-- Form Name -->
            <h5 class="display-4">Import d'étudiants</h5>

            <!-- File Button -->
            <div class="form-group mt-4">
                <label for="">Choisissez votre fichier</label>
                <input type="file" class="form-control-file" name="file" id="" placeholder=""
                       aria-describedby="fileHelpId">
                <small id="fileHelpId" class="form-text text-muted">Le fichier doit être sous forme de CSV</small>
            </div>

            <!-- Button -->
            <button type="submit" name="import" class="btn btn-primary button-loading" data-loading-text="Chargement...">Importer</button>

        </fieldset>

</div>

</div>

<?php
include 'includes/bas.php'
?>
