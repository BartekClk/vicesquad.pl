<?php
require_once "./connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);
if(isset($_SESSION['logged'])){
    $nick = $_SESSION['logged'];
    $result = mysqli_fetch_object($connection->query("SELECT * FROM users WHERE username ='".$nick."'"));
    $id = $result->ID_user;
    $rank = mysqli_fetch_object($connection->query("SELECT * FROM `ranks` WHERE ID_rank = '".$result->ID_rank."'"));
    $deceived = 0;
    if($_POST['imported?']=="Tak") $deceived = 1;
    $car_model_form = $_POST['model'];

    $car_model = mysqli_fetch_object($connection->query("SELECT * FROM `cars_models` WHERE name = '".$car_model_form."'"));
    $payment_percentage = $rank->payment_percentage;
    $payment_percentage = $payment_percentage/100;
    $payment = $result->payment;
    $total_earnings = $result->total_earnings;
    echo $car_model_form;
    if($car_model_form=="Szrot") {
        $payment += 1000;
        $total_earnings += 1000;
        $earnings = 1000;
    }else{
        $payment += ($car_model->payment)*$payment_percentage;
        $total_earnings += ($car_model->payment)*$payment_percentage;
        $earnings = $car_model->payment;
    }
    if($deceived==1) {
        $connection->query("UPDATE `users` SET `payment` = '".$payment."', `total_earnings` = '".$total_earnings."' WHERE `users`.`ID_user` = ".$id);
        $connection->query("INSERT INTO `imports` (`ID_user`, `ID_car_model`, `import_date`, `deceived`, `exported`) VALUES ('".$id."', '".$car_model->ID_car_model."', current_timestamp(), b'".$deceived."', b'0')");
        $connection->query("INSERT INTO `change_log` (`ID_user`, `change_description`,`date`) VALUES (".$id.",'Importowano pojazd \"".$car_model->name."\" - ".$car_model->ID_car_model.". Zarobek: ".$earnings."', current_timestamp())");  
    }else if($deceived==0){
        $connection->query("INSERT INTO `imports` (`ID_user`, `ID_car_model`, `import_date`, `deceived`, `exported`) VALUES ('".$id."', '".$car_model->ID_car_model."', current_timestamp(), b'".$deceived."', b'0')");
        $connection->query("INSERT INTO `change_log` (`ID_user`, `change_description`,`date`) VALUES (".$id.",'Podjęto próbę importu zakończoną niepowodzeniem \"".$car_model->name."\" - ".$car_model->ID_car_model."', current_timestamp())");  
    }
    $_SESSION['succes']= "Poprawnie dodano import";
    header('Location: ../index.php');
}else{
    $_SESSION['error']="Nie jesteś zalogowany";
    $_SESSION['error_where'] = "import_panel";
    header('Location: ../index.php');
}



$connection->close();
?>
