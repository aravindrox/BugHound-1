<?php
session_start();

if (!(isset($_SESSION['login_manager']))) {
    header("Location: index.html");
}
?>
<?php
if ((filter_input(INPUT_POST, 'delete_emp')) && filter_input(INPUT_POST, 'empId')) {
    $con = mysqli_connect('localhost', 'root', '', 'testdatabase');
    if (!$con) {
        die('Could not connect!' . mysqli_error());
    }
    mysqli_select_db($con, "testdatabase");
    $empid = filter_input(INPUT_POST, 'empId');
    $query = mysqli_query($con, "DELETE FROM `employees` WHERE `EmployeeID`=$empid");
}

if (isset($_POST['insert_emp']) && $_POST['empId'] && $_POST['pass'] && $_POST['empname'] && $_POST['designation']) {
    $empid = $_POST['empId'];
    $name = $_POST['empname'];
    $empPass = $_POST['pass'];
    $designation = $_POST['designation'];
    $con = mysqli_connect('localhost', 'root', '', 'testdatabase');
    if (!$con) {
        die('Could not connect!' . mysqli_error());
    }
    mysqli_select_db($con, "testdatabase");
    $query = mysqli_query($con, "INSERT INTO `employees` (`EmployeeID`, `EmployeeName`, `Password`,`designation`) VALUES ('$empid', '$name', '$empPass', '$designation');");
    if ($query === TRUE) {
        echo ("<SCRIPT>
    window.alert($empid+' : succefully inserted');
        </SCRIPT>");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Employee maintenance</title>
        <link rel="stylesheet" href="assets/css/main.css"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script>
            $(function () {
                $('#empname').keydown(function (e) {
                    if (e.shiftKey || e.ctrlKey || e.altKey) {
                        e.preventDefault();
                    } else {
                        var key = e.keyCode;
                        if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                            e.preventDefault();
                        }
                    }
                });
            });
        
        </script>
    </head>
    <body>
        <b>List of existing employees</b>
        <p align="center"><b><a href="list.php">Back</a></b></p>
        <p align="center"><b><a href="logout.php">Logout</a></b></p>
        <?php
        echo '<table border=1>
        <tr>
        <th>id</th>
        <th>name</th>
        <th>designation</th>
        </tr>';
        $con = mysqli_connect('localhost', 'root', '', 'testdatabase');
        if (!$con) {
            die('Could not connect!' . mysqli_error());
        }
        mysqli_select_db($con, "testdatabase");
        $query = mysqli_query($con, "SELECT * FROM `employees`;");
        while ($row = mysqli_fetch_array($query)) {
            echo '<tr>';
            echo '<td>' . $row['EmployeeID'] . '</td>';
            echo '<td>' . $row['EmployeeName'] . '</td>';
            echo '<td>' . $row['designation'] . '</td>';
            echo '</tr>';
        }
        echo "</table>";
        require 'closedb.php';
        ?> 

        <br><b>Delete an existing employee</b>

        <form action="dbEmp.php" method="POST">
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'testdatabase');
            if (!$con) {
                die('Could not connect!' . mysqli_error());
            }
            mysqli_select_db($con, "testdatabase");
            $query = mysqli_query($con, "SELECT * FROM `employees`");
            echo "<select name='empId' style='width:100px;'>";
            echo '<option value="select">Select</option>';
            while ($row = mysqli_fetch_array($query)) {
                echo "<option value='" . $row['EmployeeID'] . "'>" . $row['EmployeeID'] . "</option>";
            }
            echo "</select>";
            ?>      
            <input type="submit" id="delete_emp" name="delete_emp" value="delete">
        </form>
        <b>Insert a new employee</b>
        <form action="dbEmp.php" method="POST" name="emp_insert" onsubmit="validateForm()">
            <table>
                <tr>Employee ID: </tr>
                <tr><input type="number" name="empId" min="100" max="999" required="required">

                <tr>&nbsp;Employee Name: &nbsp;</tr>
                <tr><input type="text" name="empname" id="empname" size="10" required="required"> </tr>

                <tr>&nbsp;Employee Password: &nbsp;<input type="password" name="pass" required="required"></tr>                

                <tr>&nbsp; Employee Designation 
                <select name="designation" required="required">
                    <option value="Client">Client</option>
                    <option value="Tester">Tester</option>
                    <option value="Developer">Developer</option>
                    <option value="Manager">Manager</option> </tr>
                </select> <br>
            </table>
            <input type="submit" name="insert_emp" id="insert_emp" value="Add">
            <input type="button" value="Reset">

        </form>

        <script src="jquery-1.11.3.min.js"></script>
        <script src="fetch1.js"></script>
        <script src="fetch2.js"></script>  
    </body>
</html>

