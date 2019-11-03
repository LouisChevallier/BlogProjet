<?php

require '../Model/connectFunction.php';
require '../Model/usersManager.php';


if(!empty($_POST)){
    extract($_POST);
    $errors = array();

    $username = strip_tags($username);
    $mdp = strip_tags($mdp);

    if(empty($username)){
        array_push($errors, 'Entrez votre pseudo');
    }
    if(empty($mdp)){
        array_push($errors, 'Entrez votre mot de passe');
    }

    if(count($errors) == 0){
        $usersWithSameUsername = getConnect($username);
        $hash = $usersWithSameUsername->password;
        $id = $usersWithSameUsername->id;
        $role = $usersWithSameUsername->role;

        if(password_verify($mdp, $hash)){
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $success = 'Connexion réussie !';
            header ('location: ../Controller/posts.php');
        }
        else{
            array_push($errors, 'Mauvais identifiant ou mot de passe');
        }

        unset($username);
        unset($mdp);
    }
}

include ("../Partials/header.php");
?>
<?php require '../View/connexion.php'; ?>

<?php include ("../Partials/footer.php"); ?>
