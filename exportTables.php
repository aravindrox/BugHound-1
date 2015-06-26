<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
if (!(isset($_SESSION['login_manager']) && $_SESSION['login_manager'] != '')) {
    header("Location: index.html");
}
  
        $con = mysqli_connect('localhost', 'root', '', 'testdatabase');
        if (!$con) {
            die('Could not connect!' . mysqli_error());
        }
        mysqli_select_db($con, "testdatabase");
        
       
?>


<form action="fetchTables.php" name="fetchTables" method="GET">

    <select name="table" id="table">
                <option selected="selected" value="none"></option>
                <option value="Buginfo"> Bug Information </option>
                <option value="Dept">  Departments </option>
                <option value="emp"> v </option>
                <option value="functional"> Functional Areas </option>
                <option value="pgms"> Programs</option>
                <option value="userlist"> Users </option>
                        </select>  
                        
                        
        <select name="format" id="format">
              <option selected="selected" value="none"></option>
                <option value="ascii"> ASCII </option>
                <option value="xml">  XML </option>
                
                <input type='submit' value='export'/>
         
</form>