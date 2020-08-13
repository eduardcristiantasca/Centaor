<?php

if (isset($_POST['submit_login'])){

    require 'dbcinema.php';

    $mailOrName = $_POST['mailOrName'];
    $password = $_POST['password'];

    $errorEmpty = false;
    $errorUserMail = false;
    $errorPass = false;

    // $adminCheck = false;

    if (empty($mailOrName) || empty($password)) {
        // header("Location: ../index.php?error=emptyfieldsl");
        // exit();
        // echo "<span class=\"error-color\">Fill in all fields!</span>";
        $errorEmpty = true;
    }

    // if ($mailOrName == "admin" && $password == "admin"){
    //     // $adminCheck = true;
    //     session_start();
    //     $_SESSION['userId'] = $row['idUser'];
    //     $_SESSION['username'] = $row['userName'];
    //     exit();
    // }

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
                    // header("Location: ../index.php?error=wrongpwd");
                    // exit();
                    echo "<span class=\"error-color\">*Incorrect username or password!</span>";
                    $errorPass = true;
                }
                else if ($pwdCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUser'];
                    $_SESSION['username'] = $row['userName'];
                    $_SESSION['email'] = $row['userEmail'];
                    // exit();
                    echo "<span class=\"error-color\">Login succes!</span>";
                }
                else{
                    // header("Location: ../index.php?error=wrongpwd");
                    // exit();
                    echo "<span class=\"error-color\">*Incorrect username or password!</span>";
                    $errorPass = true;
                    
                }
            }
            else{
                // header("Location: ../index.php?error=nouser");
                // exit();
                echo "<span class=\"error-color\">*Incorrect username or password!</span>";
                $errorUserMail = true;
            }
        }
    }
}

else{
    header("Location: ../index.php");
    exit();
}

?>

<script>
    $("#email, #password").css("border-bottom","1px solid black");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorUserMail = "<?php echo $errorUserMail; ?>";
    var errorPass = "<?php echo $errorPass; ?>"; 
    var adminCheck = "<?php echo $_SESSION['username']; ?>";
    var show_logout = document.getElementById("form-logout");

    if(adminCheck == "admin"){
        var hide_buttons = document.getElementById("box-login-register");
        var form_login = document.getElementById("form-login");
        var form_newsletter = document.getElementById("form-newsletter");
        var form_admin = document.getElementById("form-admin");
        
        
        // SHOW THE ADMIN CRUD FORM / HIDE OTHER
        hide_buttons.style.display = "none";
        form_login.classList.add("form-login-show");
        form_newsletter.classList.add("newsletter-show");
        form_admin.style.display = "flex";
        show_logout.style.display = "flex";
        form_admin.style.marginLeft = "5vw";
        title.style.width = "25vw";
    }

    if(adminCheck != "admin"){
        var hide_buttons = document.getElementById("box-login-register");
        var form_login = document.getElementById("form-login");
        var form_newsletter = document.getElementById("form-newsletter");
        var load_tickets = document.getElementById("load-tickets");
        console.log("refresh to");
        // SHOW THE ADMIN CRUD FORM / HIDE OTHER
        load_tickets.style.display = "block";
        hide_buttons.style.display = "none";
        form_login.classList.add("form-login-show");
        form_newsletter.classList.add("newsletter-show");
        title.style.width = "25vw";
    }

    if (errorEmpty == true || errorUserMail == true || errorPass == true){
        $("#email, #password").css("border-bottom", "1px solid red");
    }

    if (errorEmpty == false && errorUserMail == false && errorPass == false){
        $("#email, #password").val("");
        show_logout.style.display = "flex";
    }

</script>