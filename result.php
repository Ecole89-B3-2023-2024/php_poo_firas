<?php
require __DIR__ . "/inc/functions.php";
require __DIR__ . "/templates/header.php";

echo "<h1>";
if($_POST != []){
    if($_GET["statut"]=="edition"){
        $user=new Utilisateur($_POST['id'], $_POST['prenom'], $_POST['nom'], $_POST['email']);
        update($user);
    }else{
        $user=new Utilisateur(null, $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['password']);
        create($user);
    }
}   
?>
</h1>
<a href="index.php">Retour vers l'accueil</a>
<?php
require __DIR__ . "/templates/footer.php";