<?php
require_once "./actions/connect.php";
$connection = @new mysqli($host,$db_user,$db_password,$db_name);
if(isset($_SESSION['logged'])){
    $nick = $_SESSION['logged'];
    $result = mysqli_fetch_object($connection->query("SELECT * FROM users WHERE username ='".$nick."'"));
    $id = $result->ID_user;
    $email = $result->email;
    $payment = $result->payment;
    $total_earnings = $result->total_earnings;
    $exports = mysqli_num_rows($connection->query("SELECT ID_user FROM exports WHERE ID_user = '".$id."'"));
    $imports = mysqli_num_rows($connection->query("SELECT ID_user FROM imports WHERE ID_user = '".$id."'"));
    $artifacts = mysqli_num_rows($connection->query("SELECT ID_user FROM artifacts WHERE ID_user = '".$id."'"));
    $rank = mysqli_fetch_object($connection->query("SELECT users.ID_rank, ranks.ID_rank, ranks.rank_name FROM users, ranks WHERE users.ID_rank = ranks.ID_rank AND username = '".$nick."'"))->rank_name;    
}
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
    <!-- panel css join -->
    <link rel="stylesheet" href="./css/panel.css">
    <!-- panel css join -->
    <link rel="stylesheet" href="./css/login.css">

    <link rel="icon" href="./img/icon.ico">
    <title>Vice Squad</title>
</head>

