<?php
session_start();

global $database;
include 'connection.php';

if(isset($_POST["go-to-sign-in"])){
    $userLogin = htmlentities($_POST["user-login"]);
    $userPassword = htmlentities($_POST["user-password"]);

    $checkUser = $database->query("SELECT * FROM `users` WHERE `Login` = '$userLogin' AND `Password` = '$userPassword'");

    if ($checkUser->num_rows === 1){

        $_SESSION['user'] = mysqli_fetch_assoc($checkUser);
//        var_dump($_SESSION['user']);
        header("location: user/index.php");
    }
    else{
        header("location: authorization.php");
    }
}