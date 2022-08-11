<?php
    include_once '../connection/connection.php';
    if(isset($_POST['login'])){
        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];
        // $admin_password = sha1($admin_password);
        if(!empty($admin_username) && !empty($admin_password)){
            $query = "SELECT * FROM admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
            $result = mysqli_query($db_con,$query);
            if($result){
                if(mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_array($result);
                    session_start();
                    $_SESSION['admin_id']=$row['admin_id'];
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
        else{
            header('location:../views/adminlogin.php?error=true');
        }
        }
        else{
            header('location:../views/adminlogin.php?error=true');
        }
?>