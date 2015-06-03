<?php
session_start();
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
        <title>Bug Hound Login Page</title>
    </head>
    <body>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'test');
        if (!$con) {
            die('Could not connect ' . mysqli_connect_error());
        }

        mysqli_select_db($con, "test");

        $query = mysqli_query($con, "select *  from `userlist` where user = '" . filter_input(INPUT_POST, 'username') . "' AND password = '" . filter_input(INPUT_POST, 'pass') . "'");
        $row = mysqli_num_rows($query);
        if ($row == 1) {
            $_SESSION['login'] = filter_input(INPUT_POST, 'username'); // initializing the session
            header("location: list.php");
        } else {
            echo "YOU ENTERD WRONG ID/PASSWORD. PLEASE RETRY!";
        }
        mysqli_close($con);
        ?>
    </body>
</html>
