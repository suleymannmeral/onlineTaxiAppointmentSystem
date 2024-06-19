<?php

include "ad_navbar.php";
include "../function.php";

session_start();
if(isset($_SESSION["message2"])) {
    $mesaj2 = $_SESSION["message2"];
    unset($_SESSION["message2"]); // Mesajı aldıktan sonra oturumdan kaldır
}



?>
<style>
    .container
    {
        margin-top: 120px;
    }
</style>

<div class="container ">

   
    <div class="row">
        <div class="col-12">
        <h1 class="text-center mb-3"> Onaylı</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th style="width: 50px;">Id</th>
                      <th>Kullanıcı Adı</th>
                      <th>Adı Soyadı</th>
                      <th style="width: 120px;">Kalkış Adresi</th>
                      <th>Kalkış Zamanı</th>
                      <th style="width: 120px;">Varış Adresi</th>

                      <th>Şoför</th>
                      <th>Telefon</th>
                      <th>Onay</th>
                      <th >İşlemler</th>
                      



                    </tr>
                </thead>
                <tbody>
                    <?php $sonuc = getOnayliMeetings(); while($meetings = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td><?php echo $meetings["id"] ?></td>
                        <td><?php echo $meetings["kullaniciAdi"] ?></td>
                        <td><?php echo $meetings["adSoyad"]  ?></td>
                        <td><?php echo $meetings["kalkisAdres"]  ?></td>
                        <td><?php $kalkis=$meetings["kalkisTarihi"];
                                    $dzkalkis=date("d/m/Y H:i:s", strtotime($kalkis));
                                    echo $dzkalkis;  ?></td>
                        <td><?php echo $meetings["varisAdres"]  ?></td>
                        <td><?php echo $meetings["sofor"]  ?></td>
                        <td><?php echo $meetings["telefon"]  ?></td>
                  
                       
                        <td><?php echo $meetings["onay"]  ?></td>

                        



                        <td>
                           
                            <a href="ad_randevuiptal.php?id=<?php echo $meetings["id"] ?>" class="btn btn-warning btn-sm">İptal Et</a>
                           
                            <a href="randevuOnay.php?id=<?php echo $meetings["id"] ?>" class="btn btn-dark btn-sm">Onayla</a>
                            <a href="ad_randevuBitir.php?id=<?php echo $meetings["id"]  ?>" class="btn btn-dark btn-sm">Bitir</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
       


           <h1 class="text-center mb-3"> Onay Bekleyenler Randevular</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th style="width: 50px;">Id</th>
                      <th>Kullanıcı Adı</th>
                      <th>Adı Soyadı</th>
                      <th style="width: 120px;">Kalkış Adresi</th>
                      <th>Kalkış Zamanı</th>
                      <th style="width: 120px;">Varış Adresi</th>

                      <th>Şoför</th>
                      <th>Telefon</th>
                      <th>Onay</th>
                      <th >İşlemler</th>
                      



                    </tr>
                </thead>
                <tbody>
                    <?php $sonuc = getMeetings(); while($meetings = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td><?php echo $meetings["id"] ?></td>
                        <td><?php echo $meetings["kullaniciAdi"] ?></td>
                        <td><?php echo $meetings["adSoyad"]  ?></td>
                        <td><?php echo $meetings["kalkisAdres"]  ?></td>
                        <td><?php $kalkis=$meetings["kalkisTarihi"];
                                    $dzkalkis=date("d/m/Y H:i:s", strtotime($kalkis));
                                    echo $dzkalkis;  ?></td>
                        <td><?php echo $meetings["varisAdres"]  ?></td>
                        <td><?php echo $meetings["sofor"]  ?></td>
                        <td><?php echo $meetings["telefon"]  ?></td>
                  
                       
                        <td><?php echo $meetings["onay"]  ?></td>

                        



                        <td>
                           
                            <a href="ad_randevuiptal.php?id=<?php echo $meetings["id"] ?>" class="btn btn-warning btn-sm">İptal Et</a>
                           
                            <a href="randevuOnay.php?id=<?php echo $meetings["id"] ?>" class="btn btn-dark btn-sm">Onayla</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th style="width: 50px;">Id</th>
                      <th>Username</th>
                      <th>Name</th>
                      <th style="width: 120px;">Departure Adress</th>
                      <th>Departure Date</th>
                      <th style="width: 120px;">Destination Adress</th>

                      <th>Driver</th>
                      <th>Phone</th>
                      <th>Approve</th>
                      <th >Transaction</th>
                      



                    </tr>
                </thead>
                <h1 class="text-center mb-3"> Ended Appointments</h1>
                <tbody>
                    <?php $sonuc = getAllMeetingsSonlanan(3,5); while($meetings = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td><?php echo $meetings["id"] ?></td>
                        <td><?php echo $meetings["kullaniciAdi"] ?></td>
                        <td><?php echo $meetings["adSoyad"]  ?></td>
                        <td><?php echo $meetings["kalkisAdres"]  ?></td>
                        <td><?php $kalkis=$meetings["kalkisTarihi"];
                                    $dzkalkis=date("d/m/Y H:i:s", strtotime($kalkis));
                                    echo $dzkalkis;  ?></td>
                        <td><?php echo $meetings["varisAdres"]  ?></td>
                        <td><?php echo $meetings["sofor"]  ?></td>
                        <td><?php echo $meetings["telefon"]  ?></td>
                  
                       
                        <td><?php echo $meetings["onay"]  ?></td>

                        



                        <td>
                           
                            <a href="ad_deleteMeeting.php?id=<?php echo  $meetings["id"];  ?>" class="btn btn-danger btn-sm">Delete</a>
                         
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>


            
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



<!-- Button to open the offcanvas sidebar -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var message2 = "<?php echo $mesaj2; ?>";
if(message2 !== "") {
    Swal.fire(message2);
}
</script>

<?php  include "../footer.php"   ?>