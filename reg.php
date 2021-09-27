<?php
session_start();
require 'database.php';
if (isset($_POST) & !empty($_POST)) {
    if (isset($_POST['token'])) {
        if ($_POST['token'] == $_SESSION['token']) {

            if (!isset($_POST['name'], $_POST['pass'])) {
                // Could not get the data that should have been sent.
                exit('Please complete the registration form!');
            }
            if (empty($_POST['name']) || empty($_POST['pass'])) {
                // One or more values are empty.
                exit('Please complete the registration form!');
            }

            $name = mysqli_real_escape_string($con, $_POST['name']);
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

            $query = "SELECT * FROM users WHERE username='$name'";
            $sql = mysqli_query($con, $query);

            if (mysqli_num_rows($sql) >= 1) {
                echo "name already exists";
            } else {
                $query = "INSERT INTO users (`username`, `password`) 
  			    VALUES('$name', '$pass')";
                mysqli_query($con, $query);
                echo "ok";
            }
        } else {
            echo "CSRF validation fail";
        }
    }
}
