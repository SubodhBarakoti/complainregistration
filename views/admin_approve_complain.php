<?php
    include_once '../connection/connection.php';
    session_start();
    if(!empty($_SESSION['admin_id'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>View Complain</title>
            <link rel="stylesheet" href="../style.css">
        </head>
        <body>
            <div class="inlineblock">
                <div class="logout">
                    <button onclick="location.href='../auth/adminlogout.php';">Logout</button>
                </div>
                <div class="gotodashboard">
                    <button onclick="location.href='admindashboard.php';">Admin Dashboard</button>
                </div>
            </div>
            <div class="approval_State">
                State of Complain > Waiting for approval
            </div>
            <table>
                <tr>
                    <th>Complain Id</th>
                    <th>Complain Department</th>
                    <th>Complain Text</th>
                    <th>Accept Complain</th>
                    <th>Reject Complain</th>
                </tr>
                <tr>
                    <?php
                    if(isset($_GET['state_id'])){
                        $state_id = $_GET['state_id'];
                        $query="SELECT * FROM complain WHERE state_id = '$state_id'";
                        $result = mysqli_query($db_con,$query);
                        if($result){
                            while($row=mysqli_fetch_array($result)){
                                // code for fetching department name
                                $department_id=$row['department_id'];
                                $query1 = "SELECT * FROM department WHERE department_id = '$department_id'";
                                $result1 = mysqli_query($db_con,$query1);
                                $row1=mysqli_fetch_array($result1);

                                // code for fetching state name
                                // $state_id=$row['state_id'];
                                // $query2 = "SELECT * FROM state WHERE state_id = '$state_id'";
                                // $result2 = mysqli_query($db_con,$query2);
                                // $row2=mysqli_fetch_array($result2);
                                ?>
                                    <tr>
                                        <td><?php echo $row['complain_id']; ?></td>
                                        <td><?php echo $row1['department_name']; ?></td>
                                        <td><?php echo $row['complain_text']; ?></td>
                                        <td><a href="../auth/complainprocessing.php?complain_id=<?php echo $row['complain_id']; ?>&state_id=<?php echo $row['state_id'];?>&approval=accept">Accept</a></td>
                                        <td><a href="../auth/complainprocessing.php?complain_id=<?php echo $row['complain_id']; ?>&state_id=<?php echo $row['state_id'];?>&approval=reject">Reject</a></td>
                                    </tr>
                                <?php
                            }
                        }
                        else{
                            die("Error");
                        }
                    }
                    ?>
            </table>
        </body>
        </html>

        
        <?php
    }
    else{
        header('location:../views/accessdenied.php');
    }
?>