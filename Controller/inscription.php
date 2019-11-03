<?php
session_start();

require '../Model/connectFunction.php';
require '../Model/usersManager.php';


if(!empty($_POST)){
    extract($_POST);
    $errors = array();

    $username = strip_tags($username);
    $mdp = strip_tags($mdp);
    $mdp2 = strip_tags($mdp2);

    if(empty($username)){
        array_push($errors, 'Entrez un pseudo');
    }
    if(empty($mdp)){
        array_push($errors, 'Entrez un mot de passe');
    }
    if($mdp !== $mdp2){
        array_push($errors, 'Le mot de passe confirmé est différent');
    }
    else{
        $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);
    }

    if(count($errors) == 0){

        $dispo = verifyDispo($username);
        if(empty($dispo)){
            $role = 'membre';
            $newUser = addUser($username, $hashMdp, $role);

            $success = 'Inscription réussie !';

            unset($username);
            unset($mdp);
        }
        else{
            array_push($errors, 'Ce pseudo n\'est pas disponible');
        }
    }
}

include ("../Partials/header.php");
?>
<?php require '../View/inscription.php'; ?>

<?php include ("../Partials/footer.php"); ?>