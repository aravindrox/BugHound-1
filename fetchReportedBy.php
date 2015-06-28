<?php

require "opendb.php";
$sqlquery = "SELECT DISTINCT EmployeeName FROM employees";
$data = mysqli_query($con, $sqlquery);

$reportedBy = array();

while ($row = mysqli_fetch_array($data)) {
    array_push($reportedBy, $row["EmployeeName"]);
}
echo json_encode($reportedBy);

require "closedb.php";
