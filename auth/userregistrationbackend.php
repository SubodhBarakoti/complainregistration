<?php
    include_once '../connection/connection.php';

    if(isset($_POST['register'])){
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $contact_no = $_POST['contact_no'];
        $citizenship_no = $_POST['citizenship_no'];
        $proof = $_POST['proof'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        // $user_password = sha1($user_password);
        if($proof == "True"){
            $query = "INSERT INTO user(fname,mname,lname,address,contact_no,citizenship_no,user_email,user_password) VALUES ('$fname','$mname','$lname','$address','$contact_no','$citizenship_no','$user_email','$user_password')";
            $result = mysqli_query($db_con,$query);
            if($result){
                $row=mysqli_fetch_array($result);
                session_start();
                $_SESSION['user_id']=$row['user_id'];
                header('location:../views/userdashboard.php');
            }
            else{
                header('location:../views/userregistration.php?success=false');
            }
        }
        else{
            die("Not your Citizenship Number");
        }
    }
?>