<?php
    require __DIR__ . "/inc/functions.php";
    require __DIR__ . "/templates/header.php";
    // on récupère l'id présent dans l'url et dans $_GET
    $id = $_GET["id"];
    $user = getUser($id);

?>
<fieldset>
    <legend>Mise à jour utilisateur</legend>
    <form action="result.php?statut=edition" method="post">
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" value="<?=$user['firstname']?>">
        </div>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?=$user['lastname']?>">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?=$user['email']?>">
        </div>
        <input type="text" name="id" value="<?=$id?>" hidden>
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