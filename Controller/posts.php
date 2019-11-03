<?php
session_start();

require '../Model/connectFunction.php';
require '../Model/postsManager.php';
require '../Model/usersManager.php';
require '../Model/categoriesManager.php';

$posts = getPosts();
$nbPosts = countPosts();
$categories = getCategories();


include ("../Partials/header.php");
?>
<?php require '../View/posts.php'; ?>

<?php include ("../Partials/footer.php"); ?>