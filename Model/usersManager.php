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
function addUser ($mail, $username, $hashMdp, $role)
{
    $db = connect();

    $query = $db->prepare('INSERT INTO users (mail, username, password, role) VALUES (?, ?, ?, ?)');
    $query->execute(array($mail, $username, $hashMdp, $role));
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

function verifyDispo ($mail)
{
    $db = connect();

    $query = $db->prepare('SELECT * FROM users WHERE mail = ?');
    $query->execute(array($mail));
    if($query->rowCount() > 0) {
        $data = $query->fetch(PDO::FETCH_OBJ);
        return $data;
    }
}