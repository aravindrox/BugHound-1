<?php

session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    header("Location: index.html");
}
$bug = $_SESSION['bug_id'];

if (isset($_POST['submitCreate'])) {//if the submit button is clicked
    $con = mysqli_connect('localhost', 'root', '', 'test');
    if (!$con) {
        die('Could not connect!' . mysqli_error());
    }
    mysqli_select_db($con, "test");

    $Pname = $_POST['program'];
    $rele = $_POST['release'];
    $vers = $_POST['version'];
    $rtype = $_POST['reportType'];
    $sever = $_POST['severity'];
    $psumm = $_POST['probSummary'];
    $rep = $_POST['reprod'];
    $prob = $_POST['problem'];
    $fix = $_POST['fix'];
    $repBy = $_POST['reportedBy'];
    $dateMod = $_POST['dated'];

    $update = "UPDATE `buginfo` SET `ProgramName`='$Pname', `Release_`='$rele', `Version`='$vers', `ReportType`= '$rtype', `Severity` = '$sever', `ProblemSummary`='$psumm', `Reproducible`='$rep', `Problem`='$prob', `SuggestedFix`='$fix', `ReportedBy`='$repBy', `ReportedDate`='$dateMod' WHERE BugID='$bug'";
    $result = mysqli_query($con, $update);
    if ($result == TRUE) {

        echo ("<SCRIPT>
    window.alert('Record updated successfully for ID '+$bug);
    window.location.href='list.php';
    </SCRIPT>");
    } else {
        echo "Error: " . $update . "<br>" . $con->error;
    }
    mysqli_close($con);
}
