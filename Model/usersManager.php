<?php
// FONCTION QUI AMENE TOUS POSTS
function getUsers ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users ORDER BY id DESC');
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

function getWriter ($idWriter)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE id = ?');
    $query->execute(array($idWriter));
    if($query->rowCount() == 1) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
}

// FONCTION QUI AJOUTE UN USER
function addUser ($username, $hashMdp, $role)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO users (username, password, role) VALUES (?, ?, ?)');
    $query->execute(array($username, $hashMdp, $role));
    $query->closeCursor();
}

// FONCTION QUI PERMET DE SE CONNECTER
function getConnect ($username)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE username = ?');
    $query->execute(array($username));
    if($query->rowCount() > 0) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
}

function verifyDispo ($username)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE username = ?');
    $query->execute(array($username));
    if($query->rowCount() > 0) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
}