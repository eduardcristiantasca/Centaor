// BUTTON TO SHOW THE LOGIN FORM

document.getElementById("login").onclick = function () {

    // VARIABLES

    var form_register = document.getElementById("form-register");
    var form_login = document.getElementById("form-login");
    var form_newsletter = document.getElementById("form-newsletter");
    var form_admin = document.getElementById("form-admin")

    //DISPLAY THE LOGIN FORM / HIDE OTHER

    form_login.classList.remove("form-login-show");
    form_newsletter.classList.remove("newsletter-show");
    form_admin.style.display = "none";
    form_register.style.display = "none";
};

// BUTTON TO VALIDATE THE LOGIN FORM

// document.getElementById("submit-login").onclick = function () {
    
//     //VARIABLES

//     var email = document.getElementById("email").value;
//     var password = document.getElementById("password").value;
//     var checkForUser = false;

//     var form_login = document.getElementById("form-login");
//     var form_newsletter = document.getElementById("form-newsletter");
//     var form_admin = document.getElementById("form-admin");
    
//     document.getElementById("invalid-login").style.display = "none";
//     document.getElementById("submit-login").style.backgroundColor = "rgba(0, 0, 128, 0.1)";
//     // SHOW THE ADMIN CRUD FORM / HIDE OTHER

//     if(email == "admin1" && password == "admin1"){
//         form_login.classList.add("form-login-show");
//         form_newsletter.classList.add("newsletter-show");
//         form_admin.style.display = "flex";
//         return;
//     }

//     // VALIDATE CREDENTIALS

//     for(let i = 0; i < userList.length; i++){
//         if(email== userList[i].email && password == userList[i].password){
//             checkForUser = true;
//             document.getElementById("submit-login").style.backgroundColor = "lightgreen";
            
//         }
//     }
    
//     if(!checkForUser)
//         document.getElementById("invalid-login").style.display = "inline";

// };


