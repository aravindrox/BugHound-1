<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.                                                                                                                                                             
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Bug Report</title>
        <link rel="stylesheet" href="assets/css/main.css"/>
    </head>
    <body>
        <form action="insertReport.php" name="createRep" onsubmit="return createRep()">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'test');
            if (!$con) {
                die('Could not connect!' . mysqli_error());
            }
            mysqli_select_db($con, "test");

            echo "<h2> New Bug Report Entry Page</h2><br/>";
            ?>
            <b> Program</b> <select id="pgm"><option value =""></option></select>
            <b> Release</b> <select id="rel"></select>
            <b> Version</b> <select id="ver"></select>
            <?php
            echo "<br><br><b> Report Type </b>";
            echo '<select name="reportType">';
            echo '<option value=\"rep7\" selected> </option>';
            echo '<option value=\"report1\"> Coding Error </option>';
            echo '<option value=\"report2\"> Design Issue </option>';
            echo '<option value=\"report3\"> Suggestion </option>';
            echo '<option value=\"report4\"> Documentation </option>';
            echo '<option value=\"report5\"> Hardware</option>';
            echo '<option value=\"report6\"> Query </option>';
            echo "</select>";

            echo "<b> Severity </b>";
            echo '<select name="severity">';
            echo '<option value=\"rep7\" selected> </option>';
            echo '<option value=\"sev1\"> Fatal</option>';
            echo '<option value=\"sev2\"> Severe</option>';
            echo '<option value=\"sev3\"> Minor </option>';
            echo "</select><br/></br>";

            echo "<b>Problem Summary </b>";
            echo '<input type="text" name="probSummary" id="probSummary" size="60">';

            echo "<b> Reproducible?</b>";
            echo '<input type="checkbox" name="yes">';

            echo "<br><br><table><tr><td><b>Problem&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><br></td>";
            echo '<td><textarea name="problem" rows="2" cols="150"> </textarea></td></tr></table>';

            echo "<br><b><table><tr><td>Suggested Fix</b><br></td>";
            echo '<td><textarea name="fix" rows="2" cols="150"> </textarea></td></tr></table>';

            echo "<br><b>&nbsp;Reported by</b>";
            echo '<select name="reportedby">';
            echo '<option value=\"rep7\" selected> </option>';
            $reportedBy = mysqli_query($con, "SELECT EmployeeID,EmployeeName FROM employees");
            while (($row = mysqli_fetch_array($reportedBy)) != NULL) {
                echo "<option value=\"p1\">" . $row['EmployeeID'] . "  " . $row['EmployeeName'] . "</option>";
            }
            echo "</select>";

            echo "<b>&nbsp;Date</b>";
            echo '<input type="date" name="date" />';
            ?>
            <p align="center"><i>Items below are for use only by the development team</i></p>
            <?php
            echo "<br/><br/><b>&nbsp;Functional Area</b>";
            ?>
            <select name="functional" disabled="disabled">
                <?php
                echo '<option value=\"0\" selected> </option>';
                $functional = mysqli_query($con, "SELECT name FROM functional");
                while (($row = mysqli_fetch_array($functional)) != NULL) {
                    echo "<option value = " . $row['id'] . " > " . $row['name'] . "</option>";
                }
                ?>
            </select>
            <?php
            echo "<b>&nbsp;Assigned To</b>";
            ?>
            <select name="assignedTo" disabled="disabled">
                <?php
                $assignedTo = mysqli_query($con, "SELECT EmployeeID,EmployeeName FROM employees");
                echo '<option value=\"rep7\" selected> </option>';

                while (($row = mysqli_fetch_array($assignedTo)) != NULL) {
                    echo "<option value=\"a1\">" . $row['EmployeeID'] . "  " . $row['EmployeeName'] . "</option>";
                }
                ?>

            </select>
            <?php
            echo "<br><br><b><table><tr><td> Comments <br/></b></td>";
            echo '<td><textarea name="comments" rows="2" cols="150" disabled="disabled"> </textarea></td></tr></table>';

            echo '<br><b>&nbsp;Status </b>';
            echo '<select name="status" disabled="disabled">';
            echo '<option value=\"s1\">Open</option>';
            echo '<option value=\"s2\">Closed </option>';
            echo "</select>";
            mysqli_close($con);
            ?>
            <b>Priority</b>
            <select id="priority" disabled="disabled"></select>
            <b>Resolution</b>
            <select id="resolution" disabled="disabled"></select>
            <b>Resolution Version</b>
            <select id="resolutionVersion" disabled="disabled"></select>
            <br><br><b>Resolved by</b>
            <select id="resolution" disabled="disabled"></select>
            <b>Date</b>
            <input type="date" name="dateSolved" disabled="disabled" />
            <b>Tested by</b>
            <select id="testedBy" disabled="disabled"></select>
            <b>Date</b>
            <input type="date" name="dateTested" disabled="disabled" />
            <b>Treated as deferred</b>
            <input type="checkbox" disabled="disabled"/>

            <br><br>
            <input type="submit" />
            <button type="reset" value="Reset">Reset</button>
            <a href="list.php">
                <input type="button" value="Cancel" />
            </a>
            <script src="scripts/jquery-1.11.3.min.js"></script>
            <script src="fetch.js"></script>
        </form>
    </body>
</html>
