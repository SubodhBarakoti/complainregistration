<?php
    include_once '../connection/connection.php';
    if(isset($_POST['login'])){
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        // $user_password = sha1($user_password);
        $query = "SELECT * FROM user WHERE user_email = '$user_email' AND user_password = '$user_password'";
        $result = mysqli_query($db_con,$query);
        if($result){
            $row = mysqli_fetch_array($result);
            if($row['user_email']==$user_email && $row['user_password']==$user_password){
                session_start();
                $_SESSION['user_id']=$row['user_id'];
                header('location:../views/userdashboard.php');
            }
            else{
                header('location:../views/userlogin.php?error=true');
            }
        }
        else{
            header('location:../views/userlogin.php?error=true');
        }
    }
?>