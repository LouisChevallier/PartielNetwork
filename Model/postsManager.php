<?php
// FONCTION QUI AMENE TOUS POSTS
function getPosts ()
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM posts ORDER BY id DESC');
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI COMPTE NOMBRE TOTAL POSTS
function countPosts ()
{
    $db = connect();

    $query = $db->prepare('SELECT COUNT(*) FROM posts');
    $query->execute();
    $data = $query->fetch(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI AMENE 1 POST
function getPost ($id)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM posts WHERE id = ?');
    $query->execute(array($id));
    if($query->rowCount() == 1) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else{
        header('Location:index.php');
    }
    $query->closeCursor();
}

// FONCTION QUI AJOUTE UN POST
function addPost ($title, $content, $idUser)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO posts (title, content, date, idUser) VALUES (?, ?, NOW(), ?, ?)');
    $query->execute(array($title, $content, $idUser));
    $query->closeCursor();
}

// FONCTION QUI SUPPRIME UN POST
function deletePost ($deleteId)
{
    $db = connect();

    $query = $db->prepare('DELETE FROM posts WHERE id = ?');
    $query->execute(array($deleteId));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}

// FONCTION QUI SUPPRIME UN POST
function updatePost ($title, $content, $idPost)
{
    $db = connect();

    $query = $db->prepare('UPDATE posts SET title = ?, content = ?');
    $query->execute(array($title, $content, $idPost));
    $query->closeCursor();
}

// FONCTION QUI AMENE TOUS POSTS D'UN USER PARTICULIER
function getMyPosts ($idUser)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM posts WHERE idUser = ?');
    $query->execute(array($idUser));
    $data = $query->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $query->closeCursor();
}