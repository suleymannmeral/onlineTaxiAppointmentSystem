<?php

include "function.php";




date_default_timezone_set('Europe/Istanbul');
$result = getDepDateFromMeetings();





while($selectedDate = mysqli_fetch_assoc($result))
{
    $dateString = $selectedDate["kalkisTarihi"];
    $kadi=$selectedDate["kullaniciAdi"];
    $sonuc4=getMailAdressByUsername($kadi);
    $selectedMail=mysqli_fetch_assoc($sonuc4);

  


    $unixTimestamp = strtotime($dateString);
    
    
    $currentTimestamp = time();
    
    
    $timeDifference = abs($unixTimestamp - $currentTimestamp);

    
    if ($timeDifference <= 3600) {
       $selectedMail["kullaniciMail"];
       mail($selectedMail["kullaniciMail"],"Randevu Bildirimi","Randevunuza 1 saatten az zaman kalmıştır. Hazır olmanızı rica ederiz");
       mail("lexvon53@gmail.com","Randevu Mail","$kadi isimli kullanıcı adının randevusuna 1 saaatten az zaman kaldı");
       
       
    } else {
        
    }
}

?>