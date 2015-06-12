<?php

session_start();

$con = mysqli_connect('localhost', 'root', '', 'testdatabase');
if (!$con) {
    die('Could not connect!' . mysqli_error());
}

 $program=filter_input(INPUT_POST, 'program') ;
 $reportType=filter_input(INPUT_POST, 'reportType');
 $severity=filter_input(INPUT_POST, 'severity');
 $functionalArea=filter_input(INPUT_POST, 'functionalArea');
 $assignedTo=filter_input(INPUT_POST, 'assignedTo');
 $status=filter_input(INPUT_POST, 'status');
 $priority=filter_input(INPUT_POST, 'priority');
 $resolution=filter_input(INPUT_POST, 'resolution');
 $reportedBy=filter_input(INPUT_POST, 'reportedBy');
 $reportedDate=filter_input(INPUT_POST, 'reportDate');
 $resolvedBy=filter_input(INPUT_POST, 'resolvedBy');
 
 



if($program=="all")
{
    $program="%";
}
// echo "program:  $program";
 

if($reportType=="all")
{
    $reportType="%";
} 
//echo "reportType:  $reportType";

if($severity=="all")
{
    $severity="%";
} 
//echo "severity:  $severity";

if($functionalArea=="all")
{
    $functionalArea="%";
} 
//echo "Functional area :  $functionalArea";

if($assignedTo=="all")
{
    $assignedTo="%";
} 
//echo "assigned to:  $assignedTo";

if($status=="all")
{
    $status="%";
} 
//echo "status:   $status";
if($priority=="all")
{
    $priority="%";
} 
//echo "Priority :  $priority";

if($resolution=="all")
{
    $resolution="%";
} 
//echo "resolution:  $resolution";

if($reportedBy=="all")
{
    $reportedBy="%";
} 
//echo "reported by:  $reportedBy";

if($reportedDate==NULL)
{
    $reportedDate="%";
} 
//echo "reported date :  $reportedDate";



if($resolvedBy=="all")
{
    $resolvedBy="%";
} 
//echo "resolved by :   $resolvedBy";





mysqli_select_db($con, "testdatabase");
$sql = sprintf( "SELECT * FROM `buginfo` WHERE `ProgramName` LIKE '%s' AND `ReportType` LIKE '%s' AND
`Severity` LIKE '%s' AND `FunctionalArea` LIKE '%s' AND `AssignedTo` LIKE '%s' AND
`Status` LIKE '%s' AND `Priority` LIKE '%s' AND `Resolution` LIKE '%s' AND
`ReportedBy` LIKE '%s' AND `ReportedDate` LIKE '%s' AND `ResolvedBy` LIKE '%s'",
        
        mysql_real_escape_string($program),
        mysql_real_escape_string($reportType),
        mysql_real_escape_string($severity),
        mysql_real_escape_string($functionalArea),
        mysql_real_escape_string($assignedTo),
        mysql_real_escape_string($status),
        mysql_real_escape_string($priority),
        mysql_real_escape_string($resolution),
        mysql_real_escape_string($reportedBy),
        mysql_real_escape_string($reportedDate),
        mysql_real_escape_string($resolvedBy));
      


    /*    ProgramName= $program,
        ReportType=$reportType,		
        Severity=$severity,
        FunctionalArea=$functionalArea,
        AssignedTo=$assignedTo,
        Status=$status,
        Priority=$priority,
        resolution=$resolution,
        ReportedBy=$reportedBy,
        ReportedDate=$reportDate,
        ResolvedBy=$resolvedBy
       ";
     * 
     * 
     */


$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
        echo " id: " . $row["BugID"].  "<br> <br>";
        
        print( '<a href="http://localhost/bughound/BugHound/updateReport.php?BugID= $row["BugID"]."> .$row["BugID"].</a>' ); 
    }
} else {
    echo "0 results";
}
mysqli_close($con);



