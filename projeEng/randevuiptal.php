<?php
include "navbar.php";
include "function.php";

$id=$_GET["id"];

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $control=false;
    if(empty($_POST["message"]))
    {
        $control=true;
        
      
    }
    else
    {
       $message= safety($_POST['message']);

    }

    
   
  
    if($control==false)
    {
      
        $sonuc=getMeetingsById($id);
        $sonuc2=mysqli_fetch_assoc($sonuc);
        $username=$sonuc2["kullaniciAdi"];
        $sonuc3=getMailAdressByUsername($username);
        $sonuc4=mysqli_fetch_assoc($sonuc3);
        $selectedMail=$sonuc4["kullaniciMail"];

        $text="$username kullanıcı adlı müşterimiz randevusunu iptal etmiştir.
        
        İptal Nedeni: $message
        
        İletişim Maili: $selectedMail

        ";

      

        mail("lexvon53@gmail.com","Randevu İptali",$text);

        
        cancelMeeting($id);

        header("Location:index.php");
        
        
           
        
           
         
        

       

     

    }
    
}








?>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<style>
    .container
    {
        margin-top: 120px;
    }
    .rounded-5
    {
        border-radius: 2%;
    }
</style>
<section class="p-3 p-md-4 p-xl-5" style="background-color: black">
    <div class="container rounded-5" style="background-color: #ffb900;">
        <div class="row justify-content-center rounded-5">
            <div class="col-12 ">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0 rounded-5">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                src="images/f0c40dc2da345b941ac669f14d46dc9d.gif" alt="Welcome back you've been missed!">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <h5 class="text-center"><i class="fa fa-taxi"
                                                        aria-hidden="true"></i> Cancel Appointment <i
                                                        class="fa fa-taxi" aria-hidden="true"></i></h5>
                                            </div>
                                        </div>
                                    </div>

                                    <form method="post">
                                        <div class="row gy-3 overflow-hidden">
                                            <!--BASLANGİC-->
                                            <div class="col-12">
                                             <textarea name="message" id="ckedit">Could you please specify your reason for cancellation?</textarea>
                                            </div>
                                            <!--BİTİS-->
                                         
                                            <div class="d-grid">
                                                <button class="btn btn-dark btn-lg" type="submit">Cancel Appointment</button>
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
            // CKEditor'u ilgili textarea'ya uygula
            CKEDITOR.replace('ckedit');
        </script>


<?php  include "footer.php"   ?>



