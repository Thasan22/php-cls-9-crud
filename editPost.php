<?php
session_start();
include "./env.php";
$id = $_REQUEST['edit_id'];
$query = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($db_connect,$query);
$post = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
   <!-- NAVEBAR STARTS HERE -->
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container">
            <a class="navbar-brand" href="#">Post System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myCustomNav" aria-controls="myCustomNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="hover collapse navbar-collapse" id="myCustomNav">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./allPosts.php">All Posts</a>
              </li>
            </div>
        </div>
      </nav>
    <!-- NAVEBAR ENDS HERE -->


    <!-- USER FORM STARTS -->
    <div class="card col-lg-5 mx-auto mt-5">
        <div class="card-header">Update Post</div>
        <div class="card-body">

        <form action="./updatePost.php" method="post">
            <input type="hidden" name="id" value="<?=$post['id']?>">
            <input value="<?=$post['title']?>" name="title" type="text" placeholder="Post Title" class="form-control my-3">

            <span class="text-danger">
                <?=isset($_SESSION["error_check"]["title_error"]) ? $_SESSION["error_check"]["title_error"] : ''?>
            </span>

            <textarea name="details" class="form-control my-3" placeholder="Text Details"><?=$post['detail']?></textarea>

            <span class="text-danger">
                <?=isset($_SESSION["error_check"]["detail_error"]) ? $_SESSION["error_check"]["detail_error"] : ''?>
            </span>
            
            <input value="<?=$post['author']?>" name="author" type="text" placeholder="Post Author" class="form-control my-3">
            <span class="text-danger">
                <?=isset($_SESSION["error_check"]["author_error"]) ? $_SESSION["error_check"]["author_error"] : ''?>
            </span>
            
            <!-- <?php
            if(isset($_SESSION["error_check"]["author_error"])){
            ?>
                <span class="text-danger">
                <?= $_SESSION["error_check"]["author_error"];?>
                </span>
            <?php
            }
            ?> -->

            <br>

            <button type="submit" class="btn btn-primary">Update</button><br>
        </form>

        </div>
    </div>
    <!-- USER FORM ENDS -->

<script src="bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
session_unset();
?>