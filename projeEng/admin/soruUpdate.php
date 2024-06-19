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

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $control=false;
    if(empty($_POST["soru1"]))
    {
        $control=true;
      
    }
    else
    {
       $soru1= safety($_POST['soru1']);

    }

    
    if(empty($_POST["soru2"]))
    {
        $control=true;
       
    }
    else
    {
       $soru2= safety($_POST['soru2']);
        
    }
    if(empty($_POST["soru3"]))
    {
        $control=true;
       
    }
    else
    {
       $soru3= safety($_POST['soru3']);
        
    }
    if(empty($_POST["soru4"]))
    {
        $control=true;
       
    }
    else
    {
       $soru4= safety($_POST['soru4']);
        
    }
    if(empty($_POST["soru5"]))
    {
        $control=true;
  
    }
    else
    {
       $soru5= safety($_POST['soru5']);
        
    }
    if(empty($_POST["soru6"]))
    {
        $control=true;
  
    }
    else
    {
       $soru6= safety($_POST['soru6']);
        
    }
    

   
  
    if($control==false)
    {
        updateSorular($id,$soru1,$soru2,$soru3,$soru4,$soru5,$soru6);
       header("Location: ad_soforler.php");
        
     
        $message="Şoför Başarıyla Güncellendi";
        $_SESSION["message"]=$message;
       

     

    }
    
}







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
                                src="../images/image_processing20191107-15675-1476317.gif" alt="Welcome back you've been missed!">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <h5 class="text-center"><i class="fa fa-taxi"
                                                        aria-hidden="true"></i> Evaluation Questions
 <i
                                                        class="fa fa-taxi" aria-hidden="true"></i></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <form method="post">
                                        <div class="row gy-3 overflow-hidden">
                                            <!--BASLANGİC-->
                                            <div class="col-12">
                                            <div class="mb-3">
                                                    <label for="start_date" class="form-label">Question 1 </label>
                                                  <textarea name="soru1" class="form-control" id=""  placeholder="<?php echo $soru1 ?>"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                            <div class="mb-3">
                                                    <label for="start_date" class="form-label">Question 2</label>
                                                  <textarea name="soru2" class="form-control" id=""  placeholder="<?php echo $soru2 ?>"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                            <div class="mb-3">
                                                    <label for="start_date" class="form-label">Question 3</label>
                                                  <textarea name="soru3" class="form-control" id=""  placeholder="<?php echo $soru3 ?>"></textarea>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                            <div class="mb-3">
                                                    <label for="start_date" class="form-label">Question 4</label>
                                                  <textarea name="soru4" class="form-control" id=""  placeholder="<?php echo $soru4 ?>"></textarea>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                            <div class="mb-3">
                                                    <label for="start_date" class="form-label">Question 5</label>
                                                  <textarea name="soru5" class="form-control" id=""  placeholder="<?php echo $soru5 ?>"></textarea>
                                                </div>
                                            </div>


                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="start_date" class="form-label">Question 6</label>
                                                  <textarea name="soru6" class="form-control" id=""  placeholder="<?php echo $soru6 ?>"></textarea>
                                                </div>
                                            </div>
                                            <!--BİTİS-->
                                          
                                            <div class="d-grid">
                                                <button class="btn btn-dark btn-lg" type="submit">Update</button>
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