<?php
session_start();

global $database;
include 'connection.php';

if (isset($_POST["go-to-sign-up"])) {
    $listUsers = $database->query("SELECT * FROM `users`");
    $newUserUsername = htmlentities($_POST["create-user-name"]);
    $newUserLogin = htmlentities($_POST["create-user-login"]);
    $newUserPassword = htmlentities($_POST["create-user-password"]);

    foreach ($listUsers as $user) {
        if ($user["Username"] === $newUserUsername) {
            header("location: index.php");
        }
        if ($user["Login"] === $newUserLogin) {
            header("location: index.php");
        }

        $database->query("INSERT INTO `users`(`Username`, `Login`, `Password`) VALUES ('$newUserUsername','$newUserLogin','$newUserPassword')");
        $user = $database->query("SELECT * FROM `users` WHERE `Username` = '$newUserUsername'");
        $_SESSION['user'] = $user;
        header("location: user/index.php");
    }
}