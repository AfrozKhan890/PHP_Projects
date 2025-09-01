<?php
    include_once("connection.inc.php");
    session_destroy();
    session_unset();
    // session_start();
    header("location:login.php");
?>