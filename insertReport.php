<?php

session_start();

$con = mysqli_connect('localhost', 'root', '', 'test');
if (!$con) {
    die('Could not connect!' . mysqli_error());
}
mysqli_select_db($con, "test");
$sql = "INSERT INTO buginfo
        (`ProgramName`,
        `ReportType`,		
        `Severity`,
        `ProblemSummary`,
        `Reproducible`,
        `Problem`,
        `SuggestedFix`,
        `ReportedBy`,
        `ReportedDate`
        )
        VALUES
        ('$_POST[program]','$_POST[reportType]','$_POST[severity]','$_POST[probSummary]','$_POST[reprod]','$_POST[problem]','$_POST[fix]','$_POST[reportedBy]','$_POST[dated]')";
$result = mysqli_query($con, $sql);
if ($result == TRUE) {
    $last_id = mysqli_insert_id($con);
    echo ("<SCRIPT>
    window.alert($last_id+' : is the Bug ID')
    window.location.href='list.php';
    </SCRIPT>");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
mysqli_close($con);

