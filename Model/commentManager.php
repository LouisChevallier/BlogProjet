<?php

// FONCTION QUI AMENE TOUS POSTS
function addComment ($author, $comment, $idPost)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO comments (author, comment, idPost, date) VALUES (?, ?, ?, NOW())');
    $query->execute(array($author, $comment, $idPost));
    $query->closeCursor();
}

function getComment($id)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM comments WHERE idPost = ?');
    $query->execute(array($id));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}