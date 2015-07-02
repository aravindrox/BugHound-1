<?php
require "opendb.php";
$sqlquery="SELECT DISTINCT p_name FROM functional";
$data=  mysqli_query($conn,$sqlquery);

$pgms=array();

while($row= mysqli_fetch_array($data))
{
        array_push ($pgms, $row["p_name"]);
}
echo json_encode($pgms);

require "closedb.php";
?>