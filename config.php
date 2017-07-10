<?php
/* ---------F5buddy----------*/
/* ---contact@f5buddy.com----*/


$host = "localhost";    /* You Host name */
$user = "root";         /* Database User */
$password = "";         /* Database Password */
$dbname = "yourdatabane";   /* Database name */

// Create connection
$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
    die("Error to Connection: " . mysqli_connect_error());
}

