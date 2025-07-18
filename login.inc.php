<?php
    
   
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

if (isset($_POST["submit"])) {

    $username = $_POST["uid"];
    $password = $_POST["pwd"];


    if (emptyinputlogin($username, $password) !== false) {
        header("Location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);

} else {
    header("Location: ../index.php");
    exit();
}

    
?>   


