<?php
require_once "./connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);
if(isset($_SESSION['logged'])){
    $nick = $_SESSION['logged'];
    $result = mysqli_fetch_object($connection->query("SELECT * FROM users WHERE username ='".$nick."'"));
    $id = $result->ID_user;
    $car = $_POST['car'];
    $value = $_POST['artifact_value'];
    $payment = $result->payment;
    $total_earnings = $result->total_earnings;
    if($value<10000) {
        $payment += 5000;
        $total_earnings += 5000;
    }
    else if($value>=10000) {
        $payment += 8000;
        $total_earnings += 8000;
    }
    $connection->query("UPDATE `users` SET `payment` = '".$payment."' WHERE `users`.`ID_user` = ".$id);
    $connection->query("UPDATE `users` SET `total_earnings` = '".$total_earnings."' WHERE `users`.`ID_user` = ".$id);
    $connection->query("INSERT INTO `artifacts` (`ID_user`, `found_date`, `found_value`) VALUES ('".$id."', current_timestamp(), '".$value."')");
    $connection->query("INSERT INTO `change_log` (`ID_user`, `change_description`,`date`) VALUES (".$id.",'Zebrano artefat o wartość \"".$value."\"', current_timestamp())");  
    $_SESSION['succes']= "Poprawnie dodano artefakt";
    header('Location: ../index.php');
}else{
    $_SESSION['error']="Nie jesteś zalogowany";
    $_SESSION['error_where'] = "artifact_panel";
    header('Location: ../index.php');
}
$connection->close();
?>
