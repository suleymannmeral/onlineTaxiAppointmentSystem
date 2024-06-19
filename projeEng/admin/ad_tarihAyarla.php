<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Tarih Listeleme</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .container {
            flex: 1;
        }
        footer {
            margin-top: auto;
        }
    </style>
</head>
<body>

<?php
include "ad_header.php";
include "../database/db.php";
include "ad_navbar.php";
include "../function.php";


if(isset($_SESSION["message2"])) {
    $mesaj2 = $_SESSION["message2"];
    unset($_SESSION["message2"]); // Mesajı aldıktan sonra oturumdan kaldır
}
?>
<style>
    .container
    {
        margin-top: 150px;
    }
</style>

<div class="container ">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Starting Date</th>
                        <th>End Date</th>
                        <th>Transaction</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sonuc = getDateFromDatabase(); // doğru fonksiyon adını çağırın
                    while($dates = mysqli_fetch_assoc($sonuc)): ?> 

                    <?php
                    $baslangicTarihi = $dates["baslangicTarihi"];
                    $bitisTarihi = $dates["bitisTarihi"];
                    $dzbitis = date("d/m/Y", strtotime($bitisTarihi));
                    $dzbaslangic = date("d/m/Y", strtotime($baslangicTarihi));
                    ?>
                        <tr>
                            <td><?php echo $dzbaslangic ?></td>
                            <td><?php echo $dzbitis ?></td>
                            <td>
                                <a href="ad_tarihDegistir.php?id=<?php echo $dates["id"]; ?>" class="btn btn-warning btn-sm">Change Date</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<footer class="text-center text-white" style="background-color: black">
    <section class="d-flex justify-content-between p-4" style="background-color: #FFB900">
        <div class="me-5">
            <span>Contact With US:</span>
        </div>
        <div>
            <a href="" class="text-warning me-4"><i class="fab fa-facebook-f"></i></a>
            <a href="" class="text-white me-4"><i class="fab fa-twitter"></i></a>
            <a href="" class="text-white me-4"><i class="fab fa-google"></i></a>
            <a href="" class="text-white me-4"><i class="fab fa-instagram"></i></a>
            <a href="" class="text-white me-4"><i class="fab fa-linkedin"></i></a>
            <a href="" class="text-white me-4"><i class="fab fa-github"></i></a>
        </div>
    </section>

    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase text-warning fw-bold">Online Taksi</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                    <a href="index.php" class=""><img src="../images/logo.png" alt="..." width="250px" style="border-radius: 50%;" ></a> 
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold">Ürünler</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                    <p><a href="#!" class="text-warning">MDBootstrap</a></p>
                    <p><a href="#!" class="text-warning">MDWordPress</a></p>
                    <p><a href="#!" class="text-warning">BrandFlow</a></p>
                    <p><a href="#!" class="text-warning">Bootstrap Angular</a></p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold">Faydalı Bağlantılar</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                    <p><a href="#!" class="text-warning">Hesabınız</a></p>
                    <p><a href="#!" class="text-warning">Ortaklık</a></p>
                    <p><a href="#!" class="text-warning">Kargo Ücretleri</a></p>
                    <p><a href="#!" class="text-warning">Yardım</a></p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold">İletişim</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px"/>
                    <p><i class="fas fa-home mr-3"></i> Aksaray Merkez</p>
                    <p><i class="fas fa-envelope mr-3"></i> onlinetaksi@example.com</p>
                    <p><i class="fas fa-phone mr-3"></i> +90 538 377 03 10</p>
                    <p><i class="fas fa-print mr-3"></i> +90 234 567 89</p>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2024 Telif Hakkı:
        <a class="text-warning" href="">Online Taksi</a>
    </div>
</footer>

<script>
var message2 = "<?php echo isset($mesaj2) ? $mesaj2 : ''; ?>";
if (message2) {
    Swal.fire(message2);
}
</script>

</body>
</html>
