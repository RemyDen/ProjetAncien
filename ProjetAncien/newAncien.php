<?php
include 'includes/includes.php';
include 'traitements/traitementModificationProfil.php';
?>
<div class="container mt-5">
    <p>Vous venez d'obtenir votre diplôme ? Prenez quelques secondes pour remplir vos nouvelles informations !</p><br/>

    <form method="POST" action="">
        <div class="form-group opt" id="anneeDiplome">
            <label for="">Année d'obtention du diplôme : </label>
            <input type="number" class="form-control" name="anneeDiplome" id="anneeDiplome" aria-describedby="helpId" placeholder="" pattern="[0-9]{4}">
            <small id="helpId" class="form-text text-muted">Ex : 2018</small>
        </div>

        <div class="form-group opt" id="entreprise">
            <label for="">Entreprise (laissez blanc si chômeur) :</label>
            <input type="text" class="form-control" name="entreprise" id="entreprise" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Ex : Microsoft</small>
        </div>

        <div class="form-group opt" id="poste">
            <label for="">Poste occupé : </label>
            <input type="text" class="form-control" name="poste" id="poste" aria-describedby="helpId" placeholder="">
            <small id="helpId" class="form-text text-muted">Ex : Ingénieur informatique</small>
        </div>

        <div class="form-group opt" id="anneePoste">
            <label for="">Année d'entrée à ce poste : </label>
            <input type="number" class="form-control" name="anneePoste" id="anneePoste" aria-describedby="helpId" placeholder="" pattern="[0-9]{4}">
            <small id="helpId" class="form-text text-muted">Ex : 2018</small>
        </div>

        <div class="text-center mb-4"><button class="btn btn-primary" name="maj">Mettre à jour mes infos</button>
    </form>
</div>

<?php
include 'includes/bas.php';
?>