
<?php

if (isset($_POST['submit'])) {
    require_once "dbh.inc.php";
    require_once "logic.inc.php";

    $useremail = $_POST['mail'];
    $userPwd = $_POST['pwd'];

    if (loginEmptyInput($useremail, $userPwd) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $useremail, $userPwd);

} else {
    header("location: ../index.php?error=accesforbidden");
}
