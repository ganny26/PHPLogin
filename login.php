<?php
session_start();
$error = '';
if(isset($_POST['submit'])){
    if(empty($_POST['username']) || empty($_POST['password'])){
        echo "username or password is invalid";
    }
    else{
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $conn = mysqli_connect("localhost","root","","sample_db");
        
        $sql = "select * from tblLogin where user='$username' and pass='$password'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if($rows == 1){
            $_SESSION['login_user'] = $username;
            header("location:dashboard.php");
        }else{
            echo "invalid user";
        }
        mysqli_close($conn);
    }
}
?>