<?php session_start();
$_SESSION['env']=="admin";
if (isset($_GET['login'])&&!empty($_GET['login'])) {
	

$_SESSION['loginn']=$_GET['login'];


}else
if (isset($_POST['send'])&& isset($_POST['message'])&& !empty($_POST['message'])) {
 
    include('try.php');
    $admin="admin";$message=htmlspecialchars($_POST['message']);
    $req = $bdd->prepare("INSERT INTO message 
      (date_message,contenu_message,login_emetteur,login_recepteur,etat_message) 
      VALUES (now(),?,?,?,'non_vue')");
        $req->execute(array($message,$admin,$_SESSION['loginn']));
    }

header('location:message_admin.php');

?>