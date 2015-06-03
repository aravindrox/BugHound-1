<?php
require "config.php";

$conn=mysqli_connect($host, $user, $password)
        or die("connection failed");
mysqli_select_db($conn, $database);
?>  