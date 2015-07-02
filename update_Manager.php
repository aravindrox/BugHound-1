<?php

session_start();
if (!(isset($_SESSION['login_manager']) && $_SESSION['login_manager'] != '')) {
    header("Location: index.html");
}
$bug = $_SESSION['bug_id'];

if (isset($_POST['submitCreate'])) {//if the submit button is clicked
    $conManager = mysqli_connect('localhost', 'root', '', 'test');
    if (!$conManager) {
        die('Could not connect!' . mysqli_error());
    }
    mysqli_select_db($conManager, "test");

    $assigned = $_POST['assignedTo'];
    $prior = $_POST['priority'];


  $updateManager = "UPDATE `buginfo` SET `AssignedTo`='$assigned', `Priority`='$prior' WHERE `BugID`='$bug'";

    $result = mysqli_query($conManager, $updateManager);
    if ($result == TRUE) {

        echo ("<SCRIPT>
    window.alert('Record updated successfully for ID '+$bug+' and routed to Dev team');
    window.location.href='manager_list.php';
    </SCRIPT>");
    } else {
        echo "Error: " . $updateManager . "<br>" . $conManager->error;
    }
    mysqli_close($conManager);
}
