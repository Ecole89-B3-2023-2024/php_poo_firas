<?php

require "./inc/Utilisateur.php";

session_start();

function get_user_by_id($id, $users){
    require "./inc/db.php";
    foreach($users as $user){
        if($id==$user['id']){
            return $user;
        }
    }
    return false;
}

function login($login, $password){
    require "./inc/db.php";
    $sql = "SELECT * FROM utilisateur";
    $resultLog = $pdo->query($sql);
    $users = $resultLog->fetchAll(PDO::FETCH_ASSOC);

    foreach($users as $id=>$user){
        if($user['email']===$login){
            if($user['password']===$password){
                $_SESSION['id']=$id;
                $_SESSION['user']=$user;
                return true;
            }
        }
    }
}
function logout(){
    unset($_SESSION['id']);
    unset($_SESSION['user']);
}

function loggedin(){
    require "./inc/db.php";
    if(empty($_SESSION['user'])){
        return false;
    }else{
        return true;
    }
}

function update($user){
    require "./inc/db.php";
    // on récupère l'utilisateur (pour vérifier s'il existe)
    $sql = $pdo->prepare("SELECT * FROM utilisateur WHERE id = ?;");
    $sql->execute([$user->id]);
    $user1=$sql->fetch(PDO::FETCH_ASSOC);
    // si l'utilisateur existe
    if($user1!=[]){
        //on prepare la requete et on l'envoie vers la bdd
        $request = $pdo->prepare("UPDATE utilisateur SET firstname= ?, lastname= ?, email= ? WHERE id= ?;");
        $request->execute([$user->firstname, $user->lastname, $user->email, $user->id]);
        $message = "l'utilisateur a bien été modifié";
    }

    // si l'utilisateur n'existe pas
    else {
        $message = "erreur de traitement";
    }
    echo $message;
}

function create($user){
    require "./inc/db.php";

    // on créé un objet utilisateur avec les données du formulaire récupérées dans $_POST
    $user = new Utilisateur(null, $_POST["prenom"], $_POST["nom"], $_POST["email"], $_POST["password"]);   
    //on prepare la requet et on l'envoie vers la bdd
    $request = $pdo->prepare("INSERT INTO utilisateur (firstname, lastname, email, password) VALUES (?, ?, ?, ?);");
    $request->execute([$user->firstname, $user->lastname, $user->email, $user->getPassword()]);
    $message = "l'utilisateur a été créé";
    echo $message;
}

function getUsers(){
    require "./inc/db.php";
    // on construit la requête qui va permettre de récupérer les utilisateurs
    $sql = "SELECT * FROM utilisateur;";
    // on l'exécute grâce à fetchAll() et on stocke cette liste dans une variable
    $request = $pdo->query($sql);
    $userList = $request->fetchAll(PDO::FETCH_ASSOC);
    return $userList;
    // on choisit d'afficher cette liste dans un tableau

}

function getUser($id){
    require "./inc/db.php";
    // on peut construire une requête SQL qui permettra de récupérer l'utilisateur à modifier.
    $sql = $pdo->prepare("SELECT * FROM utilisateur WHERE id = ?;");
    $sql->execute([$id]);
    $user=$sql->fetch(PDO::FETCH_ASSOC);
    return $user;
}

?>
