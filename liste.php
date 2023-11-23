<?php
require __DIR__ . "/inc/functions.php";
require __DIR__ . "/templates/header.php";
$userList = getUsers();
?>
<table>
    <thead>
        <tr>
            <th>nom</th>
            <th>prénom</th>
            <th>email</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($userList as $user){
            ?>
            <tr>
                <td><?=$user["lastname"]?></td>
                <td><?=$user["firstname"]?></td>
                <td><?=$user["email"]?></td>
                <td><a href="edition.php?id=<?=$user["id"]?>">éditer</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<a href="index.php">Retour vers l'accueil</a>

<style>
    table {
        width: 100%;
    }

    tr {
        height: 2em;
    }

    td, th {
        border: 1px solid black;
        text-align: center
    }

    th {
        background: gray;
    }
</style>

<?php
require __DIR__ . "/templates/footer.php";