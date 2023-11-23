<?php
require __DIR__ . "/inc/db.php";
require __DIR__ . "/inc/Utilisateur.php";
require __DIR__ . "/templates/header.php";
?>
<fieldset>
    <legend>Inscription</legend>
    <form action="result.php?statut=inscription" method="post">
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit">Valider</button>
    </form>
</fieldset>

<a href="index.php">Retour vers l'accueil</a>

<style>
    form div {
        width: 100%;
        display: flex;
        /* justify-content: space-around; */
        margin-bottom: 0.5em;
    }

    label {
        width: 10%;
    }

    input {
        width: 70%;
    }
</style>

<?php
require __DIR__ . "/templates/footer.php";