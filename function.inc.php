<?php

function emptyInputRegister($name, $email, $username, $password, $passwordrepeat) {
    return empty($name) || empty($email) || empty($username) || empty($password) || empty($passwordrepeat);
}

function invalidUid($username) {
    return !preg_match("/^[a-zA-Z0-9]*$/", $username);
}

function invalidEmail($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function pwdMatch($password, $passwordrepeat) {
    return $password !== $passwordrepeat;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $password) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../register.php?error=none");
    exit();
}

function emptyInputLogin($username, $password) {
    return empty($username) || empty($password);
}

function loginUser($conn, $username, $password) {
    $uidExists = uidExists($conn, $username, $username); // Checking by username or email

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["userSPWD"];
    $checkPwd = password_verify($password, $pwdHashed);
    echo json_encode($uidExists);
    var_dump($pwdHashed);
    var_dump($password);
    if ($checkPwd === false) {
        // header("location: ../login.php?error=p");
        // exit();
    } else {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        $_SESSION["login_success"] = "Logged in successfully!";  // <-- Add success message here
        header("location: ../index.php");
        exit();
    }
}
