<?php

include "ad_navbar.php";
include "../function.php";


$sonuc=getPuanlamaSorilari();
$sonuc2=mysqli_fetch_assoc($sonuc);

$id=$sonuc2["id"];

$soru1= $sonuc2["s1text"];
$soru2= $sonuc2["s2text"];
$soru3= $sonuc2["s3text"];
$soru4= $sonuc2["s4text"];
$soru5= $sonuc2["s5text"];
$soru6= $sonuc2["s6text"];


?>
<style>
    .container
    {
        margin-top: 160px;
        margin-bottom: 150px;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="container">
<a href="ad_soruAyarlari.php" class="btn btn-dark">Question Settings</a>
<h1 class="text-center mb-3"> Evaluation (1-3)</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                      <th>Randevu Id</th>
                      <th>Driver</th>

                      <th><?php echo $soru1  ?></th>
                      <th><?php echo $soru2 ?></th>
                      <th><?php echo $soru3  ?></th>
                      <th><?php echo $soru4  ?></th>
                      <th><?php echo $soru5  ?></th>
                      <th><?php echo $soru6  ?></th>
            
                   

                 



                    </tr>
                </thead>
                <tbody>
                    <?php $sonuc = getDegerlendirme(); while($meetings = mysqli_fetch_assoc($sonuc)):
                        $sonuc2=getMeetingsById($meetings["randevuId"]);
                      $sonuc3=mysqli_fetch_assoc($sonuc2);
                      $selectedSofor=$sonuc3["sofor"];
                     $sonuc4= getSoforIdBySoforAdi($selectedSofor);
                     $sonuc5=mysqli_fetch_assoc($sonuc4);
                     $selectedSoforId=$sonuc5["id"];

                      



                        ?>
                    <tr>
                        <td><?php echo $meetings["randevuId"] ?></td>
                        <td><a href="../viewDriverDetails.php?id=<?php echo $selectedSoforId  ?>"><?php echo $selectedSofor ?></a></td>
                        <td><?php echo $meetings["soru1"] ?></td>
                        <td><?php echo $meetings["soru2"]  ?></td>
                        <td><?php echo $meetings["soru3"]  ?></td>
                        <td><?php echo $meetings["soru4"]  ?></td>
                        <td><?php echo $meetings["soru5"]  ?></td>
                        <td><?php echo $meetings["soru6"]  ?></td>
                        
                  
                       
                      

                        



                   
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
</div>


<?php include "ad_footer.php"   ?>