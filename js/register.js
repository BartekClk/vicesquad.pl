var login = document.getElementById("login");
var password = document.getElementById("password");
var re_password = document.getElementById("re_password");
var email = document.getElementById("email");
var re_email = document.getElementById("re_email");
var registration_code = document.getElementById("registration_code");
var submit_button = document.getElementById("box_submit_button");

function error_generator(id, message) {
    id = document.getElementById(id);
    id.classList.remove("opacity-50");
    id.classList.remove("text-white");
    id.classList.add("opacity-100");
    id.classList.add("text-danger");
    if (message != undefined) id.innerHTML = message;
    id.style.animation = "shake 0.4s linear both";
    setTimeout(() => {
        id.style.animation = "";
    }, 500);
    setTimeout(() => {
        id.classList.remove("text-danger");
        id.classList.add("text-white");
        id.classList.remove("opacity-100");
        id.classList.add("opacity-50");
    }, 3000);
}

function input_border_error_generator(element, empty) {
    if (element.value == "" && empty == undefined) {
        element.style.animation = "shake 0.4s linear both";
        element.style.border = "rgba(255, 0, 0, 0.8) solid 2px";
        setTimeout(() => {
            element.style.animation = "";
        }, 500);
        setTimeout(() => {
            element.style.border = "";
        }, 3000);
    } else if (empty != undefined) {
        element.style.animation = "shake 0.4s linear both";
        element.style.border = "rgba(255, 0, 0, 0.8) solid 2px";
        setTimeout(() => {
            element.style.animation = "";
        }, 500);
        setTimeout(() => {
            element.style.border = "";
        }, 3000);
    }
}

function button_enable() {
    submit_button.style.opacity = 1;
    submit_button.removeAttribute("disabled");
}

function button_disable() {
    submit_button.style.opacity = 0.5;
    submit_button.setAttribute("disabled", "");
}

function Login_check() {
    if (login != null) {
        if (login.value.length <= 2) {
            error_generator("error", "Login musi być dłuższy niż 2 znaki")
            input_border_error_generator(login, 1)
            button_disable();
            return false;
        } else if (login.value.length > 2) {
            button_enable();
            return true;
        }
    }
}

function Password_check() {
    if (password != null) {
        if (password.value.length <= 7) {
            error_generator("error", "Hasło musi być dłuższe niż 7 znaków")
            input_border_error_generator(password, 1)
            button_disable();
            return false;
        } else {
            if (password.value.indexOf(0) == -1 && password.value.indexOf(1) == -1 && password.value.indexOf(2) == -1 && password.value.indexOf(3) == -1 && password.value.indexOf(4) == -1 && password.value.indexOf(5) == -1 && password.value.indexOf(6) == -1 && password.value.indexOf(7) == -1 && password.value.indexOf(8) == -1 && password.value.indexOf(9) == -1) {
                error_generator("error", "Hasło musi zawierać cyfre")
                input_border_error_generator(password, 1)
                button_disable();
                return false;
            } else {
                let b;
                for (const el of password.value) {
                    const a = el.charCodeAt(0);
                    if (a >= 97 && a <= 122) {
                        b = false;
                        break;
                    } else {
                        b = true;
                    }
                }
                if (b == true) {
                    error_generator("error", "Hasło musi zawierać litere")
                    input_border_error_generator(password, 1)
                    button_disable();
                    return false;
                } else if (b == false) {
                    button_enable();
                    return true;
                }
            }
        }
    }
}

function Re_password_check() {
    if (re_password != null && password != null) {
        if (password.value != re_password.value) {
            error_generator("error", "Hasła muszą sie zgadzać")
            input_border_error_generator(password, 1)
            input_border_error_generator(re_password, 1)
            button_disable();
            return false;
        } else if (password.value == re_password.value && (password.value != "" || re_password.value != "")) {
            button_enable();
            return true;
        } else {
            error_generator("error", "Hasła muszą sie zgadzać")
            input_border_error_generator(password, 1)
            input_border_error_generator(re_password, 1)
            button_disable();
            return false;
        }
    }
}

function Email_check() {
    if (email != null) {
        if (email.value.indexOf("@") != -1) {
            let a = email.value.split("@");
            if (a[1].indexOf(".") == -1) {
                error_generator("error", "Niepoprawny adres e-mail")
                input_border_error_generator(email, 1)
                button_disable();
                return false;
            } else if (a[1].indexOf(".") != -1) {
                button_enable();
                return true;
            }
        } else {
            error_generator("error", "Niepoprawny adres e-mail")
            input_border_error_generator(email, 1)
            button_disable();
            return false;
        }
    }
}

function Re_email_check() {
    if (email != null && re_email != null) {
        if (email.value.toLowerCase() != re_email.value.toLowerCase()) {
            error_generator("error", "E-maile muszą sie zgadzać")
            input_border_error_generator(email, 1)
            input_border_error_generator(re_email, 1)
            button_disable();
            return false;
        } else if (email.value.toLowerCase() == re_email.value.toLowerCase() && (email.value != "" || re_email.value != "")) {
            button_enable();
            return true;
        } else {
            button_disable();
            error_generator("error", "E-maile muszą sie zgadzać")
            input_border_error_generator(email, 1)
            input_border_error_generator(re_email, 1)
            return false;
        }
    }
}

function Registration_code_check() {
    if (registration_code != null) {
        if (registration_code.value.length != 6) {
            error_generator("error", "Kod musi być sześcio cyfrowy")
            input_border_error_generator(registration_code, 1)
            button_disable();
            return false;
        } else if (registration_code.value.length == 6) {
            let a;
            for (const el of registration_code.value) {
                if (48 <= el.charCodeAt(0) && el.charCodeAt(0) <= 57) a = true;
                else {
                    a = false;
                    break;
                }
            }
            if (a == false) {
                error_generator("error", "Kod musi składać się z cyfr")
                input_border_error_generator(registration_code, 1)
                button_disable();
                return false;
            } else if (a == true) {
                button_enable();
                return true;
            }
        }
    }
}

login.addEventListener("change", function() { Login_check() });
password.addEventListener("change", function() { Password_check() });
re_password.addEventListener("change", function() { Re_password_check() });
email.addEventListener("change", function() { Email_check() });
re_email.addEventListener("change", function() { Re_email_check() });
registration_code.addEventListener("change", function() { Registration_code_check() });

submit_button.addEventListener("click", function() {
    if (login.value == "" || password.value == "" || re_password == "" || email.value == "" || re_email == "" || registration_code == "") {
        submit_button.style.opacity = 0.5;
        submit_button.setAttribute("disabled", "");
        error_generator("error", "Podaj dane do rejestracji");
        input_border_error_generator(login);
        input_border_error_generator(password);
        input_border_error_generator(re_password);
        input_border_error_generator(email);
        input_border_error_generator(re_email);
        input_border_error_generator(registration_code);
    } else {
        submit_button.style.opacity = 0.5;
        submit_button.setAttribute("disabled", "");
        Login_check();
        Password_check();
        Re_password_check();
        Email_check();
        Re_email_check();
        Registration_code_check();
    }
});