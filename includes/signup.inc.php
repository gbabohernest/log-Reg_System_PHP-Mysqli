<?php

if (isset($_POST['submit'])) {

    //db connection
    require_once 'dbh.inc.php';
    require_once 'logic.inc.php';

    $first_name = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $confirm_pwd = mysqli_real_escape_string($conn, $_POST['c_pwd']);
    $fullname = $first_name . " " . $last_name;

    if (emptyInputSignUp($first_name, $last_name, $email, $uid, $pwd, $confirm_pwd) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (invalidUid($uid) !== false) {
        header("location: ../signup.php?error=invalidusername");
        exit();
    }

    if (passwordMatch($pwd, $confirm_pwd) !== false) {
        header("location: ../signup.php?error=password-doesnot-match");
        exit();
    }

    if (userName_Exist($conn, $uid, ) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    if (usersEmail_Exist($conn, $email) !== false) {
        header("location: ../signup.php?error=useremailtaken");
        exit();
    }

    createUser($conn, $fullname, $email, $uid, $pwd);
} else {
    header("location: ../signup.php");
    exit();
}
