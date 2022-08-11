<?php
    include_once '../connection/connection.php';
    if(isset($_POST['login'])){
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        // $user_password = sha1($user_password);
        if(!empty($user_email) && !empty($user_password) && filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            $query = "SELECT * FROM user WHERE user_email = '$user_email' AND user_password = '$user_password'";
            $result = mysqli_query($db_con,$query);
            if($result){
                if(mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_array($result);
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
        else{
            header('location:../views/userlogin.php?error=true');
        }
        }
        else{
            header('location:../views/userlogin.php?error=true');
        }
?>