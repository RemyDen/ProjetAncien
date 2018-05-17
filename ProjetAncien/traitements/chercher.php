<?php
/**
 * Created by PhpStorm.
 * User: Polo
 * Date: 17/05/2018
 * Time: 17:00
 */

if(isset($_GET['recherche'])) {
    if(strlen($_GET['recherche']) <= 2) {
?>
        <script>alert("Votre recherche doit comporter au moins 3 caractères")</script>
<?php
    } else {
        $recherche = $_GET['recherche'];

        $req = "SELECT * FROM utilisateur WHERE typeUtilisateur = 2 AND (nom LIKE '%" . $recherche . "%' OR prenom LIKE '%" . $recherche . "%' OR ville LIKE '%" . $recherche . "%' OR entreprise LIKE '%" . $recherche . "%' OR poste LIKE '%" . $recherche . "%')";
        $exe = $bdd->query($req);
        $res = $exe->fetchAll(PDO::FETCH_ASSOC);
    }
}