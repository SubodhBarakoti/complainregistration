<?php
    include_once '../connection/connection.php';
    if(isset($_GET['approval'])){
        $complain_id = $_GET['complain_id'];
        $state_id = $_GET['state_id'];
        $approval = $_GET['approval'];
        if($approval=="accept"){
            $state_id = $state_id+1;
        }
        else{
            $state_id = 5;
        }
        $query="UPDATE complain SET state_id = '$state_id' WHERE complain_id = '$complain_id'";
        $result = mysqli_query($db_con,$query);
        if($result){
            header("Location: ../views/departmentdashboard.php");
        }
        else{
            die("Error");
        }
    }
?>