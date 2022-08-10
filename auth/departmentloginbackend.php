<?php
    include_once '../connection/connection.php';
    if(isset($_POST['login'])){
        $department_username = $_POST['department_username'];
        $department_password = $_POST['department_password'];
        // $department_password = sha1($department_password);
        $query = "SELECT * FROM department WHERE department_username = '$department_username' AND department_password = '$department_password'";
        $result = mysqli_query($db_con,$query);
        if($result){
            $row = mysqli_fetch_array($result);
            if($row['department_username']==$department_username && $row['department_password']==$department_password){
                session_start();
                $_SESSION['department_id']=$row['department_id'];
                header('location:../views/departmentdashboard.php');
            }
            else{
                header('location:../views/departmentlogin.php?error=true');
            }
        }
        else{
            header('location:../views/departmentlogin.php?error=true');
        }
    }
?>