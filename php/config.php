<?php
$servername = "localhost";
$Myusername = "root";
$Mypassword = "";
$dbname = "blogg";
$conn = new mysqli($servername,$Myusername,$Mypassword,$dbname);
if ($conn -> connect_error){
    die("Connection failed, fix it boi" . $conn -> connect_error);
}
$sqldata = "CREATE DATABASE IF NOT EXISTS blogg";
   

        mysqli_select_db($conn, 'blogg'); 

        // sql to create table
        $sqlusertable = "CREATE TABLE IF NOT EXISTS inloggning (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL UNIQUE,
            passwrd VARCHAR(30) NOT NULL,
            reg_date DATETIME DEFAULT CURRENT_TIMESTAMP
            )";
   

        $sqldatatable = "CREATE TABLE IF NOT EXISTS posts (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(30) NOT NULL,
            maintext VARCHAR(255) NOT NULL,
            imagepath VARCHAR(255) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )";
     
?>