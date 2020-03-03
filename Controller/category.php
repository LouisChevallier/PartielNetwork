<?php
session_start();

require '../Model/connectFunction.php';
require '../Model/postsManager.php';
require '../Model/usersManager.php';
require '../Model/commentManager.php';

$id = $_GET['id'];


include ("../Partials/header.php");
?>
<?php require '../View/category.php'; ?>

<?php include ("../Partials/footer.php"); ?>