<?php
include "navbar.php";
include "function.php";

if(isset($_SESSION["message"])) {
    $mesaj2 = $_SESSION["message"];
    unset($_SESSION["message"]); // Mesajı aldıktan sonra oturumdan kaldır
   
  }

if(isset( $_SESSION["username"])) {
  
  $ka=$_SESSION["username"];

     // Mesajı aldıktan sonra oturumdan kaldır
   
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$sonuc = getRandevuTarihi();
$selectedDate = mysqli_fetch_assoc($sonuc);
$baslangicTarihi=$selectedDate["baslangicTarihi"];
$bitisTarihi=$selectedDate["bitisTarihi"];
$baslangicUnixZamani = strtotime($baslangicTarihi);
$bitisUnixZamani = strtotime($bitisTarihi);
$tarih=$_POST["datetime"];
$tarihNesnesi = new DateTime($tarih);
$unixZamani = $tarihNesnesi->format('U');

$formatli_tarih_ve_saat = date("Y-m-d H:i:s", strtotime($_POST["datetime"]));








  

  





if($baslangicUnixZamani<$unixZamani && $bitisUnixZamani>$unixZamani)
{
    $control=false;
    if(empty($_POST["username"]))
   {
      $control=true;
   }
   else
   {
      $username= safety($_POST['username']);
   }

   
if(empty($_POST["adsoyad"]))
{
   $control=true;
}
else
{
   $adsoyad= safety($_POST['adsoyad']);
}

if(empty($_POST["kalkis_il_adi"]))
{
   $control=true;
}
else
{
   $kalkis_il_adi= safety($_POST['kalkis_il_adi']);
  
}

if(empty($_POST["kalkis_ilce_adi"]))
{
   $control=true;
   echo "ilce post edilmemiş";
}
else
{
   $kalkis_ilce_adi= safety($_POST['kalkis_ilce_adi']);
}

if(empty($_POST["varis_il_adi"]))
{
   $control=true;
}
else
{
   $varis_il_adi= safety($_POST['varis_il_adi']);
}

if(empty($_POST["varis_ilce_adi"]))
{
   $control=true;
}
else
{
   $varis_ilce_adi= safety($_POST['varis_ilce_adi']);
}

if(empty($_POST["kalkisAdres"]))
{
   $control=true;
}
else
{
   $kalkisAdres= safety($_POST['kalkisAdres']);
}

if(empty($_POST["varisAdres"]))
{
   $control=true;
}
else
{
   $varisAdres= safety($_POST['varisAdres']);
}

if(empty($_POST["sofor"]))
{
   $control=true;
}
else
{
   $sofor= safety($_POST['sofor']);
}

if(empty($_POST["phone"]))
{
   $control=true;
}
else
{
   $phone= safety($_POST['phone']);
}


if($control==false)
{
    $sonuc2 = getMailAdressByUsername($username);
$selectedMail = mysqli_fetch_assoc($sonuc2);
$mailk=$selectedMail["kullaniciMail"];

    updateMeetings($username,$adsoyad,$kalkis_il_adi." ".$kalkis_ilce_adi." ".$kalkisAdres,$formatli_tarih_ve_saat,$varis_il_adi." ".$varis_ilce_adi." ". $varisAdres,$sofor,$phone);

    $message1=" $username kullanıcı adlı kullanıcı randevu talebi oluşturmuştur. Linke tıklayarak randevuyu görebilirsiniz. http://localhost/onlineTaksi/admin/ad_randevular.php  ";
    mail("lexvon53@gmail.com","Randevu Bildirimi",$message1);

    $message2="Randevunuz başarılı bir şekilde oluşturulmuştur yönetici onayından sonra tarafınıza bilgilendirme yapılacaktır.";
    mail("$mailk","Randevu Bildirimi",$message2);

    $message="Randevunuz Başarılı Bir Şekilde Alınmıştır. Yönetici Onayından sonra tarafınıza bilgilendirme yapılacaktır";
    $_SESSION["message"]=$message;
    header("Location: randevuGoruntuleKullanici.php");
    
    
}



    
}

else
{
    $message="Belirtilen Tarihte Randevu Alınamamaktadır";
    $_SESSION["message"]=$message;
    header("Location: randevual.php");
    
}









//   echo $kalkis_il_adi;
//   echo $varis_il_adi;



 
}
?>

