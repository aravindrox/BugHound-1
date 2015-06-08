<?php

session_start();
if (!(isset($_SESSION['login_dev']) && $_SESSION['login_dev'] != '')) {
    header("Location: index.html");
}
$bug = $_SESSION['bug_id'];

if (isset($_POST['submitCreate'])) {//if the submit button is clicked
    $conManager = mysqli_connect('localhost', 'root', '', 'test');
    if (!$conManager) {
        die('Could not connect!' . mysqli_error());
    }
    mysqli_select_db($conManager, "test");

    $func = $_POST['functional'];
    $comm = $_POST['comments'];
    $stat = $_POST['status'];
    $res = $_POST['resolution'];
    $resv = $_POST['resolutionVersion'];
    $resB = $_POST['resolutionBy'];
    $dateSol = $_POST['dateSolved'];


  $updateManager = "UPDATE `buginfo` SET `FunctionalArea`='$func', `Comments`='$comm', `Status`='$stat', `Resolution`='$res', `ResolutionVersion`='$resv', `ResolvedBy`='$resB', `ResolvedDate`='$dateSol' WHERE `BugID`='$bug'";

    $result = mysqli_query($conManager, $updateManager);
    if ($result == TRUE) {

        echo ("<SCRIPT>
    window.alert('Record updated successfully for ID '+$bug+' and routed to Testing team');
    window.location.href='dev_list.php';
    </SCRIPT>");
    } else {
        echo "Error: " . $updateManager . "<br>" . $conManager->error;
    }
    mysqli_close($conManager);
}


