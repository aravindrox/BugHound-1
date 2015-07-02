<?php
if(isset($_GET["name"]))
{
require "opendb.php";
$name=$_GET["name"];
$sqlquery="SELECT DISTINCT `name` FROM `functional` WHERE `p_name` = '$name'";
$data=  mysqli_query($conn,$sqlquery);
$rels=array();
while($row=mysqli_fetch_array($data))
{
        array_push ($rels, $row["name"]);
}
echo json_encode($rels);

require "closedb.php";
}
?>

