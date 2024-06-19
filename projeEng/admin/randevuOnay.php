<?php


include "../function.php";
$id=$_GET["id"];

$sonuc2 = getUsernameByMeetingsID($id);
$selectedUsername = mysqli_fetch_assoc($sonuc2);
$username=$selectedUsername["kullaniciAdi"];

$sonuc3 = getMailAdressByUsername($username);
$selectedMail = mysqli_fetch_assoc($sonuc3);
$mailk=$selectedMail["kullaniciMail"];

$sonuc=updateOnay($id);


mail($mailk,"Randevunuz Onay","Randevunuz Onaylanmıştır");



header("Location:ad_OnayliRandevu.php");

?>