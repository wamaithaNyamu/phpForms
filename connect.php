<?php
 $host = "localhost";
 $dbUsername = "root";
 $dbPassword = "";
 $dbname = "usiuinvest";
 $conn = mysqli_connect($host, $dbUsername, $dbPassword,$dbname);

 if(!$conn){
     die('Could not connect to the Database' .mysqli_error());
 }

 
