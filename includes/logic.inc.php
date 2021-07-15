<?php
#emptyinput check function
function emptyInputSignUp($first_name, $last_name, $email, $uid, $pwd, $confirm_pwd)
{
    $result;
    if (empty($first_name) || empty($last_name) || empty($email)
        || empty($uid) || empty($pwd) || empty($confirm_pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
#emtyinput check end

#invalid email check function
function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
#invalidemail check end

#invalid username check function
function invalidUid($uid)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uid)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
#invalid username check end

#pwd match check function
function passwordMatch($pwd, $confirm_pwd)
{
    $result = true;
    if ($pwd !== $confirm_pwd) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
#pwd match check end

#userUID_Exits or not check function
function userName_Exist($conn, $uid)
{
    $sql = "SELECT usersUid FROM users WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=connection-username_failed!!");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $uid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);
        if ($rowCount > 0) {
            header('location: ../signup.php?error=usernametaken');
            exit();
        } else {
            $result = false;
            return $result;
        }
        /*
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
    #this data can be user also to login the user
    } else {
    $result = false;
    return $result;
    }
     */
    }
    mysqli_stmt_close($stmt);
}
#userUId_Exits check end

#usersEmail_Exits or not check function
function usersEmail_Exist($conn, $email)
{
    $sql = "SELECT usersEmail FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=connection-usersEmail_failed!!");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);

        if ($rowCount > 0) {
            header('location: ../signup.php?error=useremailtaken');
            exit();
        } else {
            $result = false;
            return $result;
        }
        /*
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
    #this data can be user also to login the user
    } else {
    $result = false;
    return $result;
    }
     */
    }
    mysqli_stmt_close($stmt);
}
#usersEmail_Exits check end

#creatuser function
function createUser($conn, $fullname, $email, $uid, $pwd)
{
    $sql = "INSERT INTO users(usersName, usersEmail, usersUid, usersPwd)
            VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=database_error!!");
        exit();
    } else {
        $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $fullname, $email, $uid, $hashedPassword);
        mysqli_stmt_execute($stmt);
        header("location: ../signup.php?success=signedup");
        exit();
    }
    mysqli_close($conn);
}
#creatuser end

#//////////////////////////////////////////////////////////////////////////////////////
#login methods

#emptyInputLogin check function
function loginEmptyInput($useremail, $pwd)
{
    $result;

    if (empty($useremail) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
#emptyInputLogin check end

#loginUser check function
function loginUser($conn, $useremail, $userPwd)
{
    $sql = "SELECT * FROM users WHERE usersEmail =?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../login.php?error=sql_error');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 's', $useremail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            #check user pwd
            $pwdCheck = password_verify($userPwd, $row['usersPwd']); #return a boolean value true or false
            if ($pwdCheck == false) {
                header("location: ../login.php?error=wrongpwd");
                exit();
            } else if ($pwdCheck == true) {
                # here you logged in the user
                session_start();
                $_SESSION['session_useruid'] = $row['usersUid'];
                $_SESSION['session_username'] = $row['usersName'];
                header("location: ../login.php?success=loggedin");
                exit();
            } else {
                header("location: ../login.php?error=wrongpwd");
                exit();
            }
        } else {
            header("location: ../login.php?error=user_doesn't_exist");
        }
    }

}
#loginUser check end
