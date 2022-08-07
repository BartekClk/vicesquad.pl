<?php
require_once "./connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);

$login = $_POST['login'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$registration_code = $_POST['registration_code'];
$rank = $registration_code[0];
$db_registration_code = mysqli_fetch_object($connection->query("SELECT * FROM registration_codes WHERE registration_code = '".$registration_code."'"))->registration_code;
$id = mysqli_num_rows($connection->query("SELECT * FROM users"))+1;

if(mysqli_fetch_object($connection->query("SELECT * FROM users WHERE username = '".$login."'"))==null){
    if(mysqli_fetch_object($connection->query("SELECT * FROM users WHERE email = '".$email."'"))==null){
        if($registration_code == $db_registration_code){
            $connection->query("INSERT INTO `users` (`username`, `password`, `email`, `registration_date`, `ID_rank`, `deleted`) 
                                VALUES ('".$login."', '".$password."', '".$email."', current_timestamp(), '".$rank."', b'0')");
            $connection->query("DELETE FROM `registration_codes` WHERE `registration_code` = '".$registration_code."'");
            $connection->query("INSERT INTO `change_log` (`ID_user`, `change_description`,`date`) VALUES (".$id.",'Utworzono nowego użytkownika', current_timestamp())");
            header("Location: ../index.php");
            $_SESSION['succes']="Pomyślnie utworzono konto użytkownika";
        }else{
            $error[0] = "Błędy kod rejestracji";
            $error[1] = "registration_code"; 
            $_SESSION['error'] = $error;  
            header("Location: ../register.php");
        }
    }else{
        $error[0] = "Ten e-mail jest już zajęty";
        $error[1] = "email"; 
        $_SESSION['error'] = $error;
        header("Location: ../register.php");
    }
}else{
    $error[0] = "Ten login jest już zajęty";
    $error[1] = "login"; 
    $_SESSION['error'] = $error;
    header("Location: ../register.php");
}


$connection->close();
?>