<?php
    if(isset($_GET['success'])){
        $turn=0;
        while($turn==0){
            if($_GET['success']=="true"){
                echo "<script>alert('Registration Successful')</script>";
                $turn=1;
            }
            else{
                echo "<script>alert('Registration Failed')</script>";
                $turn=1;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="registrationform">
        <form action="../auth/userregistrationbackend.php" method="POST">
            <input type="text" name="fname" id="fname" placeholder="Enter your first name"><br>
            <input type="text" name="mname" id="mname" placeholder="Enter your middle name"><br>
            <input type="text" name="lname" id="lname" placeholder="Enter your last name"><br>
            <input type="text" name="address" id="address" placeholder="Enter your address"><br>
            <input type="tel" name="contact_no" id="cotact_no" placeholder="Enter your Contact Number"><br>
            <input type="text" name="citizenship_no" id="citizenship_no" placeholder="Enter your Citizenship Number"><br>
            <label for="proof">Prove that this is your citizenship number:</label><br>
            <input type="radio" name="proof" id="citizenship_no_valid" value="True">This is my citizenship number<br>
            <input type="radio" name="proof" id="citizenship_no_invalid" value="False">This is not my citizenship number<br>
            <input type="text" name="user_email" id="user_email" placeholder="Enter your email"><br>
            <input type="password" name="user_password" id="user_password" placeholder="Enter your password"><br>
            <input type="submit" value="register" name="register" id="register">
        </form>
    </div>
</body>
</html>