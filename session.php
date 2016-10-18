<?php
$conn = mysqli_connect("localhost","root","","sample_db");
session_start();
$user_check = $_SESSION['login_user'];

$sql = "select user from tblLogin where user='$user_check'";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$login_session = $row['user'];
if(!isset($login_session)){
    mysqli_close($conn);
    header('location:login.html');
}
?>