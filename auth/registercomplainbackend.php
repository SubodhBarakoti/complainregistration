<?php
    include_once '../connection/connection.php';
    session_start();
    if(isset($_POST['registercomplain'])){
        $complain_text = $_POST['complain_text'];
        $department_id = $_POST['department_id'];
        if(!empty($complain_text) && !empty($department_id)){
            $user_id = $_SESSION['user_id'];
            $query = "INSERT INTO complain(complain_text,department_id,user_id) VALUES('$complain_text','$department_id','$user_id')";
            $result = mysqli_query($db_con,$query);
            if($result){
                header("Location: ../views/userdashboard.php");
            }
            else{
                die("Error");
            }
        }
        else{
            header('location:../views/registercomplain.php?error=1');
        }
    }
    else{
        die('error');
    }
?>