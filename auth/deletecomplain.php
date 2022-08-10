<?php
    include_once '../connection/connection.php';
    if(isset($_GET['complain_id'])){
        $complain_id = $_GET['complain_id'];
        $query="DELETE FROM complain WHERE complain_id = '$complain_id'";
        $result = mysqli_query($db_con,$query);
        if($result){
            header("Location: ../views/userdashboard.php");
        }
        else{
            die("Error");
        }
    }
?>