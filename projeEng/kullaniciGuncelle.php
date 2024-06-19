<?php


include "function.php";
 include "navbar.php"  ;
 if(isset( $_SESSION["username"])) {
  
    $ka=$_SESSION["username"];
    $kid=$_SESSION["id"];
  
     
     
    }


 $sonuc=getKullaniciBilgileriByUsername($ka);
 $sonuc2=mysqli_fetch_assoc($sonuc);
 



if($_SERVER["REQUEST_METHOD"]=="POST")
{


   $usern= "";
   $control=false;
   
   
   if(empty($_POST["ad"]))
   {
      $control=true;
   }
   else
   {
      $ad= safety($_POST['ad']);
   }
  
   if(empty($_POST["soyad"]))
   {
      $message="Mail Alanı Boş Geçilemez";
      $control=true;
   }
   else
   {
      $soyad=safety($_POST['soyad']);
   }
  
   if(empty($_POST["telefon"]))
   {
      $message="Mail Alanı Boş Geçilemez";
      $control=true;
   }
   else
   {
      $telefon=safety($_POST['telefon']);
   }
   if(empty($_POST["email"]))
   {
      $message="Mail Alanı Boş Geçilemez";
      $control=true;
   }
   else
   {
      $mail=safety($_POST['email']);
   }
   if(empty($_POST["username"]))
   {
      $message="Mail Alanı Boş Geçilemez";
      $control=true;
   }
   else
   {
      $username1=safety($_POST['username']);
   }
   if(empty($_POST["password"]))
   {
      $message="Mail Alanı Boş Geçilemez";
      $control=true;
   }
   else
   {
      $password1=safety($_POST['password']);
      $password2=password_hash($password1,PASSWORD_DEFAULT);
   }




   if($control==false)
   {
     
   
      include "database/db.php";
      $sql="UPDATE kullanici set kullaniciAd='$ad',kullaniciSoyad='$soyad',kullaniciTelefon='$telefon',kullaniciMail='$mail',kullaniciUsername='$username1',kullaniciPassword='$password2' where id='$kid'";
      $sonuc=mysqli_query($baglanti,$sql);
      mysqli_close($baglanti);
    
  
       
          $message="Kullanıcı Kaydı Başarılı";
          $_SESSION["message"]=$message;
            header("Location: kullaniciLogin.php");
         

        
      }
   }

 


?>




<style>
  .container
{
    margin-top: 125px;
}
</style>


<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">


<section class=" p-3 " style="background-color: black">
  <div class="container rounded-5" style="background-color: #ffb900;">
    <div class="row justify-content-center rounded-5">
      <div class="col-12 col-xxl-11">
        <div class="card border-light-subtle shadow-sm">
          <div class="row g-0 rounded-5">
            <div class="col-12 col-md-6">
              <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="images/f0c40dc2da345b941ac669f14d46dc9d.gif" alt="Welcome back you've been missed!">
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-5">
                      
                        <h4 class="text-center">Güncelleme Ekranı</h4>
                      </div>
                    </div>
                  </div>
                
                  <form  method="post">
                    <div class="row gy-3 overflow-hidden">

                    <!-- Adınız -->
                      <div class="col-12">
                      <label for="" class="form-label">Adınız:</label>
                        <div class="form-floating mb-3">
                           
                          <input type="text" class="form-control" name="ad" id="ad" placeholder="name@example.com" value="<?php echo $sonuc2["kullaniciAd"];  ?>">
                         
                        </div>
                      </div>
                        <!-- Soyadınız -->
                      <div class="col-12">
                      <label for="" class="form-label">Soyadınız:</label>
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="soyad" id="soyad" value="<?php echo $sonuc2["kullaniciSoyad"];  ?>" placeholder="Soyadınız"  required>
                          
                        </div>
                      </div>
                     
                  
                       <!-- teelfon -->
                      <div class="col-12">
                      <label for="" class="form-label">Telefon:</label>

                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="telefon" id="telefon" placeholder="numaranız" value="<?php echo $sonuc2["kullaniciTelefon"];  ?>" required>
                        
                        </div>
                      </div>
                         <!--mail -->
                      <div class="col-12">
                      <label for="" class="form-label">Mail:</label>
                        <div class="form-floating mb-3">
                      
                          <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="<?php echo $sonuc2["kullaniciMail"];  ?>" required>
                        
                        </div>
                      </div>
                      <!--kullanici adı -->
                      <div class="col-12">
                      <label for="" class="form-label">Kullanıcı Adınız:</label>
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com" value="<?php echo $sonuc2["kullaniciUsername"];  ?>" required>
                        </div>
                      </div>
                      <!--sifre -->
                      <div class="col-12">
                      <label for="email" class="form-label">Şifreniz:</label>
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" placeholder="name@example.com" required>
                          <label for="email" class="form-label">****************</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn btn-dark btn-lg" type="submit">Güncelle</button>
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

<?php include "footer.php"   ?>