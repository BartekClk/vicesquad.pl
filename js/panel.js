//panels edition
function hide_all_panels() {
    let panels = document.getElementsByClassName("panel_box");
    for (let panel of panels) {
        panel.classList.replace("panel_right_shown", "panel_right_hidden");
        panel.classList.replace("panel_left_shown", "panel_left_hidden");
        panel.classList.replace("panel_down_shown", "panel_down_hidden");
    }
    panels = document.getElementsByClassName("notification_back");
    for (let panel of panels) {
        panel.classList.replace("panel_down_shown", "panel_down_hidden");
        document.body.style = "margin-top: 0px";
    }
}

function panel_show(...panels) {
    hide_all_panels();
    for (const el of panels) {
        let panel = document.getElementById(el);
        panel.classList.replace("panel_right_hidden", "panel_right_shown");
        panel.classList.replace("panel_left_hidden", "panel_left_shown");
        panel.classList.replace("panel_down_hidden", "panel_down_shown");
    }
}

function panel_down_show(...panels) {
    hide_all_panels();
    for (const el of panels) {
        let panel = document.getElementById(el);
        panel.classList.replace("panel_down_hidden", "panel_down_shown");
        setTimeout(() => {
            panel_down_hide(el);
        }, 3000);
    }
    document.body.style = "margin-top: 40px";
}

function panel_left_show(...panels) {
    hide_all_panels();
    for (const el of panels) {
        let panel = document.getElementById(el);
        panel.classList.replace("panel_left_hidden", "panel_left_shown");
    }
}

function panel_hide(...panels) {
    for (const el of panels) {
        let panel = document.getElementById(el);
        panel.classList.replace("panel_right_shown", "panel_right_hidden");
    }
}

function panel_down_hide(...panels) {
    for (const el of panels) {
        let panel = document.getElementById(el);
        panel.classList.replace("panel_down_shown", "panel_down_hidden");
    }
    document.body.style = "margin-top: 0px";
}

function panel_left_hide(...panels) {
    for (const el of panels) {
        let panel = document.getElementById(el);
        panel.classList.replace("panel_left_shown", "panel_left_hidden");
    }
}

function close_panel(...panels) {
    for (const el of panels) {
        let element = document.getElementById(el);
        element.addEventListener('click', () => {
            panel_hide(element.parentElement.id);
        });
    }
}

function close_down_panel(...panels) {
    for (const el of panels) {
        let element = document.getElementById(el);
        element.addEventListener('click', () => {
            panel_down_hide(element.parentElement.id);
        });
    }
}

function close_left_panel(...panels) {
    for (const el of panels) {
        let element = document.getElementById(el);
        element.addEventListener('click', () => {
            panel_left_hide(element.parentElement.id);
        });
    }
}

close_panel("close_change_password_panel", "close_user_panel", "close_change_nick_panel", "close_export_panel");
close_left_panel("close_import_info_panel", "close_import_panel", "close_artifact_panel");
close_down_panel("close_notification");

document.getElementById("nick").addEventListener('click', () => {
    panel_show("change_nick_panel");
    panel_hide("change_password_panel");
});

document.getElementById("import_info").addEventListener('click', () => {
    panel_left_show("import_info_panel");
});

document.getElementById("import_button").addEventListener('click', () => {
    panel_left_show("import_panel");
});

document.getElementById("export_button").addEventListener('click', () => {
    panel_show("export_panel");
});

document.getElementById("artifact_button").addEventListener('click', () => {
    panel_show("artifact_panel");
});



// document.getElementById("nick").addEventListener('click', () => {
//     panel_show("change_nick_panel");
//     panel_hide("change_password_panel");
// });

//password change
var password = document.getElementById("new_password");
var re_password = document.getElementById("re_new_password");
var registration_code = document.getElementById("recovery_code");
var submit_button = document.getElementById("change_password_submit_button");

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

function button_enable(button) {
    button.style.opacity = 1;
    button.removeAttribute("disabled");
}

function button_disable(button) {
    button.style.opacity = 0.5;
    button.setAttribute("disabled", "");
}

function Password_check() {
    if (password != null) {
        if (password.value.length <= 7) {
            error_generator("password_change_error", "Hasło musi być dłuższe niż 7 znaków")
            input_border_error_generator(password, 1)
            button_disable(submit_button);
            return false;
        } else {
            if (password.value.indexOf(0) == -1 && password.value.indexOf(1) == -1 && password.value.indexOf(2) == -1 && password.value.indexOf(3) == -1 && password.value.indexOf(4) == -1 && password.value.indexOf(5) == -1 && password.value.indexOf(6) == -1 && password.value.indexOf(7) == -1 && password.value.indexOf(8) == -1 && password.value.indexOf(9) == -1) {
                error_generator("password_change_error", "Hasło musi zawierać cyfre")
                input_border_error_generator(password, 1)
                button_disable(submit_button);
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
                    error_generator("password_change_error", "Hasło musi zawierać litere")
                    input_border_error_generator(password, 1)
                    button_disable(submit_button);
                    return false;
                } else if (b == false) {
                    button_enable(submit_button);
                    return true;
                }
            }
        }
    }
}

