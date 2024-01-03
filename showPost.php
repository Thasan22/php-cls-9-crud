<?php
session_start();
include "./env.php";
$id = $_REQUEST['id'];
$query = "SELECT * FROM posts WHERE id = $id";
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
    <div class="card col-lg-8 mx-auto mt-5">
        <div class="card-header">Show Post</div>
        <div class="card-body">
        <div class="card">
            <table class="table">
                <tr>
                <td><h5><b>Author</b></h5><?= $post['author']?></td>
                </tr>
                <tr>
                <td><h5><b>Title</b></h5><?= $post['title']?></td>
                </tr>
                <tr>
                <td><h5><b>Detail</b></h5><?= $post['detail']?></td>
                </tr>
            </table>
        </div>
        </div>
    </div>
    <!-- USER FORM ENDS -->

<script src="bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
session_unset();
?>