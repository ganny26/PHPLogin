<?php
$conn = mysqli_connect("localhost","root","","sampledb");
session_start();
$user_check = $_SESSION['login_user'];

$sql = "select username from login where username='$user_check'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$login_session = $row['username'];
if(!isset($login_session)){
    mysqli_close($conn);
    header('location:index.html');
}

?>