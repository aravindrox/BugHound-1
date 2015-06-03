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
        <h2>BugHound</h2>
        <ul>
            <li><a href="createReport.php">Create Bug Report</a></li>
            <li><a href="updateReport.php">Update Report</a></li>   
        </ul>
    </body>
</html>
