<?php
/**
 * Created by PhpStorm.
 * User: Rémy
 * Date: 15/05/2018
 * Time: 09:48
 */
include "includes/includes.php";
include "traitements/traitementInscription.php";

?>

    <div class="container mt-5 mb-4">
        <form method="POST" action="">
            <div class="form-group">
                <label for="">Nom :</label>
                <input type="text" class="form-control" name="nom" id="nom" aria-describedby="helpId" placeholder="" required>
                <small id="helpId" class="form-text text-muted">Ex : Dupond</small>
            </div>
            
            <div class="form-group">
                <label for="">Prénom :</label>
                <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="helpId" placeholder="" required>
                <small id="helpId" class="form-text text-muted">Ex : Jean</small>
            </div>
            
            <div class="form-group">
                <label for="">Date de naissance :</label>
                <input
                    type="date"
                    class="form-control" name="dateNaissance" id="dateNaissance" aria-describedby="helpId" placeholder="" required>
                <small id="helpId" class="form-text text-muted">Ex : 01/01/1989</small>
            </div>

            <div class="form-group">
                <label for="">Adresse postale :</label>
                <input type="text" class="form-control" name="adresse" id="adresse" aria-describedby="helpId" placeholder="" required>
                <small id="helpId" class="form-text text-muted">Ex : 13 rue de la Sardine</small>
            </div>

            <div class="form-group">
                <label for="">Code postal : </label>
                <input type="text" class="form-control" name="codePostal" id="codePostal" aria-describedby="helpId" placeholder="" pattern="[0-9]*" required>
                <small id="helpId" class="form-text text-muted">Ex : 13001</small>
            </div>

            <div class="form-group">
                <label for="">Ville :</label>
                <input type="text" class="form-control" name="ville" id="ville" aria-describedby="helpId" placeholder="" required>
                <small id="helpId" class="form-text text-muted">Ex : Marseille</small>
            </div>
            
            <div class="form-group">
                <label for="">Email :</label>
                <input type="email" class="form-control" name="mail" id="mail" aria-describedby="emailHelpId" placeholder="" required>
                <small id="emailHelpId" class="form-text text-muted">Ex : jean.dupond@gmail.com</small>
            </div>

            <div class="form-group">
                <label for="">Mot de passe :</label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="">Confirmation de mot de passe :</label>
                <input type="password" class="form-control" name="mdp2" id="mdp2" placeholder="" required>
            </div>

            <div class="form-group">
                <label for="">Type d'utilisateur :</label>
                <select class="form-control" name="type" id="type" required>
                    <option value="0">Choisissez une option</option>
                    <option value="1">Etudiant</option>
                    <option value="2">Ancien</option>
                    <option value="3">Professeur</option>
                </select>
            </div>
            <script>
                $("[name='type']").change(function () {
                    //On réinitialise tous les champs optionnels lorsque l'utilisateur change son type
                    $(".opt").addClass('d-none');
                    $(".opt").removeAttr('required');
                    $(".opt input").val("");
                    $(".opt select").val("");
                    var type = $("[name='type']").val();

                    //On affiche ou non les champs selon le type sélectionné
                    if (type == 1) {
                        $('#niveauEtude').removeClass('d-none')
                        $('#niveauEtude').attr('required', true)
                    } else if (type == 2) {
                        $('#poste').removeClass('d-none')
                        $('#entreprise').removeClass('d-none')
                        $('#anneeDiplome').removeClass('d-none')
                        $('#anneeDiplome').attr('required', true) //On demande la saisie de l'année du diplôme, le reste est facultatif
                        $('#anneePoste').removeClass('d-none')
                    }
                });
            </script>

            <div class="form-group d-none opt" id="niveauEtude">
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

            <div class="form-group d-none opt" id="anneeDiplome">
                <label for="">Année d'obtention du diplôme : </label>
                <input type="number" class="form-control" name="anneeDiplome" id="anneeDiplome" aria-describedby="helpId" placeholder="" pattern="[0-9]{4}">
                <small id="helpId" class="form-text text-muted">Ex : 2018</small>
            </div>

            <div class="form-group d-none opt" id="entreprise">
                <label for="">Entreprise (laissez blanc si chômeur) :</label>
                <input type="text" class="form-control" name="entreprise" id="entreprise" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Ex : Microsoft</small>
            </div>

            <div class="form-group d-none opt" id="poste">
                <label for="">Poste occupé : </label>
                <input type="text" class="form-control" name="poste" id="poste" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Ex : Ingénieur informatique</small>
            </div>

            <div class="form-group d-none opt" id="anneePoste">
                <label for="">Année d'entrée à ce poste : </label>
                <input type="number" class="form-control" name="anneePoste" id="anneePoste" aria-describedby="helpId" placeholder="" pattern="[0-9]{4}">
                <small id="helpId" class="form-text text-muted">Ex : 2018</small>
            </div>

            <div class="text-center"><button type="submit" name="envoyer" class="btn btn-primary text-center">Envoyer</button></div>
        </form>
    </div>


<?php

include "includes/bas.php";
