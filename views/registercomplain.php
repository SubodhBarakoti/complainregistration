<?php
    include_once '../connection/connection.php';
    $query = "SELECT * FROM department";
    $result = mysqli_query($db_con,$query);
    session_start();
    if(!empty($_SESSION['user_id'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Register a complain</title>
            <link rel="stylesheet" href="../style.css">
        </head>
        <body>
            <div class="registercomplain_div">
                <form action="../auth/registercomplainbackend.php" method="POST">
                    <div class="complain_text">
                        <label for="complain_text">Complain Text</label><br>
                        <textarea name="complain_text" id="complain_text" cols="30" rows="10"></textarea>
                    </div>
                    <div class="complain_department">
                        <label for="department_id">Complain Department</label>
                        <select name="department_id" id="department_id">
                            <?php
                                if($result){
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<option value='".$row['department_id']."'>".$row['department_name']."</option>";
                                    }
                                }
                                else{
                                    die("Error");
                                }
                            ?>
                        </select>
                    </div>
                    <div class="complain_submit">
                        <input type="submit" value="Register Complain" name="registercomplain" id="registercomplain">
                    </div>
                </form>
            </div>
        </body>
        </html>

        
        <?php
    }
    else{
        header('location:../views/accessdenied.php');
    }
?>