<?php
ob_start();

include "ad_navbar.php";
include "../function.php";

$id = $_GET["id"];
$sonuc = getDriversById($id);
$selectedDriver = mysqli_fetch_assoc($sonuc);

$ad = $selectedDriver["soforAdi"];
$plaka = $selectedDriver["plaka"];
$telefon = $selectedDriver["telefon"];
$mail = $selectedDriver["soforMail"];
$resim = $selectedDriver["soforResim"];
$aracozellikleri = $selectedDriver["aracOzellikleri"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $control = false;
    if (empty($_POST["soforAdi"])) {
        $control = true;
        $message = "Sofor";
    } else {
        $soforAdi = safety($_POST['soforAdi']);
    }

    if (empty($_FILES["imageFile"]["name"])) {
        $control = true;
        $message = "resim Giriniz";
    } else {
        uploadImage($_FILES["imageFile"]);
        $resim = $_FILES["imageFile"]["name"];
    }
    if (empty($_POST["plaka"])) {
        $control = true;
        $soforSoyadi = "Alt BAşlık Giriniz";
    } else {
        $plaka = safety($_POST['plaka']);
    }
    if (empty($_POST["telefon"])) {
        $control = true;
        $soforSoyadi = "Alt BAşlık Giriniz";
    } else {
        $telefon = safety($_POST['telefon']);
    }
    if (empty($_POST["mail"])) {
        $control = true;
        $soforSoyadi = "Alt BAşlık Giriniz";
    } else {
        $mail = safety($_POST['mail']);
    }
    if (empty($_POST["aracozellikleri"])) {
        $control = true;
        $soforSoyadi = "Alt BAşlık Giriniz";
    } else {
        $aracozellikleri = safety($_POST['aracozellikleri']);
    }
    $mesaj2 = ""; // Başlangıçta mesaj2 değişkenini boş olarak tanımla

    if ($control == false) {
        updateDrivers($id, $soforAdi, $resim, $plaka, $telefon, $mail, $aracozellikleri);
        header("Location: ad_soforler.php");
        ob_end_flush(); // Flush the output buffer
        $message = "Şoför Başarıyla Güncellendi";
        $_SESSION["message"] = $message;
        exit(); // Ensure script stops after redirect
    }
}
?>

<style>
    .custom-input {
    height: 60px; /* Input yüksekliği */
}
.container
{
  margin-top: 120px;
}

.rounded-5
{
  border-radius: 2%;
}
</style>

<section class=" p-3 p-md-4 p-xl-5 " style="background-color: black">
  <div class=" container rounded-5" style="background-color: #ffb900;">
    <div class="row justify-content-center rounded-5">
      <div class="col-12 col-xxl-11">
        <div class="card border-light-subtle shadow-sm">
          <div class="row g-0 rounded-5">
            <div class="col-12 col-md-6">
              <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="../images/<?php echo $resim ?>" alt="Welcome back you've been missed!">
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-5">
                      
                        <h5 class="text-center"><i class="fa fa-taxi" aria-hidden="true"></i> Driver Update <i class="fa fa-taxi" aria-hidden="true"></i></h5>
                      </div>
                    </div>
                  </div>
                
                  <form  method="post" enctype="multipart/form-data">
                    <div class="row gy-3 overflow-hidden">

                  
                    
                      
                   
                      <!--Şofçr Adı -->
                      <div class="col-12">
                      <div class="mb-3">
                      <label for="soforAdi" class="form-label">Driver's Name </label>
    <input type="text" class="form-control custom-input" name="soforAdi" id="soforAdi" placeholder="<?php echo htmlspecialchars($ad); ?>" required>
    
</div>

                      </div>
                     
                      </div>
                      <!--Sofor Resim -->
                      <div class="col-12">
                      
                        <div class="input-group mb-3">
                       
                        <input type="file" name="imageFile" id="image" placeholder="" class="form-control">
                        <label for="imageFile" class="input-group-text">Driver's Photo</label>
                 

                        </div>

                      </div>
                            <!--Plaka-->
                      <div class="col-12">
                        <div class=" mb-3">
                        <label for="plaka" class="form-label">Plate</label>
                          <input type="text" class="form-control custom-input" name="plaka" id="plaka" placeholder="<?php echo htmlspecialchars($plaka); ?>" required>
                       
                        </div>
                      </div>
                       <!--Telefon-->
                      <div class="col-12">
                        <div class=" mb-3">
                        <label for="telefon" class="form-label">Photo</label>
                          <input type="text" class="form-control custom-input" name="telefon" id="telefon" placeholder="<?php echo htmlspecialchars($telefon); ?>" required>
                       
                        </div>
                      </div>
                       <!--Mail-->
                      <div class="col-12">
                        <div class=" mb-3">
                        <label for="mail" class="form-label">Mail Adress</label>
                          <input type="email" class="form-control custom-input" name="mail" id="mail" placeholder="<?php echo htmlspecialchars($mail); ?>" required>
                       
                        </div>
                      </div>
                          <!--Araç Özell-->
                      <div class="col-12">
                        <div class=" mb-3">
                        <label for="aracozellikleri" class="form-label">Vehicle</label>
                          <input type="text" class="form-control custom-input" name="aracozellikleri" id="aracozellikleri" placeholder="<?php echo htmlspecialchars($aracozellikleri); ?>" required>
                        
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn btn-dark btn-lg" type="submit">Update</button>
                        </div>
                      </div>
                    </div>
                  </form>
             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php   include "../footer.php"    ?>




