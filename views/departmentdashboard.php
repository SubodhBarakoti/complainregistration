<?php
    include_once '../connection/connection.php';
    session_start();
    if(isset($_SESSION['department_id'])){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Department Dashboard</title>
                <link rel="stylesheet" href="../style.css">
            </head>
            <body>
                <div class="logout">
                    <button onclick="location.href='../auth/departmentlogout.php';">Logout</button>
                </div><br><br><br><br>
                <div class="heading">
                    Department Dashboard > State of Complains
                </div>
                <div class="departmentpage">
                    <div id="unprocessedcomplain" onclick="location.href='department_approve_complain.php?state_id=2';">
                        See Unprocessed Complains
                    </div>
                    <div id="processingcomplain" onclick="location.href='department_approve_complain.php?state_id=3';">
                        See Procressing Complains
                    </div>
                    <div id="processedcomplain" onclick="location.href='department_view_processed_complain.php?state_id=4';">
                        See Processed Complains
                    </div>
                </div>
            </body>
            </html>
        <?php
    }
    else{
        header('location:../views/accessdenied.php');
    }
?>