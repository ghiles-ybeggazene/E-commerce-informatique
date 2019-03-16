<?php
session_start();
$_SESSION['envoyer']="message";

if (isset($_POST['send'])&& isset($_POST['message'])&& !empty($_POST['message'])) {
 
    include('try.php');
    $admin="admin";$message=htmlspecialchars($_POST['message']);
    $req = $bdd->prepare("INSERT INTO message 
      (date_message,contenu_message,login_emetteur,login_recepteur,etat_message) 
      VALUES (now(),?,?,?,'non_vue')");
        $req->execute(array($message,$_SESSION['login'],$admin));
  header('location:messagerie_client.php');

    }else
    header('location:messagerie_client.php');




?>