<?php
require "opendb.php";
$sqlquery="SELECT DISTINCT program_name FROM functional";
$data=  mysqli_query($con,$sqlquery);

$pgms=array();

while($row= mysqli_fetch_array($data))
{
        array_push ($pgms, $row["functional_name"]);
}
echo json_encode($pgms);

require "closedb.php";
?>