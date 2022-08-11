<?php
    include_once '../connection/connection.php';
    session_start();
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
        if(!empty($fname) && !empty($lname) && !empty($address) && !empty($contact_no) && !empty($citizenship_no) && !empty($user_email) && !empty($user_password) && filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            $query3 = "SELECT * FROM user WHERE user_email = '$user_email' OR contact_no = '$contact_no' OR citizenship_no = '$citizenship_no'";
            $result3 = mysqli_query($db_con,$query3);
            if($result3){
                if(mysqli_num_rows($result3)>0){
                    header('location:../views/userregistration.php?error=1');
                }
                else{
                    if($proof == "True"){
                        $query = "INSERT INTO user(fname,mname,lname,address,contact_no,citizenship_no,user_email,user_password) VALUES ('$fname','$mname','$lname','$address','$contact_no','$citizenship_no','$user_email','$user_password')";
                        $result = mysqli_query($db_con,$query);
                        if($result){
                            $query2="SELECT * FROM user WHERE user_email = '$user_email' AND user_password = '$user_password'";
                            $result2 = mysqli_query($db_con,$query2);
                            if($result2){
                                if(mysqli_num_rows($result2)>0){
                                    $row = mysqli_fetch_array($result2);
                                    $_SESSION['user_id']=$row['user_id'];
                                    header('location:../views/userdashboard.php');
                                }
                                else{
                                    header('location:../views/userregistration.php?error=5');
                                }
                            }
                            else{
                                header('location:../views/userregistration.php?error=3');
                            }
                        }
                        else{
                            header('location:../views/userregistration.php?error=4');
                        }
                    }
                    else{
                        die("Not your Citizenship Number");
                    }
                }
            }
            else{
                header('location:../views/userregistration.php?error=3');
            }
        }
        else{
            header('location:../views/userregistration.php?error=2');
        }
            
        }
        else{
            header('location:../views/userregistration.php?error=true');
    }
?>