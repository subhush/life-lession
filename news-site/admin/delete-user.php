<?php
include 'config.php';
if($_SESSION["user_role"] == '0'){
    header("location: http://localhost/news-site/admin/post.php");
}
$user_id = $_GET['id'];
$sql = "DELETE FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($conn , $sql) or die("Query....!!!!!");
echo '<script>alert("DELETE SUCCESSFULLY")</script>';
header("location: http://localhost/news-site/admin/users.php");


?>