<?PHP
session_start();
if (!(isset($_SESSION['login_manager']) && $_SESSION['login_manager'] != '')) {
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
        <title>Welcome Manager</title>
        <script>
            history.pushState(null, null, 'manager_list.php');
            window.addEventListener('popstate', function (event) {
                history.pushState(null, null, 'manager_list.php');
            });
        </script>
        <link rel="stylesheet" href="assets/css/main.css"/>

    </head>
    <body>
        <h2>BugHound</h2>
        <h3>Welcome Manager</h3><a href="logout.php">Logout</a>
        
        
        <a href="logout.php">Logout</a>
        <ul>
            <li><a href="createReport.php">Create Report</a></li> 
            <li><a href="updateReport_Manager.php">Update Report</a></li>  
            <li><a href="exportTables.php">Export Tables</a></li>   
        </ul>
    </body>
</html>