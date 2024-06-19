
<?php include "function.php"   ?>
<?php include "navbar.php";


if(isset( $_SESSION["username"])) {
  
    $ka=$_SESSION["username"];
  
     
     
    }

    $sonuc=getKullaniciBilgileriByUsername($ka);
    $sonuc2=mysqli_fetch_assoc($sonuc);
    $ad=$sonuc2["kullaniciAd"]." ".$sonuc2["kullaniciSoyad"];
?>



<style>
.rounded-5 {
    border-radius: 2%;
}

.container
{
    margin-top: 130px;
}


</style>

<section class="p-3 " style="background-color: black; ">
    <div class="container rounded-5 " style="background-color: #ffb900;">
        <div class="row justify-content-center rounded-5">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0 rounded-5">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                src="images/0131779f9b312a261fcb89bf8c223971.gif"
                                alt="Welcome back you've been missed!">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <link rel="stylesheet"
                                                    href="path/to/font-awesome/css/font-awesome.min.css">
                                                <h4 class="text-center"><i class="fa fa-taxi"
                                                        aria-hidden="true"></i> User Update <i
                                                        class="fa fa-taxi" aria-hidden="true"></i></h4>
                                            </div>
                                        </div>
                                    </div>

                                    <form method="post">
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                   <h4>Name: <?php echo $ad ?> </h4>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                <h4>Username: <?php echo $ka ?> </h4>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                            <h4>Phone: <?php echo $sonuc2["kullaniciTelefon"] ?>  </h4>
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                            <h4>Mail: <?php echo $sonuc2["kullaniciMail"] ?>  </h4>
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                 <a href="kullaniciGuncelle.php" class="btn btn-dark">Update</a>
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

<?php  include "footer.php"  ?>
