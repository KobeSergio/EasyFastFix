<?php
    include('../includes/dbc.php');
    session_start(); 

    $username = ($_POST['username']);
    $password = ($_POST['password']); 

    $query = "SELECT * from admin WHERE Username='$username'"; 

    $results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username

    $exists = mysqli_num_rows($results); //Checks if username exists

    $table_users = "";
    $table_password = "";

    if($results != "") //IF there are no returning rows or no existing username
    {
        while($row = mysqli_fetch_assoc($results)) //display all rows from query
        {
            $table_users = $row['Username']; // the first username row is passed on to $table_users, and so on until the query is finished
            $table_password = $row['Password']; // the first password row is passed on to $table_users, and so on until the query is finished
        }
        if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
        {
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
                header("location: ../index.php"); // redirects the user to the authenticated home page
        }
        else
        {
            Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
            Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
        }
    }
    else
    {
        Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
    }
