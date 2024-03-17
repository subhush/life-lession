<?php
if(isset($_POST['submit'])){
    include 'config.php';

    $userid = mysqli_real_escape_string($conn,$_POST['user_id']);
    $fname = mysqli_real_escape_string($conn,$_POST['f_name']);
    $lname = mysqli_real_escape_string($conn,$_POST['l_name']);
    $user = mysqli_real_escape_string($conn,$_POST['username']);
     $password1=mysqli_real_escape_string($conn, md5 ($_POST["password"]));
    $role = mysqli_real_escape_string($conn,$_POST['role']);


    $sql = "UPDATE user SET first_name = '$fname', last_name =      '$lname', username = '$user', role = '$role' WHERE user_id = '$userid'";
    

    $result = mysqli_query($conn ,$sql) or die("erroe");
        header("location: http://localhost/news-site/admin/users.php");
     
}
?>