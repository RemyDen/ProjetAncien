<?php
include 'includes/includes.php';
include 'traitements/traitementModificationProfil.php';

//On récupère les infos de la personne
$req = "SELECT * FROM utilisateur WHERE mail = '" . $_SESSION['mail'] . "'";
$exe = $bdd->query($req);
$res = $exe->fetch(PDO::FETCH_ASSOC);
?>

<div class="container mt-5 mb-4">
    <div class="text-center"><a class="btn btn-primary text-center d-none" href="newAncien.php">J'ai obtenu mon diplôme</a></div>
    <form method="POST" action="">
        <div class="form-group">
            <label for="">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom" aria-describedby="helpId" value="<?php echo $res['nom']; ?>" required>
        </div>

        <div class="form-group">
            <label for="">Prénom :</label>
            <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="helpId" value="<?php echo $res['prenom']; ?>" required>
        </div>

        <div class="form-group">
            <label for="">Date de naissance :</label>
            <input
                type="date"
                class="form-control" name="dateNaissance" id="dateNaissance" aria-describedby="helpId" value="<?php echo $res['dateNaissance']; ?>" required>
        </div>

        <div class="form-group">
            <label for="">Adresse postale :</label>
            <input type="text" class="form-control" name="adresse" id="adresse" aria-describedby="helpId" value="<?php echo $res['adresse']; ?>" required>
        </div>

        <div class="form-group">
            <label for="">Code postal : </label>
            <input type="text" class="form-control" name="codePostal" id="codePostal" aria-describedby="helpId" value="<?php echo $res['codePostal']; ?>" pattern="[0-9]*" required>
        </div>

        <div class="form-group">
            <label for="">Ville :</label>
            <input type="text" class="form-control" name="ville" id="ville" aria-describedby="helpId" value="<?php echo $res['ville']; ?>" required>
        </div>

        <div class="form-group">
            <label for="">Email :</label>
            <input type="email" class="form-control" name="mail" id="mail" aria-describedby="emailHelpId" value="<?php echo $res['mail']; ?>" required>
        </div>

        <!--On affiche ou non les champs selon le type de l'utilisateur-->
        <?php if($res['typeUtilisateur'] == 1) { ?> <!--Etudiant-->
            <!--On affiche le bouton "J'ai obtenu mon diplôme"-->
            <script>
                $('.d-none').removeClass('d-none')
            </script>

            <div class="form-group opt" id="niveauEtude">
                <label for="">Niveau d'étude</label>
                <select class="form-control" name="niveauEtude">
                    <option value="">Choisissez une option</option>
                    <option value="L1">L1</option>
                    <option value="L2">L2</option>
                    <option value="L3">L3</option>
                    <option value="M1">M1</option>
                    <option value="M2">M2</option>
                </select>
            </div>
        <?php } else if($res['typeUtilisateur'] == 2) { ?>
            <div class="form-group opt" id="anneeDiplome">
                <label for="">Année d'obtention du diplôme : </label>
                <input type="number" class="form-control" name="anneeDiplome" id="anneeDiplome" aria-describedby="helpId" value="<?php echo $res['anneeDiplome']; ?>" pattern="[0-9]{4}">
            </div>

            <div class="form-group opt" id="entreprise">
                <label for="">Entreprise (laissez blanc si chômeur) :</label>
                <input type="text" class="form-control" name="entreprise" id="entreprise" aria-describedby="helpId" value="<?php echo $res['entreprise']; ?>">
            </div>

            <div class="form-group opt" id="poste">
                <label for="">Poste occupé : </label>
                <input type="text" class="form-control" name="poste" id="poste" aria-describedby="helpId" value="<?php echo $res['poste']; ?>">
            </div>

            <div class="form-group opt" id="anneePoste">
                <label for="">Année d'entrée à ce poste : </label>
                <input type="number" class="form-control" name="anneePoste" id="anneePoste" aria-describedby="helpId" value="<?php echo $res['anneePoste']; ?>" pattern="[0-9]{4}">
            </div>
        <?php } ?>

        <div class="text-center"><button type="submit" name="envoyer" class="btn btn-primary text-center">Modifier mon profil</button></div>
    </form>
</div>

<?php include 'includes/bas.php'; ?>
