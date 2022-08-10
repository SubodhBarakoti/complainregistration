<!--code for databse connection
 -->
<?php
    $db_con = mysqli_connect("localhost","root","","complain_registration") or die("Error: " . mysqli_error($db_con));
?>