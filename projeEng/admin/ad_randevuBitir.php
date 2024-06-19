<?php
ob_start();
include "ad_navbar.php";
include "../function.php";

$id=$_GET["id"];
$sonuc2 = getUsernameByMeetingsID($id);
$selectedUsername = mysqli_fetch_assoc($sonuc2);
$username=$selectedUsername["kullaniciAdi"];

$sonuc3 = getMailAdressByUsername($username);
$selectedMail = mysqli_fetch_assoc($sonuc3);
$mailk=$selectedMail["kullaniciMail"];
$sonuc=updateSonlandir($id);

mail($mailk,"Sürüş","Randevunuz Başarılıy Bir Şekjilde Gerçeklemşmiştir Görüşlerinizi Randevularım Kısmından Puanlarsanız memnuz kalşırız");
header("Location:ad_gecmisRandevular.php");
exit();
ob_end_flush(); 


?>