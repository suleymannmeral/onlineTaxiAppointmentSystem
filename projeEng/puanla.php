<?php

include "navbar.php";
include "function.php";

$id=$_GET["id"];

$sonuc1=getMeetingsById($id);
$selectedMeetings= mysqli_fetch_assoc($sonuc1);
$sofor=$selectedMeetings["sofor"];

$sonuc2=getDriversByAd($sofor);
$selectedDriver=mysqli_fetch_assoc($sonuc2);
$soforPuan=$selectedDriver["puan"];

$soforPuanInt=(int)$soforPuan;

$sonuc=getPuanlamaSorilari();
$sonuc2=mysqli_fetch_assoc($sonuc);



$soru1= $sonuc2["s1text"];
$soru2= $sonuc2["s2text"];
$soru3= $sonuc2["s3text"];
$soru4= $sonuc2["s4text"];
$soru5= $sonuc2["s5text"];
$soru6= $sonuc2["s6text"];






if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $control=false;

    // in1
    if(empty($_POST["in1"]))
    {
        $control=true;
       $message="Sofor";
    }
    else
    {
       $in1=$_POST["in1"];
       $s1=(int)$in1;

    }
    //in2

    if(empty($_POST["in2"]))
    {
        $control=true;
      
    }
    else
    {
      
      $in2=$_POST["in2"];
      $s2=(int)$in2;
    }
    
    //in3
    if(empty($_POST["in3"]))
    {
        $control=true;
     
    }
    else
    {
      
      $in3=$_POST["in3"];
      $s3=(int)$in3;
    }

     //in4
     if(empty($_POST["in4"]))
     {
         $control=true;
      
     }
     else
     {
       
       $in4=$_POST["in4"];
       $s4=(int)$in4;
     }
     //in5
 
     if(empty($_POST["in5"]))
     {
         $control=true;
      
     }
     else
     {
       
       $in5=$_POST["in5"];
       $s5=(int)$in5;
     }

      //in6
 
      if(empty($_POST["in6"]))
      {
          $control=true;
       
      }
      else
      {
        
        $in6=$_POST["in6"];
        $s6=(int)$in6;
        
      }
  

  
 $avg=($s1+$s2+$s3+$s4+$s5+$s6)/6;
 $lastPoint=(int)$soforPuanInt+(int)$avg;
$username=$_SESSION["username"];
 $message="
 $username kullanıcı adlı kullanıcı taksi randevusunu onaylamıştır:

 Şoförün Size Karşı Davranışı:$in1

 Araç Konforu:$in2

 Şoförü Diğer İnsanlara Tavsiye Ederim:$in3

 Uygulamadan genel olarak memnun kaldım:$in4

 Tekrar Online Taksi Uygulamasını Kullanacağım:$in5

 Uygulamanın hızlı ve yararlı olduğunu düşünüyorum:$in6


 ";

mail("lexvon53@gmail.com","Randevu Puanlandı",$message);
 updatePoint($lastPoint,$sofor);

 createDegerlendirme($id,$in1,$in2,$in3,$in4,$in5,$in6);


      
 
 

    
    

    
    


    

   
  
    
}



?>

<style>
    body {
    background: #eee
}

#regForm {
    background-color: #ffffff;
    margin: 0px auto;
    font-family: Raleway;
    padding: 40px;
    border-radius: 10px
}

#register{

  color: #6A1B9A;
}

h1 {
    text-align: center
}

input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 10px;
  
}



.tab input:focus{

  border:1px solid #6a1b9a !important;
  outline: none;
}

input.invalid {
 
    border:1px solid #e03a0666;
}

.tab {
    display: none
}

button {
    background-color: #FFB900;
    color: black;
    border: none;
    border-radius: 50%;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer
}

button:hover {
    opacity: 0.8
}

button:focus{

  outline: none !important;
}

#prevBtn {
    background-color: #FFB900
}


.all-steps{
      text-align: center;
    margin-top: 30px;
    margin-bottom: 30px;
    width: 100%;
    display: inline-flex;
    justify-content: center;
}

.step {
       height: 40px;
    width: 40px;
    margin: 0 2px;
    background-color: black;
    border: none;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 15px;
    color: #FFB900;
    opacity: 0.5;
}

.step.active {
    opacity: 1
}


.step.finish {
   color: black;
   background: #FFB900;
   opacity: 1;

}



.all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px
}

.thanks-message {
    display: none
}

