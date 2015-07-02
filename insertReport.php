<?php

session_start();
if ((!isset($_SESSION['login'])) && (!isset($_SESSION['login_client'])) && (!isset($_SESSION['login_manager'])) && (!isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
$con = mysqli_connect('localhost', 'root', '', 'testdatabase');
if (!$con) {
    die('Could not connect!' . mysqli_error());
}
mysqli_select_db($con, "testdatabase");
if ($_FILES['userfile']['size'] > 0) {
    $fileName = $_FILES['userfile']['name'];
    $tmpName = $_FILES['userfile']['tmp_name'];
    $fileSize = $_FILES['userfile']['size'];
    $fileType = $_FILES['userfile']['type'];

    $fp = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $contentUpdate = addslashes($content);
    fclose($fp);

    if (!get_magic_quotes_gpc()) {
        $fileName = addslashes($fileName);
    }

    $sql = "INSERT INTO buginfo
        (`ProgramName`,
        `Release_`,
        `Version`,
        `ReportType`,		
        `Severity`,
        `ProblemSummary`,
        `Reproducible`,
        `Problem`,
        `SuggestedFix`,
        `ReportedBy`,
        `ReportedDate`,
        `Status`,
        `FunctionalArea`,
        `AssignedTo`,
        `Priority`,
        `Resolution`,
        `ResolvedBy`,
        `Attachment`
        )
        VALUES
        ('$_POST[program]','$_POST[release]','$_POST[version]','$_POST[reportType]','$_POST[severity]','$_POST[probSummary]','$_POST[reprod]','$_POST[problem]','$_POST[fix]','$_POST[reportedBy]','$_POST[dated]','Open',' ',' ',' ',' ',' ','$contentUpdate')";
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
} else {
    $sql = "INSERT INTO buginfo
        (`ProgramName`,
        `Release_`,
        `Version`,
        `ReportType`,		
        `Severity`,
        `ProblemSummary`,
        `Reproducible`,
        `Problem`,
        `SuggestedFix`,
        `ReportedBy`,
        `ReportedDate`,
        `Status`,
        `FunctionalArea`,
        `AssignedTo`,
        `Priority`,
        `Resolution`,
        `ResolvedBy`        
        )
        VALUES
        ('$_POST[program]','$_POST[release]','$_POST[version]','$_POST[reportType]','$_POST[severity]','$_POST[probSummary]','$_POST[reprod]','$_POST[problem]','$_POST[fix]','$_POST[reportedBy]','$_POST[dated]','Open',' ',' ',' ',' ',' ')";
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
}
mysqli_close($con);

