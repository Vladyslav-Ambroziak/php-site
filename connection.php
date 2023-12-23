<?php

$database = new mysqli("127.0.0.1","root","","shop-db");

if ($database->connect_error)
    die("Connection failed:  ".$database->connect_error);


