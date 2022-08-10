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
            </div>
            <div id="departmentadd">
                <button onclick="location.href='showdepartment.php';">Add department</button>
            </div>
            <div id="seeunapprovedcomplain">
                <button onclick="location.href='admin_approve_complain.php?state_id=1';">See Unapproved Complains</button>
            </div>
            <div id="seeapprovedcomplain">
                <button onclick="location.href='admin_view_complain.php?state_id=2';">See Approved Complains</button>
            </div>
            <div id="inprogresscomplain">
                <button onclick="location.href='admin_view_complain.php?state_id=3';">See Inprogress Complains</button>
            </div>
            <div id="completedcomplain">
                <button onclick="location.href='admin_view_complain.php?state_id=4';">See Completed Complains</button>
            </div>
            <div id="rejectedcomplain">
                <button onclick="location.href='admin_view_complain.php?state_id=5';">See Rejected Complains</button>
            </div>
            </body>
            </html>
        <?php
    }
    else{
        header('location:../views/accessdenied.php');
    }
?>