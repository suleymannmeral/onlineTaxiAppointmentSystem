
<?php
 include "navbar.php"  ;
include "function.php";


if(isset($_SESSION["message"])) {
    $mesaj2 = $_SESSION["message"];
    unset($_SESSION["message"]); // Mesajı aldıktan sonra oturumdan kaldır
   
  }

if(isset( $_SESSION["username"])) {
  
    $ad=$_SESSION["username"];
  
      
     
    }


    
$limit = 3; // Sayfa başına gösterilecek kayıt sayısı
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Mevcut sayfa numarası
$offset = ($page - 1) * $limit; // Başlangıç noktası

$total_records =getTotalMeetingsOnayBekleyenByAd($ad); // Toplam kayıt sayısı
$total_pages = ceil($total_records / $limit); // Toplam sayfa sayısı

$sonuc = getMeetingsOnayBekleyenByAd($limit, $offset,$ad);
?>



<style>
    body
    {
        background-color: white;
    }

    .container
    {
        margin-top: 150px;
    }
</style>

<div class="container ">
<ul class="nav nav-tabs d-flex justify-content-center align-items-center mb-4">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="randevugoruntuleKullanici.php">My Active Appointments</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="randevuGoruntuleKullaniciBekleyenRandevu.php">Appointments Pending Approval
</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="randevuGoruntuleKullaniciGecmis.php">
My Past Appointments</a>
  </li>
 
</ul>
    
    <div class="row">
        <div class="col-12">

        <h1 class="text-center mb-3">My Appointments Awaiting Approval</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th style="width: 50px;">Id</th>
                      <th>Username</th>
                      <th>Name</th>
                      <th style="width: 200px;">Departure Adress</th>
                      <th>Departure Date</th>
                      <th style="width: 130px;">Destination Adress</th>

                      <th>Driver</th>
                      <th>Phone</th>
                      
                     
                      <th style="width: 200px;" >Transactions</th>
                      


                    </tr>
                </thead>
                <tbody>
                    <?php while($selectedMeetings= mysqli_fetch_assoc($sonuc)):
                        
                        $soforAdi=$selectedMeetings["sofor"];
                        $sonuc11=getSoforIdBySoforAdi($soforAdi);
                        $sonuc12=mysqli_fetch_assoc($sonuc11);
                        $selectedSoforId=$sonuc12["id"];
                        
                        ?>
                    <tr>
                    <td><?php echo $selectedMeetings["id"] ?></td>
                        <td><?php echo $selectedMeetings["kullaniciAdi"] ?></td>
                        <td><?php echo $selectedMeetings["adSoyad"]  ?></td>
                        <td><?php echo $selectedMeetings["kalkisAdres"]  ?></td>
                        <td><?php $kalkis=$selectedMeetings["kalkisTarihi"];
                                    $dzkalkis=date("d/m/Y H:i:s", strtotime($kalkis));
                                    echo $dzkalkis;
                        ?>
                    
                    </td>
                        <td><?php echo $selectedMeetings["varisAdres"]  ?></td>
                        <td> <a href="viewDriverDetails.php?id=<?php echo $selectedSoforId ?>"><?php echo $selectedMeetings["sofor"]  ?></a></td>
                        <td><?php echo $selectedMeetings["telefon"]  ?></td>
                  


                   
                        <td>
                            <a href="randevuEdit.php?id=<?php echo $selectedMeetings["id"] ?>" class="btn btn-warning btn-sm">Düzenle</a>
                            <a href="randevuiptal.php?id=<?php echo $selectedMeetings["id"] ?>" class="btn btn-dark btn-sm">İptal Et</a>
                          
                          
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>


            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . ($page - 1); } ?>">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=" . ($page + 1); } ?>">Next</a>
                    </li>
                </ul>
            </nav>
        
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var message2 = "<?php echo $mesaj2; ?>";
if(message2 !== "") {
    Swal.fire(message2);
}
</script>

<?php include "footer.php"   ?>