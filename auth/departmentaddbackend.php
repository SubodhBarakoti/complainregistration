<?php
    include_once '../connection/connection.php';
    if(isset($_POST['add'])){
        $department_name = $_POST['department_name'];
        $department_username = $_POST['department_username'];
        $department_password = $_POST['department_password'];
        $query = "INSERT INTO department(department_name,department_username,department_password) VALUES('$department_name','$department_username','$department_password')";
        $result = mysqli_query($db_con,$query);
        if($result){
            header('location:../views/showdepartment.php?success=true');
        }
        else{
            header('location:../views/showdepartment.php?success=false');
        }
    }
?>