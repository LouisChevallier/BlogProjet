<?php

$requestedPage = '/';

if (isset($_SERVER['REQUEST_URI'])) {
    $requestedPage = explode('?', $_SERVER['REQUEST_URI']);
}

switch ($requestedPage[0]) {
    case 'connexion':
        require_once('Controller/connexion.php');
        break;
    case 'posts':
        require_once('Controller/posts.php');
        break;
    default:
        require_once('View/error.php');
}
?>