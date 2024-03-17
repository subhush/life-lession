<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>life-lesson</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header" style=" background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%); ">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
                <img src="images/peacock1.png" alt="" style=" width:120px; height: 120px; "> 
            </div>
            <div class="col-md-6">
                <a href="index.php" id="logo"><h3 style=" font-size: 50px; font-weight: 10px; color: black; " class="text-uppercase">life lession</h3></a>
            </div>
            <div class="col-md-3">
                <img src="images/peacock1.png" alt="" style=" width:120px; height: 120px; "> 
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                 include 'admin/config.php';
                 if(isset($_GET['cid'])){
                    $cat_id = $_GET['cid'];
                 }



                $sql = "SELECT * FROM category WHERE post > 0";

                $result=mysqli_query($conn , $sql) or die("Query Failed. : category");
                
                if (mysqli_num_rows($result) > 0){
                    $active = "";
                ?>
                <ul class='menu'>
                <li><a class='{$active}' href='<?php echo $hostname; ?>'>HOME</a></li>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)){
                            if(isset($_GET['cid'])){
                                if($row['category_id'] == $cat_id){
                                    $active = "active";
                                }else{
                                    $active = "";
                                }
                            }
                            echo "<li><a class='{$active}' href='category.php?cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                        }
                    ?>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->