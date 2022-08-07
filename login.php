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
                <h2 class="box_title">LOGOWANIE</h2>
                <h3 class="box_subtitle text-white opacity-50" id="error">Wpisz login i hasło</h3>
                <form method="post" action="./actions/login.php" class="box_form">
                    <div class="form_input"><input type="text" class="text" placeholder="Login lub E-mail" name="login" id="login"></div>
                    <div class="form_input"><input type="password" class="password" placeholder="Hasło" name="password" id="password"></div>
                    <div class="form_button"><input type="submit" value="ZALOGUJ SIĘ" id="box_submit_button"></div>
                    <div class="down_text">
                        <!-- <p class="text-white" id="reset_password_href">Zapomniałeś hasła?</p> -->
                    </div>
                    <div class="down_text">
                        <p class="text-white" id="register_href">Nie masz konta? Utwórz je!</p>
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
                <div class="col-md-8 col-sm-6 col-xs-12 footer_copyright">
                    <p class="copyright-text">Copyright &copy; 2021 <br>All Rights Reserved, <br>by [HQ] code</p>
                    <img src="./img/hq-logo.png" alt="" class="footer-hq-logo">
                </div>
            </div>
        </div>
    </footer>

    <!-- own js join -->
    <script src=".\js\js.js"></script>

    <!-- login form js join -->
    <script src=".\js\login.js"></script>

    <script>
        <?php
            if(isset($_SESSION['error'])){
                echo "error_generator('".$_SESSION['error']."')";
                unset($_SESSION['error']);
            }
        ?>
    </script>
</body>

</html>