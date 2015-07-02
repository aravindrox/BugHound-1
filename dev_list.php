<?PHP
session_start();
if (!(isset($_SESSION['login_dev']))) {
    header("Location: index.html");
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Welcome Manager</title>
        <script>
            history.pushState(null, null, 'dev_list.php');
            window.addEventListener('popstate', function (event) {
                history.pushState(null, null, 'dev_list.php');
            });
        </script>
        <link rel="stylesheet" href="assets/css/main.css"/>

    </head>
    <body>
        <h2>BugHound</h2><a href="logout.php">Logout</a>
        <ul>
            <li><a href="createReport.php">Create Report</a></li> 
            <li><a href="updateReport_Dev.php">Update Report</a></li>   
        </ul>
    </body>
</html>
