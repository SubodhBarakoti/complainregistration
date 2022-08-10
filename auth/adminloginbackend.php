<?php
    include_once '../connection/connection.php';
    if(isset($_POST['login'])){
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];
        // $admin_password = sha1($admin_password);
        $query = "SELECT * FROM admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
        $result = mysqli_query($db_con,$query);
        if($result){
            $row = mysqli_fetch_array($result);
            if($row['admin_username']==$admin_username && $row['admin_password']==$admin_password){
                session_start();
                $_SESSION['admin_id']=$row['admin_id'];
                $_SESSION['admin_username'] = $admin_username;
                $_SESSION['admin_password'] = $admin_password;
                header('location:../views/admindashboard.php');
            }
            else{
                header('location:../views/adminlogin.php?error=true');
            }
        }
        else{
            header('location:../views/adminlogin.php?error=true');
        }
    }
?>