<body>
    <!-- top nav bar -->
    <div class="grid_container">

        <!-- menu -->
        <div class="menu i1">
            <div><a href="https://discord.com/invite/G4CDRdZjGS"><img src="./img/discord-logo.png"></a></div>
            <div class="join_us_text">← Dołącz do nas!</div>
            <div></div>
            <div></div>
            <div></div>
        </div>

        <!-- main logo -->
        <div id="main_logo">
            <img src="./img/logo.png">
        </div>

        <!-- log_in menu -->
        <div class="i2 ">
            <div></div>
            <div></div>
            <div id="login_container">
                <button class="login_button" id="login_button"><div id="login_button_text">Zaloguj się</div></button>
            </div>
            <div id="join_us_container">
                <button class="join_us_button" id="join_us_button"><div id="join_us_button_text">Zaloguj się</div></button>
                <!-- <button class="join_us_button" onclick=""><div id="join_us_button_text">Zarejestruj się</div></button> -->
            </div>
        </div>
    </div>

    <!-- panel -->
    <center>
        <div class="mc_box">
            <div class="mc_grid_container">
                <div></div>
                <div class="import_box">
                    <img src="./img/Import.jpg" alt="" class="large_mc_button" id="import_button">
                    <img src="./img/menu/info.svg" alt="" class="click import_info" id="import_info">
                </div>
                <div>
                    <div><img src="./img/artifacts.jpg" alt="" class="small_mc_button" id="artifact_button"></div>
                    <div><img src="./img/mag.jpg" alt="" class="small_mc_button" id="mag_button"></div>
                </div>
                <div><img src="./img/Export.jpg" alt="" class="large_mc_button" id="export_button"></div>
                <div></div>
            </div>
        </div>
    </center>

    <div class="panel_box panel_right_hidden" id="user_panel">
        <img src="./img/x.svg" alt="" class="close_user_panel click" id="close_user_panel">
        <img src="./img/logout.svg" alt="" class="logout_user_panel click" id="logout_user_panel">
        <div class="panel_box_content">
            <h1 class="center panel_username" id="user_data_nick">Cost</h1>
            <h2 class="center">NICK MUSI SIĘ ZGADZAĆ Z TYM NA SERWERZE</h2>
            <table class="table table-dark">
                <tbody>
                    <tr>
                        <td>Do wypłaty
                            <p id="user_data_payment">100$</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Całkowite zarobki
                            <p id="total_earnings">200000$</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Wykonane importy
                            <p id="done_imports">1</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Wykonane exporty
                            <p id="done_exports">10</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Zebrane artefakty
                            <p id="finded_artifacts">10</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Ranga
                            <p id="rank">Miras</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="user_panel_change_box">
                <!-- <p class="center"><b class="queue">Kolejka pracowita</b></p> -->
                <p class="center user_panel_change">
                        <b class="title">Zmień</b> -
                        <b id="nick">Nick</b>
                        <!-- <b id="password">Hasło</b> -->
                </p>
            </div>
        </div>
    </div>
    <div class="panel_box panel_right_hidden" id="change_password_panel">
        <img src="./img/x.svg" alt="" class="close_user_panel click" id="close_change_password_panel">
        <div class="panel_box_content">
            <h1 class="center panel_username">Zmiana hasła</h1>
            <h2 class="center" id="password_change_error">Podaj nowe hasło i kod wysłany na twój e-mail</h2>
            <div class="box_back">
                <div class="box">
                    <form method="post" action="./actions/change_password.php" class="box_form">
                        <input class="visually-hidden" type="password" type="text" value="" name="generated_code" id="generated_code">
                        <div class="form_input"><input type="password" class="password" placeholder="Nowe hasło" name="new_password" id="new_password"></div>
                        <div class="form_input"><input type="password" class="password" placeholder="Powtórz nowe hasło" name="new_re_password" id="re_new_password"></div>
                        <div class="form_input"><input type="password" class="password" placeholder="Kod odzyskiwania" name="recovery_code" id="recovery_code"></div>
                        <div class="form_button"><input type="submit" value="ZMIEŃ HASŁO" id="change_password_submit_button"></div>
                    </form>
                </div>
            </div>
            <h2 class="center click" id="new_code">Wyślij nowy kod odzyskiwania</h2>
        </div>
    </div>
    </div>
    <div class="panel_box panel_right_hidden" id="change_nick_panel">
        <img src="./img/x.svg" alt="" class="close_user_panel click" id="close_change_nick_panel">
        <div class="panel_box_content">
            <h1 class="center panel_username">Zmiana nicku</h1>
            <h2 class="center" id="nick_change_error">Podaj nowy nick i hasło</h2>
            <div class="box_back">
                <div class="box">
                    <form method="post" action="./actions/change_nick.php" class="box_form">
                        <div class="form_input"><input type="text" class="text" placeholder="Nowy nick" name="login" id="login" autocomplete="off"></div>
                        <div class="form_input"><input type="password" class="password" placeholder="Hasło" name="password" id="nick_password"></div>
                        <div class="form_button"><input type="submit" value="ZMIEŃ NICK" id="change_nick_submit_button"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="panel_box panel_left_hidden" id="import_info_panel">
        <img src="./img/x.svg" alt="" class=" click" id="close_import_info_panel">
        <div class="panel_box_content">
            <h1 class="center panel_username">Lista pojazdów</h1>
            <table class="table table-dark">
                <tbody>
                    <h7>
                    <?php
                        $sql = "SELECT * FROM `cars_models` ORDER BY `min_value` desc";
                        $result = $connection->query($sql);
                        if ($result = $connection->query($sql)) {
                            while($car = $result->fetch_object()){
                                if($car->name!="szrot"){
                                    $min_value ="";
                                    $j=strlen($car->min_value);
                                    for ($i=0; $i < strlen($car->min_value); $i++) {
                                        $j--;
                                        $min_value .= $car->min_value[$i];
                                        if($j%3==0 && $j!=0){
                                            $min_value .=" ";
                                        }
                                    }
                                    echo   '<tr>
                                                <td><p>'.$car->name.'</p>
                                                    <img src="./img/cars/'.$car->ID_car_model.'.png" alt="" class="car_list_car">
                                                    <div class="center">Minimalna cena exportu</div>
                                                    <div class="center"><p>'.$min_value.'$</p></div>
                                                    <br>
                                                </td>
                                            </tr>';
                                }
                                
                                        
                                        // <div class="center">Minimalna cena exportu</div>
                                        // <div class="center"><p>'.$min_value.'$</p></div>
                            }
                        }
                    ?>
                    </h7>
                </tbody>
            </table>
        </div>
    </div>

    <div class="panel_box panel_left_hidden " id="import_panel">
        <img src="./img/x.svg" alt="" class="close_user_panel click" id="close_import_panel">
        <div class="panel_box_content">
            <h1 class="center panel_username">Import</h1>
            <h2 class="center" id="import_error">Wypełnij formularz i dodaj import</h2>
                <form method="post" action="./actions/add_import.php" class="box_form">
                    <div class="form_input">
                        <select placeholder="Wybierz model" class="text list" name="model" id="model">
                            <option>Wybierz model</option>
                            <?php
                                $sql = "SELECT * FROM `cars_models` ORDER BY name ASC";
                                $result = $connection->query($sql);
                                if ($result = $connection->query($sql)) {
                                    while($car = $result->fetch_object()){
                                        if($car->name!="szrot"){
                                            echo   '<option>'.$car->name.'</option>';
                                        }
                                    }
                                }
                            ?>
                            <option>Szrot</option>
                        </select>
                    </div>
                    <div class="form_input">
                        <select placeholder="Zwieziony?" class="text list imported" name="imported?" id="imported?">
                            <option>Zwieziony?</option>
                            <option>Tak</option>
                            <option>Nie</option>
                        </select>
                        <br>
                    </div>
                    <div class="form_button"><input type="submit" value="DODAJ IMPORT" id="add_import_submit_button"></div>
                </form>
        </div>
    </div>

    <div class="panel_box panel_right_hidden " id="export_panel">
        <img src="./img/x.svg" alt="" class="close_user_panel click" id="close_export_panel">
        <div class="panel_box_content">
            <h1 class="center panel_username">Export</h1>
            <h2 class="center" id="export_error">Wypełnij formularz i dodaj export</h2>
                <form method="post" action="./actions/add_export.php" class="box_form">
                    <div class="form_input">
                        <select placeholder="Wybierz pojazd" class="text list" name="car" id="car">
                        <option>Wybierz pojazd</option>
                            <?php
                            if(isset($_SESSION['logged'])){
                                $sql_ex = "SELECT name FROM imports, cars_models WHERE imports.ID_car_model = cars_models.ID_car_model AND imports.exported = 0 AND imports.deceived = 1 ORDER BY name ASC;";
                                $result_ex = $connection->query($sql_ex);
                                if ($result_ex = $connection->query($sql_ex)) {
                                    while($car = $result_ex->fetch_object()){
                                        echo   '<option>'.$car->name.'</option>';
                                    }
                                }
                            }else{
                                echo   '<option>Zaloguj się by wykonać export</option>';
                            }  
                            ?>
                        </select>
                    </div>
                    <?php
                    if(isset($_SESSION['logged'])){
                        echo '<div class="form_input center"><input type="number" class="text" placeholder="Uszkodzenia" name="damage_value" id="damage_value" min="0" max="5950000" step="1000"></div>';
                    }else{
                        echo '<div class="form_input center"><input type="number" class="text" placeholder="Uszkodzenia" name="damage_value" id="damage_value" disabled></div>';
                    }
                    ?>
                    
                    <div class="form_button"><input type="submit" value="DODAJ EXPORT" id="add_export_submit_button"></div>
                </form>
        </div>
    </div>

    <div class="panel_box panel_left_hidden " id="artifact_panel">
        <img src="./img/x.svg" alt="" class="close_user_panel click" id="close_artifact_panel">
        <div class="panel_box_content">
            <h1 class="center panel_username">Artefakt</h1>
            <h2 class="center" id="artifact_error">Wypełnij formularz i dodaj artefakt</h2>
                <form method="post" action="./actions/add_artifact.php" class="box_form">
                    <div class="form_input center"><input type="text" class="text" placeholder="Wartość artefaktu" name="artifact_value" id="artifact_value"></div>
                    <div class="form_button"><input type="submit" value="DODAJ ARTEFAKT" id="add_artifact_submit_button"></div>
                </form>
        </div>
    </div>

    <div class="notification_back panel_down_hidden" id="notification_back">
            <img src="./img/x.svg" alt="" class="close_notification_panel click" id="close_notification">
            <p class="center ver-center" id="notification_message">abc</p>
    </div>

    

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>O nas</h6>
                    <h7 class="text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et vel saepe iusto iste quaerat maxime obcaecati a! Fuga temporibus dolore enim molestiae laudantium debitis doloremque blanditiis placeat aspernatur consequatur, beatae non
                        voluptate quam impedit commodi consectetur quia possimus magnam cum ratione. Totam, eligendi quibusdam sit officiis voluptatum delectus illum doloremque?</h7>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Kontakt</h6>
                    <ul class="footer-links">
                        <li>
                            <a href="https://discord.gg/G4CDRdZjGS" target="_blank">Discord</a>
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
                    <h7 class="copyright-text">Copyright &copy; 2021 <br>All Rights Reserved, <br>by [HQ] code</h7>
                </div>
            </div>
        </div>
    </footer>


    <!-- <div class="modal fade" id="user_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- logo_animation js join -->
    <script src=".\js\logo_animation.js"></script>

    <!-- own js join -->
    <script src=".\js\js.js"></script>

    <!-- own js join -->
    <script src=".\js\panel.js"></script>
    <script>
        <?php
            if(isset($_SESSION['logged'])){
                echo "logged('".$nick."',".$payment.",".$total_earnings.",".$imports.",".$exports.",".$artifacts.",'".$rank."')\n";
                // echo'
                // document.getElementById("password").addEventListener(\'click\', () => {
                //     code = getRandomInt(100000, 999999);
                //     document.getElementById("generated_code").value = code;
                //     window.open("actions/mail.php?email='.$email.'&code="+code+"", "Wysyłanie e-maila", "width=200,height=100");
                //     panel_show("change_password_panel");
                //     panel_hide("change_nick_panel");
                // });';
                echo 'document.getElementById("new_code").addEventListener(\'click\', () => {
                    code = getRandomInt(100000, 999999);
                    document.getElementById("generated_code").value = code;
                    window.open("actions/mail.php?email='.$email.'&code="+code+"", "Wysyłanie e-maila", "width=200,height=100");
                });';
            }else{
                echo "not_logged()\n";
            }
            if(isset($_SESSION['error'])){
                echo "panel_show('".$_SESSION['error_where']."')\n";
                if(isset($_SESSION['error_where'])){
                    if($_SESSION['error_where']=="change_nick_panel") echo "error_generator('nick_change_error','".$_SESSION['error']."');\n";
                    if($_SESSION['error_where']=="change_password_panel") echo "error_generator('password_change_error','".$_SESSION['error']."');\n";
                    if($_SESSION['error_where']=="import_panel") echo "error_generator('import_error','".$_SESSION['error']."');\n";
                    if($_SESSION['error_where']=="export_panel") echo "error_generator('export_error','".$_SESSION['error']."');\n";
                    if($_SESSION['error_where']=="artifact_panel") echo "error_generator('artifact_error','".$_SESSION['error']."');\n";
                    unset($_SESSION['error_where']);
                }
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['succes'])){
                echo "panel_down_show('notification_back');\n";
                echo "document.getElementById('notification_message').innerHTML = '".$_SESSION['succes']."';\n";
                unset($_SESSION['succes']);
            }
        ?>
        // var myModal = new bootstrap.Modal(document.getElementById('user_data'))
        // myModal.toggle();
    </script>
</body>

</html>