<?php

if (isset($_POST['submit'])) {

    require 'dbcinema.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd_conf = $_POST['pwd_conf'];

    $errorEmpty = false;
    $errorEmail = false;
    $errorUser = false;
    $errorPass = false;
    $errorUserTaken = false;

    if (empty($username) || empty($email) || empty($pwd) || empty($pwd_conf)) {
        echo "<span class=\"error-color\">*Fill in all fields!</span>";
        $errorEmpty = true;
    }

    // else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    //     $errorUser = true;
    //     $errorEmail = true;
    // }

    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        echo "<span class=\"error-color\">*Invalid username!</span>";
        $errorUser = true;
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<span class=\"error-color\">*Write a valid email address!</span>";
        $errorEmail = true;
    }

    else if($pwd != $pwd_conf) {
        echo "<span class=\"error-color\">*Passwords do not match!</span>";
        $errorPass = true;
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
                echo "<span class=\"error-color\">*User taken!</span>";
                $errorUserTaken = true;
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
                    echo "<span>Register succes!</span>";
                }
            }
        }
    }
    // mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else{
    echo "There was an error!";
}

?>

<script>
    $("#email-register, #name-register, #password-register, #password-register-confirm").css("border-bottom","1px solid black");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorEmail = "<?php echo $errorEmail; ?>";
    var errorUser = "<?php echo $errorUser; ?>";
    var errorPass = "<?php echo $errorPass; ?>";
    var errorUserTaken = "<?php echo $errorUserTaken; ?>";

    if (errorEmpty == true){
        $("#email-register, #name-register, #password-register, #password-register-confirm").css("border-bottom","1px solid red");
    }

    if (errorUserTaken == true){
        $("#name-register").css("border-bottom","1px solid red");
    }

    if (errorEmail == true){
        $("#email-register").css("border-bottom","1px solid red");
    }

    if (errorUser == true){
        $("#name-register").css("border-bottom","1px solid red");
    }

    if (errorPass == true){
        $("#password-register, #password-register-confirm").css("border-bottom","1px solid red");
    }

    if (errorEmpty == false && errorEmail == false && errorUser == false && errorPass == false){
        $("#email-register, #name-register, #password-register, #password-register-confirm").val("");
    }

</script>