<?php
ob_start(); 
include "ad_header.php"   ;
include "ad_navbar.php";
include "/laragon/www/onlineTaksi/function.php";

include "/laragon/www/onlineTaksi/database/db.php";


$id=$_GET["id"];


$sonuc=getDriversById($id);
$selectedDrivers= mysqli_fetch_assoc($sonuc);
$soforAdi=$selectedDrivers["soforAdi"]." ".$selectedDrivers["soforSoyadi"]." ". " başarıyla silindi";


       
       deleteDrivers($id);
    
       
       $_SESSION['message'] = $soforAdi;
       header('location:ad_soforler.php');
      
       ob_end_flush(); 
?>