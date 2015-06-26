<?php
if(isset($_GET["name"]) and isset($_GET["release"]))
{
require "opendb.php";

$name=$_GET["name"];
$release=$_GET["release"];

$sqlquery="SELECT DISTINCT `version` FROM `pgms` WHERE `name` = '$name' AND `release` = $release";
$data=  mysqli_query($con,$sqlquery);

$vers=array();

while($row= mysqli_fetch_array($data))
{
        array_push ($vers, $row["version"]);
}
echo json_encode($vers);

require "closedb.php";
}
?>

