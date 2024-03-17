<?php
 include 'config.php';
 session_start();

 if(!isset( $_SESSION["username"])){
    header("location: http://localhost/news-site/admin/");
 }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div id="header" style=" background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%); ">
    <!-- container -->
                    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-2">
                <img src="../images/peacock1.png" alt="" style=" width:120px; height: 120px; "> 
            </div>
            <div class="col-md-6">
                <a href="index.php" id="logo"><h3 style=" font-size: 50px; font-weight: 10px; color: black; " class="text-uppercase">life lession</h3></a>
            </div>
            <div class="col-md-2">
                <img src="../images/peacock1.png" alt="" style=" width:120px; height: 120px; "> 
            </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md col-md-2">
                        <a href="logout.php" class="admin-logout" >Hello  <?php echo $_SESSION["username"] ?>     logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <?php
                            if($_SESSION["user_role"] == '1'){
                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
