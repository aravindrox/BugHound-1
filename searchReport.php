<?php
session_start();
if (!(isset($_SESSION['login_client']))) {
    header("Location: index.html");
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Bug Report</title>
        <link rel="stylesheet" href="assets/css/main.css"/>
    </head>
    <body>
        <form action="searchResults.php" name="searchRep" method="post">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'test');
            if (!$con) {
                die('Could not connect!' . mysqli_error());
            }
            mysqli_select_db($con, "test");
            ?>
            <h2>Please select at least one from the below</h2>
            <b> Program&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
            <select name="program" id="pgm" >
                <option selected="selected" value="all">All</option>
            </select>

            <br><br><b> Report Type &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
            <select name="reportType" id="reportType">
                <option selected="selected" value="all">All</option>
                <option value="Coding Error"> Coding Error </option>
                <option value="Design Issue"> Design Issue </option>
                <option value="Suggestion"> Suggestion </option>
                <option value="Documentation"> Documentation </option>
                <option value="Hardware"> Hardware</option>
                <option value="Query"> Query </option>
            </select>

            <br><br><b> Severity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
            <select name="severity" id="severity">
                <option selected="selected" value="all">All</option>
                <option value="Fatal"> Fatal</option>
                <option value="Severe"> Severe</option>
                <option value="Minor"> Minor </option>
            </select>

            <br><br> <b> Functional Area &nbsp;</b> 
            <select name="functionalArea" id="functionalArea"> 
                <option selected="selected" value="all">All</option>
            </select>
            
            <br><br> <b> Assigned To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
            <select name="assignedTo" id="assignedTo"> 
                <option selected="selected" value="all">All</option>
            </select>

            <br><br><b> Status&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
            <select name="status" id="status">
                <option selected="selected" value="all">All</option>
                <option value="open"> open </option>
                <option value="closed"> closed </option>
            </select>

            <br><br><b> Priority &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
            <select name="priority" id="priority">
                <option selected="selected" value="all">All</option>
                <option value="fixImmediately"> fix Immediately </option>
                <option value="fixAsap"> fix Asap </option>
                <option value="fixBeforeNextMileStone"> fix Before Next Mile Stone </option>
                <option value="fixBeforeRelease"> fix Before Release </option>
                <option value="fixIfPossible"> fix If Possible</option>
                <option value="optional"> optional </option>
            </select>

            <br><br><b> Resolution &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
            <select name="resolution" id="resolution">
                <option selected="selected" value="all">All</option>
                <option value="pending"> pending </option>
                <option value="fixed"> fixed</option>
                <option value="irreproducible"> Irreproducible </option>
                <option value="defferred"> deferred </option>
                <option value="asDesigned"> As Designed</option>
                <option value="withdrawnByReporter"> Withdrawn By Reporter </option>
                <option value="needMoreInfo"> Need more info </option>
                <option value="disagreeWithSuggestion">Disagree with suggestion</option>
                <option value="duplicate"> Duplicate </option>
            </select>

            <br><br> <b> Reported by&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> 
            <select name="reportedBy" id="reportedBy"> 
                <option selected="selected" value="all">All</option>
            </select>

            <br><br> <b>Report Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
            <input type="date" id="reportDate" name="reportDate" />

            <br><br> <b> Resolved by&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
            <select name="resolvedBy" id="resolvedBy">
                <option selected="selected" value="all">All</option></option>
            </select>

            <br><br> <input type="submit" name="submitCreate"/>
            <button type="reset" value="Reset">Reset</button>

            <script src="scripts/jquery-1.11.3.min.js"></script>
            <script src="fetch.js"></script>
        </form>
    </body>
</html>




