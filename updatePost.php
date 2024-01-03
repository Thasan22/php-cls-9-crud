<?php
session_start();
include "./env.php";
// DATA COLLECTION
$title = $_REQUEST["title"];
$details = $_REQUEST["details"];
$author = $_REQUEST["author"];
$id = $_REQUEST["id"];

$errors = [];

// VALIDATION
if(empty($title)){
    $errors["title_error"] = "Title is empty!!";
}
if(empty($details)){
    $errors["detail_error"] = "Detail is empty!!";
}
if(strlen($author) > 60){
    $errors["author_error"] = "Your name is too long!!";
}

if(count($errors) > 0){
    $_SESSION["error_check"] = $errors;
    header("location: ./editPost.php?edit_id=$id");
}else{
    $query = "UPDATE posts SET title = '$title', detail = '$details', author = '$author' WHERE id = $id";
    $result = mysqli_query($db_connect,$query);
    if($result){
        $_SESSION['msg'] = "<b>Your data has been updated</b>";
        header("location: ./allPosts.php");
    }
}
