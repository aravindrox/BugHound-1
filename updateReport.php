<?php
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
    header("Location: index.html");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Bug Report</title>
        <link rel="stylesheet" href="assets/css/main.css"/>

    </head>
    <body>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'test');
        if (!$con) {
            die('Could not connect!' . mysqli_error());
        }
        mysqli_select_db($con, "test");

        $maximumID = "SELECT MAX(BugID) as maxid from `buginfo`";
        $result1 = mysqli_query($con, $maximumID)or die(mysqli_error($con));
        $row1 = mysqli_fetch_array($result1);
        ?>
            <h2> Update Bug report </h2><br><br>    
            <form name="updateRep" action="modifyReport.php" method="POST">
                <b>Enter Bug ID: </b>
                <input type="number" size="4" min="1000" max="<?php echo $row1["maxid"]; ?>" name="bugID" required="required"/><br><br>
                <input type="submit" name="submitCreate" id="submitCreate"/>
                <button type="reset" value="Reset">Reset</button>
            </form>
    </body>
</html>
