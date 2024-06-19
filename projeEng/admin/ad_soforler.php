<?php

include "ad_navbar.php";
include "../function.php";

$mesaj2 = ""; // Başlangıçta mesaj2 değişkenini boş olarak tanımla

if(isset($_SESSION["message"])) {
    $mesaj2 = $_SESSION["message"];
    unset($_SESSION["message"]); // Mesajı aldıktan sonra oturumdan kaldır
   
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
            <div class=" p-2 mb-2">
                <a href="ad_addDrivers.php" class="btn btn-dark">Add Driver</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th style="width: 50px;">Id</th>
                      <th style="width: 120px;">Phoro</th>
                      <th>Name</th>
                     
                      <th style="width: 110px;">Plate</th>
                      <th style="width: 160px;">Phone</th>
                      <th>Mail</th>
                      <th>Vehicle</th>
                      <th>Point</th>
                      <th style="width: 170px;">Transaction</th>



                    </tr>
                </thead>
                <tbody>
                    <?php $sonuc = getDriversG(); while($drivers = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td><?php echo $drivers["id"] ?></td>
                        <td><img class="img-fluid" src="../images/<?php echo $drivers["soforResim"] ?>" alt=""></td>
                        <td><?php echo $drivers["soforAdi"]  ?></td>
                   
                        <td><?php echo $drivers["plaka"]  ?></td>
                        <td><?php echo $drivers["telefon"]  ?></td>
                        <td><?php echo $drivers["soforMail"]  ?></td>
                        <td><?php echo $drivers["aracOzellikleri"]  ?></td>
                        <td><?php echo $drivers["puan"]  ?></td>



                        <td>
                            <a href="ad_updateDrivers.php?id=<?php echo $drivers["id"]   ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="ad_deleteSofor.php?id=<?php echo $drivers["id"] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
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
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<?php  include "ad_footer.php"  ?>