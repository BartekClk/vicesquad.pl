var login = document.getElementById("login");
var password = document.getElementById("password");
var submit_button = document.getElementById("box_submit_button");

var error = document.getElementById("error");

password.addEventListener("change", function() {
    if (login.value != "" && password.value != "") {
        submit_button.removeAttribute("disabled");
        submit_button.style.opacity = 1;
    }
})

password.addEventListener("click", function() {
    setTimeout(() => {
        submit_button.removeAttribute("disabled");
        submit_button.style.opacity = 1;
    }, 1000);
})

login.addEventListener("click", function() {
    setTimeout(() => {
        submit_button.removeAttribute("disabled");
        submit_button.style.opacity = 1;
    }, 1000);
})

function error_generator(message) {
    error.classList.remove("opacity-50");
    error.classList.remove("text-white");
    error.classList.add("opacity-100");
    error.classList.add("text-danger");
    if (message != undefined) error.innerHTML = message;
    error.style.animation = "shake 0.4s linear both";
    setTimeout(() => {
        error.style.animation = "";
    }, 500);
    setTimeout(() => {
        error.classList.remove("text-danger");
        error.classList.add("text-white");
        error.classList.remove("opacity-100");
        error.classList.add("opacity-50");
    }, 3000);
}

submit_button.addEventListener("click", function() {
    if (login.value == "" || password.value == "") {
        this.setAttribute("disabled", "");
        this.style.opacity = 0.7;
        error_generator("Wpisz login i hasło");
    }
    if (login.value != "" && password.value != "") {
        submit_button.removeAttribute("disabled");
        submit_button.style.opacity = 1;
    }
})