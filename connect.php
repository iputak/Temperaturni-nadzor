<?php
$MyUsername = "root";  // enter your username for mysql
$MyPassword = "";  // enter your password for mysql
$MyHostname = "localhost";      // this is usually "localhost" unless your database resides on a different server
$MyDatabase = "cistimir_temperatura";

$conn = mysqli_connect($MyHostname , $MyUsername, $MyPassword, $MyDatabase);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}

?>