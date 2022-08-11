
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
            <title>Add Department</title>
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
            <div class="adddepartment">
                <div class="adddepartmentheading">
                    Add Department
                </div>
                <form action="../auth/departmentaddbackend.php" method="POST">
                    <input type="text" name="department_name" id="department_name" placeholder="Enter the department name"><br>
                    <input type="text" name="department_username" id="department_username" placeholder="Enter username for department"><br>
                    <input type="password" name="department_password" id="department_password" placeholder="Enter password for department"><br>
                    <input type="submit" value="Add" name="add" id="add">
                </form>
            </div>
            <div class="departmentshow">
                <div class="showdepartmentheading">
                    Show Departments
                </div>
                <table>
                    <tr>
                        <th>Department Name</th>
                        <th>Department Username</th>
                        <th>Department Password</th>
                    </tr>
                    <?php
                        include_once '../connection/connection.php';
                        $query="SELECT * FROM department";
                        $result=mysqli_query($db_con,$query);
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row['department_name']."</td>";
                            echo "<td>".$row['department_username']."</td>";
                            echo "<td>".$row['department_password']."</td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
        </body>
        </html>

        
        <?php
    }
    else{
        header('location:../views/accessdenied.php');
    }
?>