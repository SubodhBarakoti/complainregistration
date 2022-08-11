<?php
    include_once '../connection/connection.php';
    if(isset($_GET['department_id'])){
        $department_id = $_GET['department_id'];
        $query = "DELETE FROM department WHERE department_id = '$department_id'";
        $result = mysqli_query($db_con,$query);
        if($result){
            header('location:../views/showdepartment.php?error=none');
        }
        else{
            header('location:../views/showdepartment.php?error=2');
        }
    }
    else{
        die('error');
    }
?>