<?php
ob_start();
include "../database/db.php";
include "ad_navbar.php";
include "../function.php";


$id = $_GET['id']; // id parametresini al
getDatesById($id);
$sonuc = getDatesById($id);
$selectedDate = mysqli_fetch_assoc($sonuc);
$control = false;
$baslangicTarihi = "";
$bitisTarihi = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["baslangicTarihi"]) || empty($_POST["bitisTarihi"])) {
        $control = true;
        echo "Başlangıç ve/veya bitiş tarihi boş olamaz.";
    } else {
        $baslangicTarihi = safety($_POST['baslangicTarihi']);
        $bitisTarihi = safety($_POST['bitisTarihi']);
    }

    if (!$control) {
        $id = $_GET["id"];
        changeDate($id, $baslangicTarihi, $bitisTarihi);
        
        $message2="Tarih Başarıyla Değiştirildi";
        $_SESSION['message2'] = $message2;
        header('Location: ad_tarihAyarla.php');
    }
}
ob_end_flush();
?>

<style>
    .container
    {
        margin-top:120px  ;
    }

    .rounded-5
    {
         border-radius: 2%;
    }
</style>

<section class="p-3 " style="background-color: black">
    <div class="container rounded-5" style="background-color: #ffb900;">
        <div class="row justify-content-center rounded-5">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0 rounded-5">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                src="../images/date.gif" alt="Welcome back you've been missed!">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <h5 class="text-center"><i class="fa fa-taxi"
                                                        aria-hidden="true"></i> Date Change <i
                                                        class="fa fa-taxi" aria-hidden="true"></i></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <form method="post">
                                        <div class="row gy-3 overflow-hidden">
                                            <!--BASLANGİC-->
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="start_date" class="form-label">Starting date
</label>
                                                    <input type="date" class="form-control" id="start_date"
                                                        name="baslangicTarihi" min="2022-01-01" max="2030-12-31"
                                                        required>
                                                </div>
                                            </div>
                                            <!--BİTİS-->
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="end_date" class="form-label">End Date
</label>
                                                    <input type="date" class="form-control" id="end_date"
                                                        name="bitisTarihi" min="2022-01-01" max="2030-12-31" required>
                                                </div>
                                            </div>
                                            <div class="d-grid">
                                                <button class="btn btn-dark btn-lg" type="submit">Save</button>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<?php include "ad_footer.php"  ?>

