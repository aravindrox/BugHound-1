<?php
require "opendb.php";
$sqlquery="SELECT DISTINCT name FROM functional";
$data=  mysqli_query($conn,$sqlquery);

$functionalArea=array();

while($row= mysqli_fetch_array($data))
{
        array_push ($functionalArea, $row["name"]);
}
echo json_encode($functionalArea);

require "closedb.php";
?>