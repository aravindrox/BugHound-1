<?php
require "opendb.php";
$sqlquery="SELECT DISTINCT name FROM emp where designation='developer'";
$data=  mysqli_query($con,$sqlquery);

$assignedTo=array();

while($row= mysqli_fetch_array($data))
{
        array_push ($assignedTo, $row["name"]);
}
echo json_encode($assignedTo);

require "closedb.php";
?>