function Re_password_check() {
    if (re_password != null && password != null) {
        if (password.value != re_password.value) {
            error_generator("password_change_error", "Hasła muszą sie zgadzać")
            input_border_error_generator(password, 1)
            input_border_error_generator(re_password, 1)
            button_disable(submit_button);
            return false;
        } else if (password.value == re_password.value && (password.value != "" || re_password.value != "")) {
            button_enable(submit_button);
            return true;
        } else {
            error_generator("password_change_error", "Hasła muszą sie zgadzać")
            input_border_error_generator(password, 1)
            input_border_error_generator(re_password, 1)
            button_disable(submit_button);
            return false;
        }
    }
}

function Registration_code_check() {
    if (registration_code != null) {
        if (registration_code.value.length != 6) {
            error_generator("password_change_error", "Kod musi być sześcio cyfrowy")
            input_border_error_generator(registration_code, 1)
            button_disable(submit_button);
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
                error_generator("password_change_error", "Kod musi składać się z cyfr")
                input_border_error_generator(registration_code, 1)
                button_disable(submit_button);
                return false;
            } else if (a == true) {
                button_enable(submit_button);
                return true;
            }
        }
    }
}

password.addEventListener("change", function() {
    Password_check()
});
re_password.addEventListener("change", function() {
    Re_password_check()
});
registration_code.addEventListener("change", function() {
    Registration_code_check()
});

submit_button.addEventListener("click", function() {
    if (password.value == "" || re_password == "" || email.value == "" || re_email == "" || registration_code == "") {
        submit_button.style.opacity = 0.5;
        submit_button.setAttribute("disabled", "");
        error_generator("password_change_error", "Podaj dane do rejestracji");
        input_border_error_generator(password);
        input_border_error_generator(re_password);
        input_border_error_generator(registration_code);
    } else {
        submit_button.style.opacity = 0.5;
        submit_button.setAttribute("disabled", "");
        Password_check();
        Re_password_check();
        Registration_code_check();
    }
});

//nick change
var change_nick_button = document.getElementById("change_nick_submit_button");
var login = document.getElementById("login");
var nick_password = document.getElementById("nick_password");

function Login_check() {
    if (login != null) {
        if (login.value.length <= 2) {
            error_generator("nick_change_error", "Login musi być dłuższy niż 2 znaki")
            input_border_error_generator(login, 1)
            button_disable(change_nick_button);
            return false;
        } else if (login.value.length > 2) {
            button_enable(change_nick_button);
            return true;
        }
    }
}

function Nick_Password_check() {
    if (nick_password != null) {
        if (nick_password.value.length <= 7) {
            error_generator("nick_change_error", "Hasło musi być dłuższe niż 7 znaków")
            input_border_error_generator(nick_password, 1)
            button_disable(change_nick_button);
            return false;
        } else {
            if (nick_password.value.indexOf(0) == -1 && nick_password.value.indexOf(1) == -1 && nick_password.value.indexOf(2) == -1 && nick_password.value.indexOf(3) == -1 && nick_password.value.indexOf(4) == -1 && nick_password.value.indexOf(5) == -1 && nick_password.value.indexOf(6) == -1 && nick_password.value.indexOf(7) == -1 && nick_password.value.indexOf(8) == -1 && nick_password.value.indexOf(9) == -1) {
                error_generator("nick_change_error", "Hasło musi zawierać cyfre")
                input_border_error_generator(nick_password, 1)
                button_disable(change_nick_button);
                return false;
            } else {
                let b;
                for (const el of nick_password.value) {
                    const a = el.charCodeAt(0);
                    if (a >= 97 && a <= 122) {
                        b = false;
                        break;
                    } else {
                        b = true;
                    }
                }
                if (b == true) {
                    error_generator("nick_change_error", "Hasło musi zawierać litere")
                    input_border_error_generator(nick_password, 1)
                    button_disable(change_nick_button);
                    return false;
                } else if (b == false) {
                    button_enable(change_nick_button);
                    return true;
                }
            }
        }
    }
}

login.addEventListener("change", function() {
    Login_check();
});
nick_password.addEventListener("change", function() {
    Nick_Password_check()
});

change_nick_button.addEventListener("click", function() {
    if (login.value == "" || nick_password == "") {
        change_nick_button.style.opacity = 0.5;
        change_nick_button.setAttribute("disabled", "");
        error_generator("password_change_error", "Podaj dane do rejestracji");
        input_border_error_generator(login);
        input_border_error_generator(nick_password);
    } else {
        change_nick_button.style.opacity = 0.5;
        change_nick_button.setAttribute("disabled", "");
        Login_check();
        Nick_Password_check();
    }
});