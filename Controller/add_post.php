<?php
session_start();

require '../Model/connectFunction.php';
require '../Model/postsManager.php';
require '../Model/usersManager.php';
require '../Model/categoriesManager.php';

$categories = getCategories();


if(!empty($_POST)){
    extract($_POST);
    $errors = array();

    $category = strip_tags($category);
    $title = strip_tags($title);
    $content = strip_tags($content);

    if(empty($category)){
        array_push($errors, 'Séléctionnez une catégorie');
    }
    if(empty($title)){
        array_push($errors, 'Entrez un titre');
    }
    if(empty($content)){
        array_push($errors, 'Rédigez un article ! C\'est vide');
    }
    if(count($errors) == 0){
        $idCategory = $_POST['category'];
        $idUser = $_SESSION['id'];
        $comment = addPost($title, $content, $idCategory, $idUser);

        $success = 'Votre article a été publié';

        unset($category);
        unset($title);
        unset($image);
        unset($content);
    }
}

include ("../Partials/header.php");
?>
<?php require '../View/add_post.php'; ?>

<?php include ("../Partials/footer.php"); ?>