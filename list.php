<?PHP
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
        <title>Welcome Tester</title>
        <script type = "text/javascript" >
            history.pushState(null, null, 'list.php');
            window.addEventListener('popstate', function (event) {
                history.pushState(null, null, 'list.php');
            });
        </script>
    </head>
    <body>
        <h2>Bug Hound</h2>
        <h3>Welcome Tester</h3> <a href="logout.php">Logout</a>
        <ul>
            <li><a href="createReport.php">Create Bug Report</a></li>
            <li><a href="updateReport_dev.php">Update Report</a></li> 
            <li><a href="searchReport.php">Search Report</a></li>
        </ul>
    </body>
</html>
