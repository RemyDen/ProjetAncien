<?php
if(isset($_POST['envoyer'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $dateNaissance = $_POST['dateNaissance'];
    $mail = $_SESSION['mail'];
    $adresse = $_POST['adresse'];
    $codePostal = $_POST['codePostal'];
    $ville = $_POST['ville'];

    $req = "UPDATE utilisateur SET nom = '".$nom."', prenom = '".$prenom."', dateNaissance = '".$dateNaissance."', adresse = '".$adresse."', codePostal = '".$codePostal."', ville = '".$ville."'";

    //On fait la différence selon le type de l'utilisateur
    if($_SESSION['typeUtilisateur'] == 1) {
        $niveauEtude = $_POST['niveauEtude'];
        if($niveauEtude == "Choisissez une option") {
?>
            <script>alert("Veuillez choisir un niveau d'étude")</script>
<?php
            exit(0);
        }
        $req .= ", niveauEtude = '".$niveauEtude."'";
    } else if($_SESSION['typeUtilisateur'] == 2) {
        $anneeDiplome = $_POST['anneeDiplome'];
        $entreprise = $_POST['entreprise'];
        $poste = $_POST['poste'];
        $anneePoste = $_POST['anneePoste'];

        $req .= ", anneeDiplome = '".$anneeDiplome."', entreprise = '".$entreprise."', poste = '".$poste."', anneePoste = '".$anneePoste."'";
    }
    $req .= " WHERE mail = '".$_SESSION['mail']."'"; //Bien laisser l'espace au début de la chaîne
    $exe = $bdd->query($req);
    if($exe) {
?>
        <script>alert("Informations mises à jour !")</script>
<?php
    } else {
        echo $bdd->errorInfo();
    }
}
?>