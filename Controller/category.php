<?php
session_start();

require '../Model/connectFunction.php';
require '../Model/postsManager.php';
require '../Model/usersManager.php';
require '../Model/commentManager.php';
require '../Model/categoriesManager.php';

$id = $_GET['id'];
$posts = getCatPosts($id);


$catego = getCategory($id);



include ("../Partials/header.php");
?>
<?php require '../View/category.php'; ?>

<?php include ("../Partials/footer.php"); ?>