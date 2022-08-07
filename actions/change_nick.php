<?php
require_once "./connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);
$login = $_POST['login'];
$password = md5($_POST['password']);
$nick = $_SESSION['logged'];
$result = mysqli_fetch_object($connection->query("SELECT * FROM users WHERE username ='".$nick."'"));
$result_password = $result->password;
$id = $result->ID_user;

if(mysqli_fetch_object($connection->query("SELECT * FROM users WHERE username ='".$login."'"))!=null){
    $_SESSION['error']="Ten login jest już zajęty";
    $_SESSION['error_where'] = "change_nick_panel";
    echo "Ten login jest już zajęty";
    header('Location: ../index.php');
}else if($result_password!=$password){
    $_SESSION['error']="Błędne hasło";
    $_SESSION['error_where'] = "change_nick_panel";
    echo "Błędne hasło";
    header('Location: ../index.php');
}else if($result_password==$password){
    $connection->query("UPDATE users SET username = '".$login."' WHERE username = '".$nick."'");
    $connection->query("INSERT INTO `change_log` (`ID_user`, `change_description`,`date`) VALUES (".$id.",'Zmieniono nazwę użytkownika z \"".$nick."\" na \"".$login."\"', current_timestamp())");
    $_SESSION['logged']=$login;
    $_SESSION['succes']= "Poprawnie zmieniono nick";
    echo "Poprawne dane";
    header('Location: ../index.php');
}
$connection->close();
?>
