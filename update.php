<?php

session_start();
if ((!isset($_SESSION['login'])) && (!isset($_SESSION['login_manager'])) && (!isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
$bug = $_SESSION['bug'];

if (isset($_POST['submitCreate'])) {//if the submit button is clicked
    $conManager = mysqli_connect('localhost', 'root', '', 'testdatabase');
    if (!$conManager) {
        die('Could not connect!' . mysqli_error());
    }
    mysqli_select_db($conManager, "testdatabase");
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
    }
    $program = $_POST['program'];
    $release = $_POST['release'];
    $version = $_POST['version'];
    $reportType = $_POST['reportType'];
    $severity = $_POST['severity'];
    $probSummary = $_POST['probSummary'];
    $reprod = $_POST['reprod'];
    $problem = $_POST['problem'];
    $fix = $_POST['fix'];
    $reportedBy = $_POST['reportedBy'];
    $dated = $_POST['dated'];
    if (isset($_SESSION['login_manager'])) {
        $prior = $_POST['priority'];
        $assigned = $_POST['assignedTo'];
        $stat = $_POST['status'];
    }
    $func = $_POST['functional'];
    $comm = $_POST['comments'];
    if (!isset($_SESSION['login_manager'])) {
        if (isset($_SESSION['login_dev'])) {
            $res = $_POST['resolution'];
            $resv = $_POST['resolutionVersion'];
            $resB = $_POST['resolutionBy'];
            $dateSol = '';
            $tested = '';
            $testedDate = '';
            $isDefer = '';
        } else {
            $res = '';
            $resv = '';
            $resB = '';
            $dateSol = $_POST['dateSolved'];
            $tested = $_POST['testedBy'];
            $testedDate = $_POST['dateTested'];
            $isDefer = $_POST['defer'];
        }
    }

    if (isset($_SESSION['login_manager'])) {
        if ($_FILES['userfile']['size'] > 0) {
            $updateManager = "UPDATE `buginfo` SET `Attachment`='$contentUpdate',`TestedBy`='NULL',`TestedDate`='NULL',`TreatAsDeffered`='NULL',`ProgramName`='$program',`release_`='$release',`version`='$version',`ReportType`='$reportType', `Severity`='$severity',`ProblemSummary`='$probSummary', `Reproducible`='$reprod',`problem`='$problem',`SuggestedFix`='$fix',`ReportedBy`='$reportedBy', `ReportedDate`='$dated',`AssignedTo`='$assigned', `Priority`='$prior', `FunctionalArea`='$func', `Comments`='$comm', `Status`='$stat' WHERE `BugID`='$bug'";
        } else {
            $updateManager = "UPDATE `buginfo` SET `TestedBy`='NULL',`TestedDate`='NULL',`TreatAsDeffered`='NULL',`ProgramName`='$program',`release_`='$release',`version`='$version',`ReportType`='$reportType', `Severity`='$severity',`ProblemSummary`='$probSummary', `Reproducible`='$reprod',`problem`='$problem',`SuggestedFix`='$fix',`ReportedBy`='$reportedBy', `ReportedDate`='$dated',`AssignedTo`='$assigned', `Priority`='$prior', `FunctionalArea`='$func', `Comments`='$comm', `Status`='$stat' WHERE `BugID`='$bug'";
        }
    } else {
        $updateManager = "UPDATE `buginfo` SET `TestedBy`='$tested',`TestedDate`='$testedDate',`TreatAsDeffered`='$isDefer',`ProgramName`='$program',`release_`='$release',`version`='$version',`ReportType`='$reportType', `Severity`='$severity',`ProblemSummary`='$probSummary', `Reproducible`='$reprod',`problem`='$problem',`SuggestedFix`='$fix',`ReportedBy`='$reportedBy', `ReportedDate`='$dated',`AssignedTo`='', `FunctionalArea`='$func', `Comments`='$comm', `Status`='', `Resolution`='$res', `ResolutionVersion`='$resv', `ResolvedBy`='$resB', `ResolvedDate`='$dateSol' WHERE `BugID`='$bug'";
    }
    $result = mysqli_query($conManager, $updateManager);
    if ($result == TRUE) {

        echo ("<SCRIPT>
    window.alert('Record updated successfully for ID '+$bug);
    window.location.href='list.php';
    </SCRIPT>");
    } else {
        echo "Error: " . $updateManager . "<br>" . $conManager->error;
    }
    mysqli_close($conManager);
}
