<?php
if(isset($_GET["name"]))
{
require "opendb.php";
$name=$_GET["name"];
$sqlquery="SELECT DISTINCT `functionalname` FROM `functional` WHERE `program_name` = '$name'";
$data=  mysqli_query($con,$sqlquery);
$rels=array();
while($row=mysqli_fetch_array($data))
{
        array_push ($rels, $row["program_name"]);
}
echo json_encode($rels);

require "closedb.php";
}
?>

