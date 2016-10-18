<?php
session_start();
$error = '';
if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['passowrd'])){
        echo "username or password is invalid";
    }
    else{
        $username = $_POST['username'];
        $password=$_POST['password'];
        
        $conn = mysqli_connect("localhost","root","","sampledb");
        
        $sql = "select * from login where username='$username' and password='$password'";
        $result =   mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if($rows == 1){
            $_SESSION['login_user'] = $username;
            header("location:estimate.php");
        }else{
            error "invalid user";
        }
        mysqli_close($conn);
    }
}
?>