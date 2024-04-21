<?php

include("./connection.php");
session_start();

session_destroy();
header("Refresh:0,url=./auth-login.php");

?>