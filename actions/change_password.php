<?php
require_once "./connect.php";

$connection = @new mysqli($host,$db_user,$db_password,$db_name);
$password = md5($_POST['new_password']);
$form_code = $_POST['recovery_code'];
$session_code = $_POST['generated_code'];
echo $form_code;
echo $session_code;
$nick = $_SESSION['logged'];
$result = mysqli_fetch_object($connection->query("SELECT * FROM users WHERE username ='".$nick."'"));
$id = $result->ID_user;

if($form_code != $session_code){
    $_SESSION['error']="Błędny kod odzyskiwania";
    $_SESSION['error_where'] = "change_password_panel";
    echo "Błędny kod odzyskiwania";
    header('Location: ../index.php');
}else{
    $connection->query("UPDATE users SET password = '".$password."' WHERE username = '".$nick."'");
    $connection->query("INSERT INTO `change_log` (`ID_user`, `change_description`,`date`) VALUES (".$id.",'Zmieniono hasło', current_timestamp())");
    $_SESSION['succes']= "Poprawnie zmieniono hasło";
    echo "Poprawne dane";
    header('Location: ../.php');
}
$connection->close();
?>
