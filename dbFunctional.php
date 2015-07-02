<?php
if (isset($_GET['delete_func']) && $_GET['functional']) {
    $name = $_GET['functional'];
    require 'opendb.php';
    $query = mysqli_query($conn, "DELETE FROM `functional` WHERE `name`='$name'");
    require 'closedb.php';
}
if (isset($_GET['delete1_func']) && $_GET['functional_name'] && $_GET['program_name']) {
    $name = $_GET['program_name'];
    $func = $_GET['functional_name'];
    require 'opendb.php';
    $query = mysqli_query($conn, "DELETE FROM `functional` WHERE `p_name`='$name' AND `name`='$func'");
    require 'closedb.php';
}
if (isset($_GET['fa_insert']) && $_GET['fa_name'] && $_GET['p_name']) {
    $name = $_GET['fa_name'];
    $p_name = $_GET['p_name'];
    require 'opendb.php';
    $query = mysqli_query($conn, "INSERT INTO `testdatabase`.`functional` (`id`,`p_name`, `name`) VALUES ('NULL','$p_name', '$name');");
    require 'closedb.php';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>

            function validateForm3() {
                var x = document.forms["func_reset"]["fa_name"].value;
                var y = document.forms["func_reset"]["p_name"].value;
                if (x == null || x == "" || y == null || y == "") {
                    alert("Field cannot be blank");
                }
            }

        </script>
    </head>
    <body bgcolor="#FFFF00">
        <b>List existing functional areas</b>
<?php
require 'opendb.php';
echo '<table border=1>
        <tr>
        <th>id</th>
        <th>p_id</th>
        <th>name</th>
        </tr>';
$query = mysqli_query($con, "SELECT * FROM `functional`;");
while ($row = mysqli_fetch_array($query)) {
    echo '<tr>';
    echo '<td>' . $row['functionalid'] . '</td>';
    echo '<td>' . $row['program_name'] . '</td>';
    echo '<td>' . $row['functionalname'] . '</td>';
    echo '</tr>';
}
echo "</table>";
require 'closedb.php';
?> </br>

        <b>Delete an existing functional area</b>
        <form action="index3.php" method="GET">
        <?php
        require 'opendb.php';
        $query = mysqli_query($con, "SELECT * FROM `functional`;");
        echo "<select name='functional' style='width:100px;'>";
        while ($row = mysqli_fetch_array($query)) {
            echo "<option value='" . $row['program_name'] . "'>" . $row['program_name'] . "</option>";
        }
        echo "</select>";
        ?>      
            <input type="submit" id="delete_func" name="delete_func" value="delete">
        </form>
        <b>Insert a new functional area</b>
        <form action="index3.php" method="GET" id="func_reset" onsubmit="validateForm3()">
<?php
require 'opendb.php';
$query = mysqli_query($con, "SELECT DISTINCT `name` FROM `pgms`;");
echo "<select name='p_name' style='width:100px;'>";
while ($row = mysqli_fetch_array($query)) {
    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
}
echo "</select>";
require 'closedb.php';
?>
            <input type="text" id="fa_name" name="fa_name" size="10">
            <input type="submit" id="fa_insert" name="fa_insert" value="insert" size="10">
            <input type="button" onclick="myFunction()" value="Reset">
        </form>

        <b>Insert a new functional area</b>  
        <form action="index3.php" method="GET">
            <b> Program</b> <select id="pgm2" name="program_name"></select>
            <b> Func Area</b> <select id="func1" name="functional_name"></select>
            <br>       
            <input type="submit" id="delete1_func" name="delete1_func" value="delete">
        </form> 

        <script src="jquery-1.11.3.min.js"></script>
        <script src="fetch3.js"></script>
        <script>
                function myFunction() {
                    document.getElementById("func_reset").reset();
                }
        </script>    
    </body>
</html>



