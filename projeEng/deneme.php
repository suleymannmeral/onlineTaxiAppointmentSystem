<?php include "navbar.php";
     include "function.php";

     $sonuc2=getMailAdressByUsername("emsa53");
$selectedDrivers= mysqli_fetch_assoc($sonuc2);


   

   
     echo $selectedDrivers["kullaniciMail"];

    

?>
