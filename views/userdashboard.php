<?php
    include_once '../connection/connection.php';
    session_start();
    if(!empty($_SESSION['user_id'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User Home Page</title>
            <link rel="stylesheet" href="../style.css">
        </head>
        <body>
            <div class="logout">
                <button onclick="location.href='../auth/userlogout.php';">Logout</button>
            </div>
            <div class="register_complain">
                <button onclick="location.href='registercomplain.php';">Register Complain</button>
            </div>
            <div class="registered_complain">
                <div id="previous_complain">
                    Previous Complains
                </div>
                <div class="complain_table">
                    <table>
                        <tr>
                            <th>Complain No.</th>
                            <th>Complain text</th>
                            <th>Department</th>
                            <th>Complain State</th>
                        </tr>
                        <?php
                            $user_id = $_SESSION['user_id'];
                            $query = "SELECT * FROM complain WHERE user_id = '$user_id'";
                            $result = mysqli_query($db_con,$query);
                            if($result){
                                while($row = mysqli_fetch_array($result)){
                                    // code for fetching department name
                                    $department_id=$row['department_id'];
                                    $query1 = "SELECT * FROM department WHERE department_id = '$department_id'";
                                    $result1 = mysqli_query($db_con,$query1);
                                    $row1=mysqli_fetch_array($result1);

                                    // code for fetching state name
                                    $state_id=$row['state_id'];
                                    $query2 = "SELECT * FROM state WHERE state_id = '$state_id'";
                                    $result2 = mysqli_query($db_con,$query2);
                                    $row2=mysqli_fetch_array($result2);
                                ?>
                                    <tr>
                                        <td><?php echo $row['complain_id']; ?></td>
                                        <td><?php echo $row['complain_text']; ?></td>
                                        <td><?php echo $row1['department_name']; ?></td>
                                        <td><?php echo $row2['state_name']; ?></td>
                                        <td><button><a href="../auth/deletecomplain.php?complain_id=<?php echo $row["complain_id"]?>">Delete</a></button></td>
                                    </tr>
                                <?php
                                }
                            }
                            else{
                                die("Error");
                            }
                        ?>
                    </table>
                </div>
            </div>
        </body>
        </html>
        <?php
    }
    else{
        header('location:../views/accessdenied.php');
        // echo 'error';
    }
?>