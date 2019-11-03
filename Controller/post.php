<?php
session_start();

require '../Model/connectFunction.php';
require '../Model/postsManager.php';
require '../Model/usersManager.php';
require '../Model/commentManager.php';
require '../Model/categoriesManager.php';


if(!isset($_GET['id']) OR !is_numeric($_GET['id'])){
    var_dump($post);
}
else{
    extract($_GET);
    $id = strip_tags($id);

    if(!empty($_POST)){
        extract($_POST);
        $errors = array();

        $author = strip_tags($author);
        $comment = strip_tags($comment);

        if(empty($author)){
            array_push($errors, 'Entrez un pseudo');
        }
        if(empty($comment)){
            array_push($errors, 'Entrez un commentaire');
        }
        if(count($errors) == 0){
            $idPost = $id;
            var_dump($idPost);
            $comment = addComment($author, $comment, $idPost);

            $success = 'Votre commentaire a été publié';

            unset($author);
            unset($comment);
        }
    }

    $post = getPost($id);

    $idWriter = $post->idUser;
    $writer = getWriter($idWriter);

    $idCatego = $post->idCategory;
    $catego = getCategory($idCatego);

    $comments = getComment($id);

}

include ("../Partials/header.php");
?>
<?php require '../View/post.php'; ?>

<?php include ("../Partials/footer.php"); ?>