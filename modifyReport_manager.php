<?PHP
session_start();
if (!(isset($_SESSION['login_manager']) && $_SESSION['login_manager'] != '')) {
    header("Location: index.html");
}

/* @var $_POST type */
$_SESSION['bug_id'] = $_POST['bugID'];
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
        <link rel="stylesheet" href="assets/css/main.css"/>
    </head>

    <body>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'test');
        if (!$con) {
            die('Could not connect!' . mysqli_error());
        }
        mysqli_select_db($con, "test");

        $modify = "SELECT * FROM buginfo where BugID = '$_POST[bugID]'";
        $result = mysqli_query($con, $modify)or die(mysqli_error($con));


        while ($row = $result->fetch_assoc()) {
            ?>

            <form action="update_Manager.php" name="updateRep" onsubmit="return updateReportValidate()" method="post">
                <h2> Bug Report Update Page for ID: <?php echo $row['BugID']; ?></h2><br/>

                <b> Program</b> <select name="program" id="pgm" disabled="disabled"><?php echo '<option value="' . $row['ProgramName'] . '">' . $row['ProgramName'] . '</option>'; ?></select>
                <b> Release</b> <select name="release" id="rel" disabled="disabled"><?php echo '<option value="' . $row['Release'] . '">' . $row['Release'] . '</option>'; ?></select>
                <b> Version</b> <select name="version" id="ver" disabled="disabled"><?php echo '<option value="' . $row['Version'] . '">' . $row['Version'] . '</option>'; ?></select>
                <br><br><b> Report Type </b>
                <select name="reportType" id="reportType" disabled="disabled">
                    <?php echo '<option value="' . $row['ReportType'] . '">' . $row['ReportType'] . '</option>'; ?>
                    <option value="Coding Error"> Coding Error </option>
                    <option value="Design Issue"> Design Issue </option>
                    <option value="Suggestion"> Suggestion </option>
                    <option value="Documentation"> Documentation </option>
                    <option value="Hardware"> Hardware</option>
                    <option value="Query"> Query </option>
                </select>

                <b> Severity </b>
                <select name="severity" id="severity" disabled="disabled">
                    <?php echo '<option value="' . $row['Severity'] . '">' . $row['Severity'] . '</option>'; ?>
                    <option value="Fatal"> Fatal</option>
                    <option value="Severe"> Severe</option>
                    <option value="Minor"> Minor </option>
                </select><br/></br>

                <b>Problem Summary </b>
                <input type="text" name="probSummary" disabled="disabled" id="probSummary" value ="<?php echo "$row[ProblemSummary]" ?>" />

                <b> Reproducible?</b>
                <select name="reprod" id="reprod" disabled="disabled">
                    <?php echo '<option value="' . $row['Reproducible'] . '">' . $row['Reproducible'] . '</option>'; ?>

                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>

                <br><br><table><tr><td><b>Problem&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><br></td>
                        <td><textarea name="problem" disabled="disabled" id="problem" rows="2" cols="150"><?php echo "$row[Problem]" ?> </textarea></td></tr></table>

                <br><b><table><tr><td>Suggested Fix</b><br></td>
                            <td><textarea name="fix" disabled="disabled" id="fix" rows="2" cols="150"><?php echo "$row[SuggestedFix]" ?></textarea></td></tr></table>

                    <br><b>&nbsp;Reported by</b>
                    <select name="reportedBy" id="reportedBy" disabled="disabled">
                        <?php echo '<option value="' . $row['ReportedBy'] . '">' . $row['ReportedBy'] . '</option>'; ?>
                        <?php
                        $reportedBy = mysqli_query($con, "SELECT EmployeeID,EmployeeName FROM employees");
                        while (($row = mysqli_fetch_array($reportedBy)) != NULL) {
                            echo "<option value=" . $row['EmployeeName'] . ">" . $row['EmployeeID'] . "  " . $row['EmployeeName'] . "</option>";
                        }
                        ?>
                    </select>
                    <b>&nbsp;Date</b>
                    <input type="date" disabled="disabled" value="<?php echo date("Y-m-d"); ?>" name="dated">
                    <p align="center"><i>Items below are for use only by the development team</i></p>

                    <br/><br/><b>&nbsp;Functional Area</b>
                    <select name="functional" disabled="disabled">
                        <?php
                        echo '<option value=\"0\" selected> </option>';
                        $functional = mysqli_query($con, "SELECT name FROM functional");
                        while (($row = mysqli_fetch_array($functional)) != NULL) {
                            echo "<option value = " . $row['functionalid'] . " > " . $row['functionalname'] . "</option>";
                        }
                        ?>
                    </select>
                    <?php
                    echo "<b>&nbsp;Assigned To</b>";
                    ?>
                    <select name="assignedTo">
                        <option value="testing"> Testing </option>
                        <option value="Dev"> Devs </option>
                    </select>
                    <?php
                    echo "<br><br><b><table><tr><td> Comments <br/></b></td>";
                    echo '<td><textarea name="comments" rows="2" cols="150" disabled="disabled"> </textarea></td></tr></table>';

                    echo '<br><b>&nbsp;Status </b>';
                    echo '<select name="status" disabled="disabled">';
                    echo "</select>";
                    mysqli_close($con);
                    ?>
                    <b>Priority</b>
                    <select id="priority" name="priority">
                        <option value="Fix immediately">Fix immediately </option>
                        <option value="Fix as soon as possible">Fix as soon as possible</option>
                        <option value="Fix before next milestone">Fix before next milestone</option>
                        <option value="Fix before release">Fix before release </option>
                        <option value="Fix if possible">Fix if possible </option>
                        <option value="Optional">Optional</option>
                    </select>
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
                    <input type="submit" name="submitCreate" id="submitCreate"/>
                    <a href="manager_list.php">
                        <input type="button" value="Cancel" />
                    </a>
                    <script src="scripts/jquery-1.11.3.min.js"></script>
                    <script src="fetch.js"></script>
                    <script src="scripts/createReportValidate.js"></script>
                    <?php
                }
                ?>
        </form>
    </body>
</html>
