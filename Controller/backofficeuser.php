<?php
session_start();

require '../Model/connectFunction.php';
require '../Model/postsManager.php';
require '../Model/usersManager.php';
require '../Model/categoriesManager.php';

$idUser = $_SESSION['id'];
$posts = getMyPosts($idUser);
$nbPosts = countPosts();

if(isset($_POST['delete'])){
    if(!isset($_SESSION)){
        array_push($errors, 'Vous n\'êtes pas autorisé à supprimer l\'article');
    }
    else{
        $deleteId = $_POST['delete'];
        $del = deletePost($deleteId);
        $success = 'Article supprimé avec succès';
    }
}

include ("../Partials/header.php");

?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'membre'){
    include '../View/backofficeuser.php'; 
    }
    else{
        include '../View/error.php';
    }
?>



<?php include ("../Partials/footer.php"); ?>