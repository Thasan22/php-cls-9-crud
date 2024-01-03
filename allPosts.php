<?php
include "./env.php";
session_start();
$query = "SELECT * FROM posts";
$res = mysqli_query($db_connect,$query);
$posts = mysqli_fetch_all($res,1);
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
            <a class="navbar-brand" href="./index.php">Post System</a>
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
    <div class="card col-lg-9 mx-auto mt-5">
        <div class="card-header">All Posts</div>
        <div class="card-body">

        <table class="table">
              <tr>
                <th>#</th>
                <th>Author</th>
                <th>Title</th>
                <th>Detail</th>
                <th> </th>
              </tr>

              <?php
              if(count($posts)>0){
              foreach($posts as $key=>$post){
                ?>

              <tr>

                <td><?=++$key?></td>
                <td>
                  <img style="width: 40px;height: 40px;border-radius: 50%;object-fit:cover;" src="https://api.dicebear.com/7.x/initials/svg?seed=<?= $post['author']?>" alt="">
                  <?= $post['author']?>
                </td>
                <td><?= $post['title']?></td>
                <td><?= strlen($post['detail']) >15? substr($post['detail'],0,15) . "..." : $post['detail']?></td>
                <td>
                  <a class="btn btn-primary" href="./showPost.php?id=<?=$post['id']?>">Show</a>
                  <a class="btn btn-warning" href="./editPost.php?edit_id=<?=$post['id']?>">Edit</a>
                  <a class="btn btn-danger" href="./deletePost.php?delete_id=<?=$post['id']?>">Delete</a>
                </td>
              </tr>

              <?php
              }
            }else{
              ?>

              <tr>
                <td colspan="4" class="text-center">
                  <h4>No posts found 😟</h4>
                </td>
              </tr>

            <?php
            }
            
            ?>
              
        </table>
            <span class="text-success ">
              <?=isset($_SESSION['msg']) ? $_SESSION['msg'] : ""?>
              <?=isset($_SESSION['dlt_msg']) ? $_SESSION['dlt_msg'] : ""?>
            </span>
        </div>
    </div>
    <!-- USER FORM ENDS -->

<script src="bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
session_unset();
?>