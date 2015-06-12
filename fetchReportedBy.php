<?php
require "opendb.php";
$sqlquery="SELECT DISTINCT name FROM emp where designation='tester'";
$data=  mysqli_query($conn,$sqlquery);

$reportedBy=array();

while($row= mysqli_fetch_array($data))
{
        array_push ($reportedBy, $row["name"]);
}
echo json_encode($reportedBy);

require "closedb.php";
?>