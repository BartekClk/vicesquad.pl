function opacity_change(...id) {
    for (const el of id) {
        if (document.getElementById(el) != null) {
            let object = document.getElementById(el);
            object.addEventListener("mouseover", function() { this.style.opacity = 1; })
            object.addEventListener("mouseout", function() { this.style.opacity = 0.7; })
        }
    }
}

function loc(id, where, new_card) {
    if (document.getElementById(id) != null) {
        if (new_card == undefined) document.getElementById(id).addEventListener("click", function() { location.href = where })
        else document.getElementById(id).addEventListener("click", function() { window.open(where, "_blank"); })
    }
}

opacity_change("menu_home", "menu_info", "menu_queue", "login_button_text", "join_us_button_text", "menu_login", "box_back_arrow");

loc("login_button", "./login.php");
loc("join_us_button", "./login.php");
loc("mag_button", "https://ucp.paradise-rpg.pl/group/412", 1);
loc("box_back_arrow", "./index.php");
loc("register_href", "./register.php")
loc("reset_password_href", "./reset_password.php")
loc("login_href", "./login.php")
loc("logout_user_panel", "./actions/logout.php")

function not_logged() {
    loc("menu_login", "./login.php");
}

function logged(login, payment, total_earnings, imports, exports, artifacts, rank) {
    document.getElementById("user_data_nick").innerHTML = login.toUpperCase();
    document.getElementById("user_data_payment").innerHTML = payment + "$";
    document.getElementById("total_earnings").innerHTML = total_earnings + "$";
    document.getElementById("done_imports").innerHTML = imports;
    document.getElementById("done_exports").innerHTML = exports;
    document.getElementById("finded_artifacts").innerHTML = artifacts;
    document.getElementById("rank").innerHTML = rank;


    // var menu_login = document.getElementById("menu_login");
    // menu_login.addEventListener("click", function() { panel_show("user_panel") });

    const el = document.getElementById("join_us_button").cloneNode(true);

    var to_delete = document.getElementById("join_us_container");
    to_delete.removeChild(to_delete.firstElementChild);
    to_delete = document.getElementById("login_container");
    to_delete.removeChild(to_delete.firstElementChild);

    el.removeAttribute("id");
    el.firstElementChild.innerHTML = "Panel użytkownika";
    el.addEventListener("click", function() { panel_show("user_panel") })

    document.getElementById("join_us_container").appendChild(el);
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
}