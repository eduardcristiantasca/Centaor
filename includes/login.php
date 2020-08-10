<?php

if (isset($_POST['login-submit'])){

    require 'dbcinema.php';

    $mailOrName = $_POST['email-username'];
    $password = $_POST['password'];

    if (empty($mailOrName) || empty($password)) {
        header("Location: ../index.php?error=emptyfieldsl");
        exit();
    }

    else {
        $sql = "SELECT * FROM users WHERE userName=? OR userEmail=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailOrName, $mailOrName);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['userPwd']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
                else if ($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUser'];
                    $_SESSION['username'] = $row['userName'];
                    header("Location: ../index.php?login=succes");
                    exit();
                }
                else{
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            }
            else{
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}

else{
    header("Location: ../index.php");
    exit();
}