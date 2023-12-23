<?php
session_start();

if(isset($_POST["btn-log-out"])){
    unset($_SESSION['user']);
    header("location: ../authorization.php");
}
