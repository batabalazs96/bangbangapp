<?php
session_start();
$myToken = bin2hex(openssl_random_pseudo_bytes(24));
$_SESSION['token'] = $myToken;

?>
<!DOCTYPE html>
<html class="h-100">

<head>
    <meta charset="utf-8">
    <title>Welcome to Speaker Portal</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>

<body class="d-flex h-100 justify-content-center align-items-center">

    <div class="login-form">
        <form id="registrationForm" method="POST">
            <div class="form-group">
                <p class="text-center">Please Sign up</p>
                <label>name:</label>
                <input type="text" class="form-control" required="required" name="name" value="">
            </div>
            <div class="form-group">
                <label>pass:</label>
                <input type="password" class="form-control" required="required" name="pass" value="">
                <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
            </div>

            <div class="form-group col-md-12 text-center mt-2">
                <button id="submitButton" class="btn btn-primary btn-block">ENTER</button>
            </div>
            <div id="result"></div>
        </form>

    </div>


</body>

</html>