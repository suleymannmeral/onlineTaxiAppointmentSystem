<?php

include "navbar.php";
include "function.php";

$id=$_GET["id"];
$sonuc=getDriversById($id);
$selectedDriver= mysqli_fetch_assoc($sonuc);

$ad=$selectedDriver["soforAdi"];
$plaka=$selectedDriver["plaka"];
$telefon=$selectedDriver["telefon"];
$mail=$selectedDriver["soforMail"];
$resim=$selectedDriver["soforResim"];
$aracozellikleri=$selectedDriver["aracOzellikleri"];


    




?>


<style>
    .custom-input {
    height: 60px; /* Input yüksekliği */
}

.container
{
  margin-top: 100px;
}

.containerimg {
  position: relative;
  width: 100%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  background-image: url(images/black.jpg);
  overflow: hidden;
  width: 100%;
  height:0;
  transition: 1s ease;
}

.containerimg:hover .overlay {
  bottom: 0;
  height: 100%;
}

.text {
  color: #ffb900;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
} 

.rounded-5
{
  border-radius: 2%;
}
</style>

<section class=" p-4 p-md-4 p-xl-5 " style="background-color: black">
  <div class=" container rounded-5" style="background-color: #ffb900;">
    <div class="row justify-content-center rounded-5">
      <div class="col-12 col-xxl-11">
        <div class="card border-light-subtle shadow-sm">
          <div class="row g-0 rounded-5">
            <div class="col-12 col-md-6">
            <div class="containerimg">
            <img class="img-fluid rounded-start w-150 h-100 object-fit-cover" loading="lazy" src="images/<?php echo $resim ?>" alt="Welcome back you've been missed!">
  <div class="overlay">
    <div class="text"><?php echo htmlspecialchars($ad); ?></div>
  </div>
</div>
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-5">
                      
                        <h2 class="text-center"><i class="fa fa-taxi" aria-hidden="true"></i> <?php echo htmlspecialchars($ad); ?> <i class="fa fa-taxi" aria-hidden="true"></i></h2>
                      </div>
                    </div>
                  </div>
                
                  <form  method="post" enctype="multipart/form-data">
                    <div class="row gy-3 overflow-hidden">

                  
                    
                      
                   <hr>
                      <!--Şofçr Adı -->
                      <div class="col-12">
                      <div class="mb-4">
                             <h4>Driver's Name: <?php echo htmlspecialchars($ad); ?></h4>
                                    
</div>
                      </div>
                      <hr>
                     
                      </div>
                      <!--Sofor Resim -->
                  
                            <!--Plaka-->
                      <div class="col-12">
                        <div class=" mb-4">
                        <h4>Plate: <?php echo htmlspecialchars($plaka); ?></h4>
                       
                        </div>
                      </div>
                      <hr>
                       <!--Telefon-->
                      <div class="col-12">
                        <div class=" mb-4">
                        <h4>Phone: <?php echo htmlspecialchars($telefon); ?></h4>
                         
                       
                        </div>
                      </div>
                      <hr>
                       <!--Mail-->
                      <div class="col-12">
                        <div class=" mb-4">
                        <h4>Mail: <?php echo htmlspecialchars($mail); ?></h4>
                        
                       
                        </div>
                      </div>
                      <hr>
                          <!--Araç Özell-->
                      <div class="col-12">
                        <div class=" mb-4">
                      <h4>Vehicle: <?php echo htmlspecialchars($aracozellikleri); ?></h4>
                                 
                        
                        </div>
                      </div>
                      <hr>
                  
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


<?php include "footer.php"  ?>



