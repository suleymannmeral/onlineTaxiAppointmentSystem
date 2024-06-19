<?php
include "../function.php";

$id = $_GET['id']; // URL'den 'id' parametresini al
getMeetingsById($id); // 'id' değerini kullanarak fonksiyonu çağır



$sonuc=getMeetingsById($id);
$selectedMeetings= mysqli_fetch_assoc($sonuc);
$soforAdi=$selectedMeetings["sofor"];

$sonuc2=getDriversByAd($soforAdi);
$selectedDrivers= mysqli_fetch_assoc($sonuc2);




       
      
    


?>


<div class="card me-4 mb-4" style="width: 18rem;">
            <img class="card-img-top" src="../images/<?php echo $selectedDrivers["soforResim"] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            
            </div>
        </div>