<?php
include "../database/db.php";
 include "ad_header.php"   ;
 include "../navbar.php";
 include "../function.php";




 
 
if($_SERVER["REQUEST_METHOD"]=="POST")
{

session_start();
  
   $control=false;
   
 

   
   if(empty($_POST["email"]))
   {
      $message="Mail Alanı Boş Geçilemez";
      $control=true;
   }

   else
   {
      $username=safety($_POST['username']);
   }
   if(empty($_POST["password"]))
   {
      $message="Mail Alanı Boş Geçilemez";
      $control=true;
   }
   else
   {
      $password=safety($_POST['password']);
   }




   if($control==false)
   {
     
   
    
      $sql="INSERT INTO admin(adminUsername,adminPassword) values (?,?)";
      $stmt = mysqli_prepare($baglanti, $sql);
      if($stmt== mysqli_prepare($baglanti,$sql))
      {
    
         $param_mail=$mail;
         $param_username=$username;
        $param_password=password_hash($password,PASSWORD_DEFAULT);

         mysqli_stmt_bind_param($stmt,"ss",$param_username,$param_password);

         if(mysqli_stmt_execute($stmt))
         { $message="Admin Kaydı Başarılı Bir Şekilde Yapıldı";
          $_SESSION["message"]=$message;
          header("Location: ad_login.php");

         }

         else
         {
            echo mysqli_error($baglanti);
            echo "<br>";
            echo "hata oluştu";
         }
      }
   }
}
 






?>

<style>
    body
    {
        background-color: black;
    }

    .container
    {
      margin-top: 80px;
    }
</style>
<section class=" p-3 p-md-4 p-xl-5 my-5" style="background-color: black">
  <div class="container rounded-5" style="background-color: #ffb900;">
    <div class="row justify-content-center rounded-5">
      <div class="col-12 col-xxl-11">
        <div class="card border-light-subtle shadow-sm">
          <div class="row g-0 rounded-5">
            <div class="col-12 col-md-6">
              <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="../images/image_processing20191107-15675-1476317.gif" alt="Welcome back you've been missed!">
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-5">
                      
                        <h5 class="text-center"><i class="fa fa-taxi" aria-hidden="true"></i> Admin Kayıt Alanına Hoş Geldiniz <i class="fa fa-taxi" aria-hidden="true"></i></h5>
                      </div>
                    </div>
                  </div>
                
                  <form  method="post">
                    <div class="row gy-3 overflow-hidden">

                  
                    
                      
                   
                      <!--kullanici adı -->
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="username" id="username" placeholder="name@example.com" required>
                          <label for="username" class="form-label">Kullanıcı Adınız</label>
                        </div>
                      </div>
                          <!--mail -->
                          <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                          <label for="email" class="form-label">Mail Adresiniz</label>
                        </div>
                      </div>
                      <!--Şİfre -->
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" placeholder="name@example.com" required>
                          <label for="email" class="form-label">Şifreniz</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn btn-dark btn-lg" type="submit">Kayıt Ol</button>
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



<?php    include "../footer.php"  ?>