// BUTTON TO SHOW THE REGISTER FORM

document.getElementById("register").onclick = function () {

    // VARIABLES

    var form_register = document.getElementById("form-register");
    var form_login = document.getElementById("form-login");
    var form_newsletter = document.getElementById("form-newsletter");
    var form_admin = document.getElementById("form-admin")
 
    // SHOW THE REGISTER FORM / HIDE OTHER

    form_register.style.display = "flex";
    form_login.classList.add("form-login-show");
    form_newsletter.classList.add("newsletter-show");
    form_admin.style.display = "none";
 };


 // BUTTON TO ADD NEW USER

//  document.getElementById("submit-register").onclick = function () {

//     // VARIABLES

//     var name = document.getElementById("name-register");
//     var email = document.getElementById("email-register");
//     var pass = document.getElementById("password-register");
//     var pass_conf = document.getElementById("password-register-confirm");

//     // ERRORS
//     var invalid_name = document.getElementById("invalid-name");
//     var invalid_email = document.getElementById("invalid-email");
//     var invalid_pass = document.getElementById("invalid-password");
//     var invalid_pass_conf = document.getElementById("invalid-password-confirm");
//     var email_exist = document.getElementById("email-exist");

//     document.getElementById("submit-register").style.backgroundColor = "rgba(0, 0, 128, 0.1)";

// 	if (!validName()){
//         name.style.borderBottom = "1px solid red";
//         invalid_name.style.display = "inline";
// 	}
// 	else{
//         name.style.borderBottom = "1px solid black";
//         invalid_name.style.display = "none";
// 	}

//     if(!validPassword()){
//         pass.style.borderBottom = "1px solid red";
//         pass_conf.style.borderBottom = "1px solid red";
//         invalid_pass.style.display = "inline";
//         invalid_pass_conf.style.display = "inline";
//     }
// 	else{
//         pass.style.borderBottom = "1px solid black";
//         pass_conf.style.borderBottom = "1px solid black";
//         invalid_pass.style.display = "none";
//         invalid_pass_conf.style.display = "none";
//     }
    
// 	if(!validEmail()){
//         email.style.borderBottom = "1px solid red";
//         invalid_email.style.display = "inline";
//     }
// 	else{
//         email.style.borderBottom = "1px solid black";
//         invalid_email.style.display = "none";
//         email_exist.style.display = "none";

//         // CHECK IF EMAIL EXISTS ALREADY
//         for(let i = 0; i < userList.length; i++){
//             console.log(userList[i]);
//             if(email.value == userList[i].email){
//                 email.style.borderBottom = "1px solid red";
//                 email_exist.style.display = "inline";
//                 return;
//             }
//         }
//     }
    
//     if(validName() && validEmail() && validPassword()){
//         newUser = new User(userList.length, name.value, email.value, pass.value);
//         userList.push(newUser);
//         console.log("The new user:");
//         console.log(newUser);
//         document.getElementById("submit-register").style.backgroundColor = "lightgreen";
//     }

// }


//  // FUNCTION TO VALIDATE NAME

//  function validName(){

//     var name = document.getElementById("name-register").value;
    
// 	if (name == "") return false;

// 	for (var i = 0; i < name.length; i++) {
//   		var char = name.charAt(i);
//   		if (char >= "0" && char <= "9")
//   			return false;
// 	}
// 	return true;
// }


// // FUNCTION TO VALIDATE EMAIL

// function validEmail(){

// 	var email = document.getElementById("email-register").value;
//     var at = 0;
    
// 	for (var i = 0; i < email.length; i++){
// 		if (email[i] == "@")
//             at++;
// 	}

// 	if(at >= 1)
// 		return true;

// 	return false;
// }

// // FUNCTION TO VALIDATE PASSWORD

// function validPassword(){

//     var pass = document.getElementById("password-register").value;
//     var pass_conf = document.getElementById("password-register-confirm").value;
    
// 	if (pass == "" || pass_conf == "" || pass != pass_conf) return false;

// 	return true;
// }

