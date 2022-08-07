<?php
session_start();
require_once "./connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);
$login = $_POST['login'];
$password = md5($_POST['password']);
// if($_POST['remember_me']=="on"){
//     $remember_me = $_POST['remember_me'];
// }

if(strpos($login, '@')==true){
    $result = mysqli_fetch_object($connection->query("SELECT * FROM users where email = '".$login."'"));
    $result_login = $result->email;
}else{
    $result = mysqli_fetch_object($connection->query("SELECT * FROM users where username = '".$login."'"));
    $result_login = $result->username;
}
$result_password = $result->password;
    if($result_login!=$login){
        $_SESSION['error']="Błędny login/email";
        echo "Błędny login/email";
        header('Location: ../login.php');
    }else if($result_password!=$password){
        $_SESSION['error']="Błędne hasło";
        echo "Błędne hasło";
        header('Location: ../login.php');
    }else if($result_password==$password && $result_login == $login){
        if($result->deleted == 0){
            $_SESSION['logged']=$result->username;
            echo "Poprawne dane logowania";
            header('Location: ../index.php');
        }else{
            $_SESSION['error']="Konto jest zablokowane";
            echo "Konto jest zablokowane";
            header('Location: ../login.php');
        }
    }

$connection->close();
?>
