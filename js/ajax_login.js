$(document).ready(function() {
    $("#form-login").submit(function(event) {
        event.preventDefault();
        var mailOrName = $("#email").val();
        var password = $("#password").val();
        var submit_login = $("#submit-login").val();
        $(".form-message-login").load("includes/login1.php", {
            mailOrName: mailOrName,
            password: password,
            submit_login: submit_login
            });
        });
    });