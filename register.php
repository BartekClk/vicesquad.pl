<?php
session_start();
?>

<!DOCTYPE html>
<html lang="PL-pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css join -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap js bundle join -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- main css join -->
    <link rel="stylesheet" href="./css/main.css">
    <!-- footer css join -->
    <link rel="stylesheet" href="./css/footer.css">
    <!-- scrollbar css join -->
    <link rel="stylesheet" href="./css/scrollbar.css">
    <!-- login css join -->
    <link rel="stylesheet" href="./css/login.css">

    <link rel="icon" href="./img/icon.ico">

    <title>Vice Squad</title>
</head>

<body>
    <!-- top nav bar -->
    <div class="grid_container">

        <!-- menu -->
        <div class="menu i1 opacity-0">
        </div>

        <!-- main logo -->
        <div id="main_logo">
            <img src="./img/logo.png">
        </div>

        <!-- log_in menu -->
        <div class="i2">
        </div>
    </div>

    <!-- panel -->
    <div class="container">
        <div class="box_back">
            <div class="box">
                <img src="./img/back_arrow.svg" alt="" id="box_back_arrow">
                <h2 class="box_title">REJESTRACJA</h2>
                <h3 class="box_subtitle text-white opacity-50" id="error">Podaj dane do rejestracji</h3>
                <form method="post" action="./actions/register.php" class="box_form">
                    <div class="form_input"><input type="text" class="text" placeholder="Login" name="login" id="login" autocomplete="off"></div>
                    <div class="form_input"><input type="password" class="password" placeholder="Hasło" name="password" id="password"></div>
                    <div class="form_input"><input type="password" class="password" placeholder="Powtórz hasło" name="re_password" id="re_password"></div>
                    <div class="form_input"><input type="email" class="password" placeholder="E-mail" name="email" id="email" autocomplete="off"></div>
                    <div class="form_input"><input type="email" class="password" placeholder="Powtórz e-mail" name="re_email" id="re_email" autocomplete="off"></div>
                    <div class="form_input"><input type="password" class="password" placeholder="Kod rejestracji" name="registration_code" id="registration_code"></div>
                    <div class="form_button"><input type="submit" value="ZAREJESTRUJ SIĘ" id="box_submit_button"></div>
                    <div class="down_text">
                        <p class="text-white" id="login_href">Posiadasz konto? Zaloguj się!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>O nas</h6>
                    <p class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et vel saepe iusto iste quaerat maxime obcaecati a! Fuga temporibus dolore enim molestiae laudantium debitis doloremque blanditiis placeat aspernatur consequatur, beatae non
                        voluptate quam impedit commodi consectetur quia possimus magnam cum ratione. Totam, eligendi quibusdam sit officiis voluptatum delectus illum doloremque?</p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Kontakt</h6>
                    <ul class="footer-links">
                        <li>
                            <a href="#">Discord</a>
                        </li>
                        <li>
                            <a href=""></a>
                        </li>
                        <li>
                            <a href=""></a>
                        </li>
                        <li>
                            <a href=""></a>
                        </li>
                        <li>
                            <a href=""></a>
                        </li>
                        <li>
                            <a href=""></a>
                        </li>
                    </ul>
                </div>

                <div class="col-xs-6 col-md-3">
                    <ul class="footer-links">
                        <li class="footer-logo"><img src="./img/logo.png"></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2021 <br>All Rights Reserved, <br>by [HQ] code</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- logo_animation js join -->
    <script src=".\js\logo_animation.js"></script>

    <!-- own js join -->
    <script src=".\js\js.js"></script>

    <!-- login form js join -->
    <script src=".\js\register.js"></script>

    <script><?php
    if(isset($_SESSION['error'])){
        $error = $_SESSION['error'];
        echo "error_generator('error','".$error[0]."');\n";
        echo "input_border_error_generator(".$error[1].",1)";
        unset($_SESSION['error']);
    }
    ?></script>
</body>

</html>