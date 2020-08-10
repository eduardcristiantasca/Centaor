<?php

if (isset($_POST['register-submit'])) {

    require 'dbcinema.php';

    $username = $_POST['name-register'];
    $email = $_POST['email-register'];
    $pwd = $_POST['password-register'];
    $pwd_conf = $_POST['password-register-confirm'];

    if (empty($username) || empty($email) || empty($pwd) || empty($pwd_conf)) {
        header("Location: ../index.php?error=emptyfields&username=".$username."&email=".$email);
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../index.php?error=invalidusernameemail");
        exit();
    }

    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../index.php?error=invalidusername&email=".$email);
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidemail&username=".$username);
        exit();
    }

    else if($pwd != $pwd_conf) {
        header("Location: ../index.php?error=passwordcheck&username=".$username."&email=".$email);
        exit();
    }

    else {
        $sql = "SELECT userName FROM users WHERE userName=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("Location: ../index.php?error=usertaken&email=".$email);
                exit();
            }

            else{
                $sql = "INSERT INTO users (userName, userEmail, userPwd) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../index.php?register=succes");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    header("Location: ../index.php");
    exit();
}