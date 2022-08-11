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
                    Department Login Page
                </div>
                <form action="../auth/departmentloginbackend.php" method="POST">
                    <input type="text" name="department_username" id="department_username" placeholder="Enter the username"><br>
                    <input type="password" name="department_password" id="department_password" placeholder="Enter the password"><br>
                    <input type="submit" value="Login" name="login" id="login">
                </form>
            </div>
        </body>
        </html>

        <?php
    }
    else{
        header('location:../views/departmentdashboard.php');
        // echo 'error';
    }
?>