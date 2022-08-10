<?php
    include_once '../connection/connection.php';
    session_start();
    unset($_SESSION['admin_id']);
    header('location:../index.php');
?>