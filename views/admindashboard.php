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
                <title>Admin Dashboard</title>
                <link rel="stylesheet" href="../style.css">
            </head>
            <body>
                <div class="logout">
                    <button onclick="location.href='../auth/adminlogout.php';">Logout</button>
                </div><br><br><br><br>
                <div id="departmentadd">
                    <button onclick="location.href='showdepartment.php';">Add department</button>
                </div>
                <div class="heading">
                    Admin Dashboard > State of Complains
                </div>
                <div class="adminpage">
                    <div id="seeunapprovedcomplain" onclick="location.href='admin_approve_complain.php?state_id=1';">
                        See Unapproved Complains
                    </div>
                    <div id="seeapprovedcomplain" onclick="location.href='admin_view_complain.php?state_id=2';">
                        See Approved Complains
                    </div>
                    <div id="inprogresscomplain" onclick="location.href='admin_view_complain.php?state_id=3';">
                        See Inprogress Complains
                    </div>
                    <div id="completedcomplain" onclick="location.href='admin_view_complain.php?state_id=4';">
                        See Completed Complains
                    </div>
                    <div id="rejectedcomplain" onclick="location.href='admin_view_complain.php?state_id=5';">
                        See Rejected Complains
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