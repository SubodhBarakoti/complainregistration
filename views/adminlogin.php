<?php
    if(isset($_GET['error'])){
        $turn=0;
        while($turn==0){
            if($_GET['error']=="true"){
                echo "<script>alert('Login Failed')</script>";
                $turn=1;
            }
            else{
                echo "<script>alert('Login Successful')</script>";
                $turn=1;
            }
        }
    }
?>
<?php
    include_once '../connection/connection.php';
    session_start();
    if(empty($_SESSION['admin_id'])){
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
                    Admin Login Page
                </div>
                <form action="../auth/adminloginbackend.php" method="POST">
                    <input type="text" name="admin_username" id="admin_username" placeholder="Enter the username"><br>
                    <input type="password" name="admin_password" id="admin_password" placeholder="Enter the password"><br>
                    <input type="submit" value="Login" name="login" id="login">
                </form>
            </div>
        </body>
        </html>
        <?php
    }
    else{
        header('location:../views/admindashboard.php');
        // echo 'error';
    }
?>