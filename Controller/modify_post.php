<?php
session_start();

require '../Model/connectFunction.php';
require '../Model/postsManager.php';
require '../Model/usersManager.php';

if(isset($_GET['id']) OR is_numeric($_GET['id'])){
    extract($_GET);
    $id = strip_tags($id);
    $errors = array();

    $oldpost = getPost($id);

    if(isset($_POST)){
        extract($_POST);


        if(empty($category) && empty($title) && empty($content)){
            array_push($errors, 'Attention, des champs sont vides');
        }
        if(count($errors) == 0){
            var_dump($_GET);
            var_dump($title);
            $idPost = $_GET['id'];
            $updated = updatePost($title, $content, $idPost);

            $success = 'Votre article a été modifié';
            header ('location: ../Controller/posts.php');
        }
    }
}

include ("../Partials/header.php");
?>
<?php require '../View/modify_post.php'; ?>

<?php include ("../Partials/footer.php"); ?>
