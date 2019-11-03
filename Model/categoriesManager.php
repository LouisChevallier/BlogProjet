<?php
// FONCTION QUI AMENE TOUTES CATEGORIES
function getCategories ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM categories');
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AMENE LA CATEGORIE QU'ON VEUT
function getCategory ($idCatego)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM categories WHERE id = ?');
    $query->execute(array($idCatego));
    if($query->rowCount() == 1) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
}

function getNbPostsByCategory ($idCatego)
{
    $db = connect();

    $query = $db->prepare('SELECT COUNT(*) FROM posts WHERE idCategory = ?');
    $query->execute(array($idCatego));
    $data = $query->fetch(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AJOUTE UNE CATEGORIE
function addCategory ($nameCat)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO categories (name) VALUES (?)');
    $query->execute(array($nameCat));
    $query->closeCursor();
}

// FONCTION QUI SUPPRIME UNE CATEGORIE
function deleteCategory ($deleteIdCat)
{
    $db = connect();

    $query = $db->prepare('DELETE FROM categories WHERE id = ?');
    $query->execute(array($deleteIdCat));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}