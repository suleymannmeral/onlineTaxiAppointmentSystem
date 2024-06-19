<?php
ob_start(); // Çıktı tamponlamayı başlat

include "ad_header.php";
include "ad_navbar.php";
include "/laragon/www/onlineTaksi/function.php";
include "/laragon/www/onlineTaksi/database/db.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $control=false;
    if(empty($_POST["soforAdi"]))
    {
        $control=true;
        $message="Sofor";
    }
    else
    {
        $soforAdi= safety($_POST['soforAdi']);
    }

    if(empty($_FILES["imageFile"]["name"]))
    {
        $control=true;
        $message="resim Giriniz";
    }
    else
    {
        uploadImage($_FILES["imageFile"]);
        $resim=$_FILES["imageFile"]["name"];
    }

    if(empty($_POST["plaka"]))
    {
        $control=true;
        $soforSoyadi="Alt BAşlık Giriniz";
    }
    else
    {
        $plaka= safety($_POST['plaka']);
    }

    if(empty($_POST["telefon"]))
    {
        $control=true;
        $soforSoyadi="Alt BAşlık Giriniz";
    }
    else
    {
        $telefon= safety($_POST['telefon']);
    }

    if(empty($_POST["mail"]))
    {
        $control=true;
        $soforSoyadi="Alt BAşlık Giriniz";
    }
    else
    {
        $mail= safety($_POST['mail']);
    }

    if(empty($_POST["aracozellikleri"]))
    {
        $control=true;
        $soforSoyadi="Alt BAşlık Giriniz";
    }
    else
    {
        $aracozellikleri= safety($_POST['aracozellikleri']);
    }

    $mesaj2 = ""; // Başlangıçta mesaj2 değişkenini boş olarak tanımla

    if($control==false)
    {
        createDrivers($soforAdi, $resim, $plaka, $telefon, $mail, $aracozellikleri, 0);
        header("Location:ad_soforler.php");
        exit(); // Header gönderildikten sonra scripti durdur
    }
    ob_end_flush();
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
    body
    {
        background-color: black;
    }

    .container
    {
      margin-top: 120px;
    }
</style>
<section class=" p-3 p-md-4 p-xl-5 " style="background-color: black">
  <div class=" container rounded-5" style="background-color: #ffb900;">
    <div class="row justify-content-center rounded-5">
      <div class="col-12 col-xxl-11">
        <div class="card border-light-subtle shadow-sm">
          <div class="row g-0 rounded-5">
            <div class="col-12 col-md-6">
              <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="../images/sofkay.gif" alt="Welcome back you've been missed!">
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-5">
                      
                        <h5 class="text-center"><i class="fa fa-taxi" aria-hidden="true"></i> Driver Addition<i class="fa fa-taxi" aria-hidden="true"></i></h5>
                      </div>
                    </div>
                  </div>
                
                  <form  method="post" enctype="multipart/form-data">
                    <div class="row gy-3 overflow-hidden">

                  
                    
                      
                   
                      <!--Şofçr Adı -->
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="soforAdi" id="soforAdi" placeholder="name@example.com" required>
                          <label for="soforad" class="form-label">Driver's Name</label>
                        </div>
                      </div>
                          <!--Şofor Soyadi-->
                     
                      <!--Sofor Resim -->
                      <div class="col-12">
                      
                        <div class="input-group mb-3">
                        <input type="file" name="imageFile" id="image" class="form-control">
                        <label for="imageFile" class="input-group-text">Photo</label>

                        </div>

                      </div>
                            <!--Plaka-->
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="plaka" id="plaka" placeholder="name@example.com" required>
                          <label for="plaka" class="form-label">Plate</label>
                        </div>
                      </div>
                       <!--Telefon-->
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="telefon" id="telefon" placeholder="name@example.com" required>
                          <label for="telefon" class="form-label">Phone</label>
                        </div>
                      </div>
                       <!--Mail-->
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control" name="mail" id="mail" placeholder="name@example.com" required>
                          <label for="mail" class="form-label">Mail Adress</label>
                        </div>
                      </div>
                          <!--Araç Özell-->
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="aracozellikleri" id="aracozellikleri" placeholder="name@example.com" required>
                          <label for="aracozellikleri" class="form-label">Vehicle</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn btn-dark btn-lg" type="submit">Save</button>
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

<?php  include "../footer.php"     ?>