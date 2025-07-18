<?php 
if (isset($_POST["submit"])) {

 
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $password = $_POST["pwd"];
    $passwordrepeat = $_POST["pwdrepeat"];

   
    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    
    if (emptyInputRegister($name, $email, $username, $password, $passwordrepeat) !== false) {
        header("Location: ../Register.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("Location: ../Register.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("Location: ../Register.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($password, $passwordrepeat) !== false) {
        header("Location: ../Register.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("Location: ../Register.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $password);

    header("Location: ../Register.php?error=none");
    exit();

} else {
    
    header("Location: ../Register.php");
    exit();
}
