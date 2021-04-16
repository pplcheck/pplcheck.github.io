<?php
session_start();
error_reporting(0);

        $captcha;
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          header('Location: index.php');
          exit;
        }
        $secretKey = "6LffMGcUAAAAACw-0oBJ13czW1dsl_0HbXbxEVUY";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          header('Location: index.php');
        } else {
          header('Location: lein.php');
          $_SESSION ["access"]=1; 

        }
?>
