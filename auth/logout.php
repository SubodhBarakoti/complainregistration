<?php
    include_once '../connection/connection.php';
    session_start();
    session_destroy();
    header('location:../index.php');
?>