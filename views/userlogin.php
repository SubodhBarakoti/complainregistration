<?php
    if(isset($_GET['error'])){
            if($_GET['error']=="true"){
                echo "<script>alert('Login Failed')</script>";
            }
            else{
                echo "<script>alert('Login Successful')</script>";
            }
        }
?>
<?php
    include_once '../connection/connection.php';
    session_start();
    if(empty($_SESSION['user_id'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
            <link rel="stylesheet" href="../style.css">
        </head>
        <body>
            <div class="loginbox">
                <div class="loginheading">
                    User Login Page
                </div>
                <form action="../auth/userloginbackend.php" method="POST">
                    <input type="text" name="user_email" id="user_email" placeholder="Enter your email"><br>
                    <input type="password" name="user_password" id="user_password" placeholder="Enter your password"><br>
                    <input type="submit" value="Login" name="login" id="lo  gin">
                </form>
            </div>
            <div class="registrationlink">
                Don't have a account. Create<a href="userregistration.php">here!</a>
            </div>
        </body>
        </html>
        <?php
    }
    else{
        header('location:../views/userdashboard.php');
        // echo 'error';
    }
?>