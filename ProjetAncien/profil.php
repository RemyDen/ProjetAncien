<?php
include 'includes/includes.php';
include 'traitements/traitementModificationProfil.php';
include 'traitements/traitementInscription.php';

//On récupère les infos de la personne
$req = "SELECT * FROM utilisateur WHERE mail = '" . $_SESSION['mail'] . "'";
$exe = $bdd->query($req);
$res = $exe->fetch(PDO::FETCH_ASSOC);
if($res) {
    $_SESSION['typeUtilisateur'] = $res['typeUtilisateur'];
}
?>

<div class="container mt-5 mb-4 col-8">
    <div class="text-center"><a class="btn btn-primary text-center d-none" href="newAncien.php">J'ai obtenu mon diplôme</a></div>
    <form method="POST" action="">
        <div class="form-group">
            <label for="">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom" aria-describedby="helpId" value="<?php echo $_SESSION['nom']; ?>" required>
        </div>

        <div class="form-group">
            <label for="">Prénom :</label>
            <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="helpId" value="<?php echo $_SESSION['prenom']; ?>" required>
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

        <!-- Le code JS pour l'affichage des champs selon l'utilisateur -->
        <script>
            function affichage() {
                $("document").ready(function() {
                    //On réinitialise tous les champs optionnels lorsque l'utilisateur change son type
                    $(".type1").addClass('d-none')
                    $(".type2").addClass('d-none')

                    //On affiche ou non les champs selon le type sélectionné
                    var type = $("[name='type']").val();

                    if (type == 1) {
                        $(".type1").removeClass('d-none') //On cache les champs type2
                    } else if (type == 2) {
                        $(".type2").removeClass('d-none') //On cache les champs type1
                    }
                })
            }

            affichage() //On appelle la fonction au chargement de la page

            $('document').ready(function() {
                $("[name='type']").change(function () {
                    affichage()
                })
            })
        </script>


        <?php if(!$res) { //Si la variable res n'existe pas, alors le gars n'est pas inscris donc on lui demande de dire s'il est enseignant ou élève ?>
            <script>
                $('document').ready(function () {
                    $('#btnModif').attr('name', 'envoyerInscription')
                })
            </script>

            <div class="form-group">
                <label for="">Type d'utilisateur :</label>
                <select class="form-control" name="type" id="type" required>
                    <option value="0">Choisissez une option</option>
                    <option value="1">Etudiant</option>
                    <option value="2">Ancien</option>
                    <option value="3">Professeur</option>
                </select>
            </div>
        <?php } else { ?>
            <!-- On est obligé de créer le champ type caché quand l'utilisateur est déjà enregistré afin de
                 de pouvoir récupérer la typeUtilisateur en JS -->
                <input type="hidden" name="type" value="<?php echo $_SESSION['typeUtilisateur']; ?>">
        <?php } ?>

        <!--On affiche ou non les champs selon le type de l'utilisateur-->
        <!--Etudiant-->
            <div class="form-group type1 d-none" id="niveauEtude">
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
        <!-- Ancien -->
            <div class="form-group type2 d-none" id="anneeDiplome">
                <label for="">Année d'obtention du diplôme : </label>
                <input type="number" class="form-control" name="anneeDiplome" id="anneeDiplome" aria-describedby="helpId" value="<?php echo $res['anneeDiplome']; ?>" pattern="[0-9]{4}">
            </div>

            <div class="form-group type2 d-none" id="entreprise">
                <label for="">Entreprise (laissez blanc si chômeur) :</label>
                <input type="text" class="form-control" name="entreprise" id="entreprise" aria-describedby="helpId" value="<?php echo $res['entreprise']; ?>">
            </div>

            <div class="form-group type2 d-none" id="poste">
                <label for="">Poste occupé : </label>
                <input type="text" class="form-control" name="poste" id="poste" aria-describedby="helpId" value="<?php echo $res['poste']; ?>">
            </div>

            <div class="form-group type2 d-none" id="anneePoste">
                <label for="">Année d'entrée à ce poste : </label>
                <input type="number" class="form-control" name="anneePoste" id="anneePoste" aria-describedby="helpId" value="<?php echo $res['anneePoste']; ?>" pattern="[0-9]{4}">
            </div>

        <input type="hidden" name="mdp" value="Faux">
        <input type="hidden" name="mdp2" value="Faux">
        <input type="hidden" name="mail" value="<?php echo $_SESSION['mail']; ?>">

        <div class="text-center"><button type="submit" id="btnModif" name="envoyer" class="btn btn-primary text-center">Modifier mon profil</button></div>
    </form>
</div>

<?php include 'includes/bas.php'; ?>
