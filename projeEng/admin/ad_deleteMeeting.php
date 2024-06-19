<?php 

include "../function.php";

$id=$_GET["id"];

cancelMeeting($id);





session_start();
        $message2="Randevu Başarıyla Silindi";
        $_SESSION['message2'] = $message2;


header("Location:index.php");



?>