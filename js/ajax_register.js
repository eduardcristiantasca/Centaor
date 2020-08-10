$(document).ready(function() {
    $("#form-register").submit(function(event) {
        event.preventDefault();
        var username = $("#name-register").val();
        var email = $("#email-register").val();
        var pwd = $("#password-register").val();
        var pwd_conf = $("#password-register-confirm").val();
        var submit = $("#submit-register").val();
        $(".form-message").load("includes/register1.php", {
            username: username,
            email: email,
            pwd: pwd,
            pwd_conf: pwd_conf,
            submit: submit
        });
    });

 
});