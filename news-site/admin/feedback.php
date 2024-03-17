<?php
include 'config.php';

if(isset($_POST['feedback'])){
 $email = mysqli_real_escape_string($conn,$_POST['email']);
 $fname = mysqli_real_escape_string($conn,$_POST['name']);
 $message = mysqli_real_escape_string($conn,$_POST['message']);

 $sql = "INSERT into feebback (email,fullname,message) VALUES ('$email','$fname','$message')";
 if(mysqli_multi_query($conn, $sql)){
    header("location: http://localhost/news-site/index.php");
    echo "<div class='alert alert-danger'>Submit.</div>";
} else {
    echo "<div class='alert alert-danger'>error.</div>";
}
}

?>