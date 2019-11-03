<?php
session_start();

require '../Model/connectFunction.php';
require '../Model/postsManager.php';
require '../Model/usersManager.php';
require '../Model/categoriesManager.php';

$posts = getPosts();
$nbPosts = countPosts();
$categories = getCategories();

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

if(isset($_POST['deleteCat'])){
    if(!isset($_SESSION)){
        array_push($errors, 'Vous n\'êtes pas autorisé à supprimer l\'article');
    }
    else{
        $deleteIdCat = $_POST['deleteCat'];
        $before = deletePostsBeforeCat($deleteIdCat);
        var_dump($deleteIdCat);
        
        $del2 = deleteCategory($deleteIdCat);
        var_dump($del2);
        $success = 'Catégorie supprimé avec succès';
    }
}

if(isset($_POST['addcat'])){
    extract($_POST);
    $errors = array();

    $namecat = strip_tags($namecat);

    if(empty($namecat)){
        array_push($errors, 'Entrez une catégorie');
    }
    if(count($errors) == 0){
        $nameCat = $_POST['namecat'];
        $addedCat = addCategory($nameCat);

        $success = 'La catégorie a été ajouté à la liste déja existante';

        unset($namecat);
    }
}

include ("../Partials/header.php");

?>

<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    include '../View/backoffice.php'; 
    }
    else{
        include '../View/error.php';
    }
?>



<?php include ("../Partials/footer.php"); ?>