.container
{
  margin-top: 150px;
  margin-bottom: 50px;
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="container ">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <form id="regForm" method="post">
                <h1 id="register" style="color: black;">Evaluation form
</h1>
                <div class="all-steps" id="all-steps"> 
                  <span class="step"><i class="fa fa-taxi" aria-hidden="true"></i></span> 
                  <span class="step"><i class="fa fa-map-marker"></i></span>
                  <span class="step"><i class="fa fa-shopping-bag"></i></span>
                  <span class="step"><i class="fa fa-car"></i></span>
                  <span class="step"><i class="fa fa-spotify"></i></span>
                  <span class="step"><i class="fa fa-mobile-phone"></i></span>
                </div>

                <!-- Şoförün size davranışı -->
                <div class="tab">
                  <h6><?php echo $soru1      ?>
</h6>
                    <p>
                    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in1" id="inlineRadio1" value="1">
  <label class="form-check-label" for="inlineRadio1">1</label>
   
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in1" id="inlineRadio2" value="2">
  <label class="form-check-label" for="inlineRadio2">2</label>
</div>
<input class="form-check-input" type="radio" name="in1" id="inlineRadio3" value="3">
  <label class="form-check-label" for="inlineRadio3">3</label>
</div>
<!-- araç konforu -->
 <div class="tab">
                  <h6><?php echo $soru2;   ?>
</h6>
                    <p>
                    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in2" id="inlineRadio4" value="1">
  <label class="form-check-label" for="inlineRadio1">1</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in2" id="inlineRadio5" value="2">
  <label class="form-check-label" for="inlineRadio2">2</label>
</div>
<input class="form-check-input" type="radio" name="in2" id="inlineRadio6" value="3">
  <label class="form-check-label" for="inlineRadio1">3</label>
</div>

            <!-- şofor tavsite -->
                                
            <div class="tab">
                              <h6><?php echo $soru3;   ?></h6>
                                <p>
                                <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="in3" id="inlineRadio7" value="1">
              <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="in3" id="inlineRadio8" value="2">
              <label class="form-check-label" for="inlineRadio2">2</label>
            </div>
            <input class="form-check-input" type="radio" name="in3" id="inlineRadio9" value="3">
              <label class="form-check-label" for="inlineRadio1">3</label>
            </div>


              <!-- Uygulamadan GEnel Olarak Memnun Kaldım -->
<div class="tab">
                  <h6><?php echo $sor4;   ?></h6>
                    <p>
                    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in4" id="inlineRadio10" value="1">
  <label class="form-check-label" for="inlineRadio1">1</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in4" id="inlineRadio11" value="2">
  <label class="form-check-label" for="inlineRadio2">2</label>
</div>
<input class="form-check-input" type="radio" name="in4" id="inlineRadio12" value="3">
  <label class="form-check-label" for="inlineRadio1">3</label>
</div>
                <!-- Tekrar Online Taksi Uygulamasını Kullanacağım -->
<div class="tab">
                  <h6><?php echo $soru5;   ?></h6>
                    <p>
                    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in5" id="inlineRadio13" value="1">
  <label class="form-check-label" for="inlineRadio1">1</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in5" id="inlineRadio14" value="2">
  <label class="form-check-label" for="inlineRadio2">2</label>
</div>
<input class="form-check-input" type="radio" name="in5" id="inlineRadio15" value="3">
  <label class="form-check-label" for="inlineRadio1">3</label>
</div>

   <!-- Tekrar Online Taksi Uygulamasını Kullanacağım -->
<div class="tab">
                  <h6><?php echo $soru6;   ?></h6>
                    <p>
                    <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in6" id="in16" value="1">
  <label class="form-check-label" for="inlineRadio1">1</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="in6" id="in17" value="2">
  <label class="form-check-label" for="inlineRadio2">2</label>
</div>
<input class="form-check-input" type="radio" name="in6" id="in18" value="3">
  <label class="form-check-label" for="inlineRadio1">3</label>
</div> 

                <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                    <h3>Yanıtlarınız Tarafımıza Ulaşmıştır Teşekkür Ederiz</h3> 
                    <button class="btn btn-warning">Bitir</button>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                      <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button> 
                      <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button> </div>
                </div>
              
            </form>
        </div>
    </div>
</div>

<script>
    var currentTab = 0;
              document.addEventListener("DOMContentLoaded", function(event) {


              showTab(currentTab);

              });

              function showTab(n) {
              var x = document.getElementsByClassName("tab");
              x[n].style.display = "block";
              if (n == 0) {
              document.getElementById("prevBtn").style.display = "none";
              } else {
              document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
              document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              } else {
              document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              }
              fixStepIndicator(n)
              }

              function nextPrev(n) {
              var x = document.getElementsByClassName("tab");
              if (n == 1 && !validateForm()) return false;
              x[currentTab].style.display = "none";
              currentTab = currentTab + n;
              if (currentTab >= x.length) {
            
              document.getElementById("nextprevious").style.display = "none";
              document.getElementById("all-steps").style.display = "none";
              document.getElementById("register").style.display = "none";
              document.getElementById("text-message").style.display = "block";




              }
              showTab(currentTab);
              }

              function validateForm() {
                   var x, y, i, valid = true;
                   x = document.getElementsByClassName("tab");
                   y = x[currentTab].getElementsByTagName("input");
                   for (i = 0; i < y.length; i++) {
                       if (y[i].value == "") {
                           y[i].className += " invalid";
                           valid = false;
                       }


                   }
                   if (valid) {
                       document.getElementsByClassName("step")[currentTab].className += " finish";
                   }
                   return valid;
               }

               function fixStepIndicator(n) {
                   var i, x = document.getElementsByClassName("step");
                   for (i = 0; i < x.length; i++) {
                       x[i].className = x[i].className.replace(" active", "");
                   }
                   x[n].className += " active";
               }
</script>

<?php include "footer.php"  ?>