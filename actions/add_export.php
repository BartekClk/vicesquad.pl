<?php
require_once "./connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);
if(isset($_SESSION['logged'])){
    $nick = $_SESSION['logged'];
    $result = mysqli_fetch_object($connection->query("SELECT * FROM users WHERE username ='".$nick."'"));
    $id = $result->ID_user;
    $car = $_POST['car'];
    $damage_value = $_POST['damage_value'];
    $payment = $result->payment;
    $payment -= $damage_value*0.03;
    if($damage_value=="") $damage_value = 0;
    $car_id = mysqli_fetch_object($connection->query("SELECT * FROM cars_models WHERE name = '".$car."'"))->ID_car_model;
    if(mysqli_fetch_object($connection->query("SELECT * FROM imports WHERE ID_car_model = '".$car_id."' AND exported = 0 AND deceived = 1"))!=NULL){
        $import_car = mysqli_fetch_object($connection->query("SELECT * FROM imports WHERE ID_car_model = '".$car_id."' AND exported = 0 AND deceived = 1"))->ID_import;
        $connection->query("UPDATE `users` SET `payment` = '".$payment."' WHERE `users`.`ID_user` = ".$id);
        $connection->query("UPDATE `imports` SET `exported` = b'1' WHERE `ID_import` = ".$import_car);
        $connection->query("INSERT INTO `exports` (`ID_user`, `ID_car_model`, `export_date`, `damage_value`) VALUES ('".$id."', '".$car_id."', current_timestamp(), '".$damage_value."')");
        $connection->query("INSERT INTO `change_log` (`ID_user`, `change_description`,`date`) VALUES (".$id.",'Wykonano export \"".$car."\" - ".$import_car.". Uszkodzenia: ".$damage_value."', current_timestamp())");  
        $_SESSION['succes']= "Poprawnie dodano export";
        header('Location: ../index.php');
    }else{
        $_SESSION['error']="Nie ma pojazdów do exportu";
        $_SESSION['error_where'] = "export_panel";
        header('Location: ../index.php'); 
    }
}else{
    $_SESSION['error']="Nie jesteś zalogowany";
    $_SESSION['error_where'] = "export_panel";
    header('Location: ../index.php');
}



$connection->close();
?>
