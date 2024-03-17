<?php
if(isset($_POST['login'])){
    include 'config.php';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);
    
    $sql = "SELECT user_id , username , role FROM user WHERE username = '$username' AND password= '$password'";

    $result = mysqli_query($conn, $sql) or die("error in login");

    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){
            session_start();
            $_SESSION["username"] = $row["username"];
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["user_role"] = $row["role"];

            header("location: http://localhost/news-site/admin/post.php");
        }
    } 
    else
    {
        echo '<div class = "alter alert-danger">User and password not found</div>';
    
    }
}
?>