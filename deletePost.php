<?php
session_start();
include "./env.php";
$id = $_REQUEST['delete_id'];
$query = "DELETE FROM posts WHERE id = $id";
$res = mysqli_query($db_connect,$query);

if($res){
    header("location: ./allPosts.php");
    $_SESSION['dlt_msg'] = "<b>Your data has been deleted</b>";
}