<style>
    body {
        background-color: black;
    }

    .rounded-5 {
        border-radius: 2%;
    }

    .container
    {
        margin-top: 150px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="my-2">
    <div class="container rounded-5 " style="background-color: #ffb900;">
        <div class="row justify-content-center rounded-5">
            <div class="col-12 col-xxl-11">
                <div class="card border-light shadow-sm">
                    <div class="row g-0 rounded-5">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="images/taxi_call_dribbble.gif" alt="Welcome back you've been missed!">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <h5 class="text-center"><i class="fa fa-taxi" aria-hidden="true"></i> Make An Appointment <i class="fa fa-taxi" aria-hidden="true"></i></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <form method="post" id="randevu_formu">
                                        <div class="row gy-3 overflow-hidden">
                                            <!-- Kullanıcı adı -->
                                            <div class="col-12">
                                            <label for="" class="form-label">Username:</label>
                                                <div class="form-floating mb-3">
                                                  
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com" required>
                                                    <label for="username" class="form-label"><?php echo $ka;  ?></label>
                                                </div>
                                            </div>
                                            <!-- Ad soyad -->
                                            <div class="col-12">
                                            <label for="" class="form-label">Adınız ve Soyadınız:</label>

                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="adsoyad" id="adsoyad" placeholder="name@example.com" required>
                                                    <label for="adsoyad" class="form-label">Adınız Ve Soyadınız</label>
                                                </div>
                                            </div>
                                            <!-- İl -->
                                            <select id="iller" class="form-select" >
                                                <option value="">İl Seçin</option>
                                            </select>
                                            <br>
                                            <select id="ilceler" class="form-select">
                                                <option value="">İlçe Seçin</option>
                                            </select>
                                            <!-- Kalkış adres -->
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <textarea name="kalkisAdres" class="form-control" id="kalkisAdres"></textarea>
                                                    <label for="adsoyad" class="form-label">Kalkış Adresi</label>
                                                </div>
                                            </div>
                                            <!-- Kalkış tarih -->
                                            <div class="col-12">
                                                <label for="" class="form-label">Tarih Ve Saat</label>
                                                <div class="form-floating mb-3">
                                                   
                                                    <input type="datetime-local"  id="birthdaytime" name="datetime">
                                                </div>
                                            </div>
                                            <!-- Varış il -->
                                            <select id="iller2" class="form-select" >
                                                <option value="">İl Seçin</option>
                                            </select>
                                            <select id="ilceler2" class="form-select">
                                                <option value="">İlçe Seçin</option>
                                            </select>
                                            <!-- Varış adres -->
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <textarea name="varisAdres" class="form-control w-110" id="varisAdres"></textarea>
                                                    <label for="varis" class="form-label">Varış Adresi</label>
                                                </div>
                                            </div>
                                            <!-- Şoförler -->
                                            <div class="col-12">
                                                Şoförlerimiz
                                                <div class="card m-2 w-100" style="width: 18rem;">
                                                    <select data-mdb-select-init class="form-select" name="sofor">
                                                        <?php
                                                        $sonuc = getDriversG();
                                                        while ($drivers = mysqli_fetch_assoc($sonuc)) :
                                                        ?>
                                                            <option value="<?php echo $drivers["soforAdi"]; ?>"><?php echo $drivers["soforAdi"]; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Telefon -->
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="name@example.com" required>
                                                    <label for="phone" class="form-label"><?php echo $ka;  ?></label>
                                                </div>
                                            </div>
                                            <!-- Submit butonu -->
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" type="submit">Randevu Al</button>
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

<script>
    $(document).ready(function () {
        $.ajax({
            url: "adresApi.php",
            type: "GET",
            dataType: "json",
            success: function (data) {
                // İller combobox'ı doldur
                $.each(data.iller, function (index, value) {
                    $('#iller').append('<option value="' + value.il_id + '">' + value.il_ad + '</option>');
                    $('#iller2').append('<option value="' + value.il_id + '">' + value.il_ad + '</option>');
                });

                // İl combobox'ı değiştikçe ilçeleri güncelle
                $('#iller').on('change', function () {
                    var il_id = $(this).val();
                    $('#ilceler').empty();
                    $('#ilceler').append('<option value="">İlçe Seçin</option>');
                    $.each(data.ilceler[il_id], function (index, value) {
                        $('#ilceler').append('<option value="' + value.ilce_id + '">' + value.ilce_ad + '</option>');
                    });

                    
                });

                $('#iller2').on('change', function () {
                    var il_id = $(this).val();
                    $('#ilceler2').empty();
                    $('#ilceler2').append('<option value="">İlçe Seçin</option>');
                    $.each(data.ilceler[il_id], function (index, value) {
                        $('#ilceler2').append('<option value="' + value.ilce_id + '">' + value.ilce_ad + '</option>');
                    });

                    
                });
            }
        });

        // Form submit edildiğinde seçilen kalkış ili değerini hidden inputa aktar
        $('#randevu_formu').submit(function (e) {
            e.preventDefault(); // Formun default submit işlemini engelle

            var kalkis_il_adi = $('#iller option:selected').text(); // Seçilen ilin adını al
            var varis_il_adi = $('#iller2 option:selected').text(); // Seçilen ilin adını al
            var kalkis_ilce_adi = $('#ilceler option:selected').text(); // Seçilen ilin adını al
            var varis_ilce_adi = $('#ilceler2 option:selected').text(); // Seçilen ilin adını al


          

          

           

            $('<input>').attr({
                type: 'hidden',
                name: 'kalkis_il_adi',
                value: kalkis_il_adi
            }).appendTo($(this));
            $('<input>').attr({
                type: 'hidden',
                name: 'varis_il_adi',
                value: varis_il_adi
            }).appendTo($(this));

            $('<input>').attr({
                type: 'hidden',
                name: 'kalkis_ilce_adi',
                value: kalkis_ilce_adi
            }).appendTo($(this));

            $('<input>').attr({
                type: 'hidden',
                name: 'varis_ilce_adi',
                value: varis_ilce_adi
            }).appendTo($(this));

          
            this.submit(); // Formu submit et
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var message2 = "<?php echo $mesaj2; ?>";
if(message2 !== "") {
    Swal.fire(message2);
}
</script>

<?php include "footer.php"  ?>
