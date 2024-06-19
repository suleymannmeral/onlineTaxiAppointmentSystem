


<?php

$control=false;
$contactName="";
$contactMail="";
$contactPhone="";
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST["name"]))
  {
    $contactName=$_POST["name"];
    $control=true;
    
  }
  if(isset($_POST["mail"]))
  {
    $contactMail=$_POST["mail"];
    $control=true;
    
  }
  if(isset($_POST["phone"]))
  {
    $contactPhone=$_POST["phone"];
    $control=true;
    
  }
  if(isset($_POST["message"]))
  {
    $contactPhone=$_POST["message"];
    $control=true;
    
  }

  if($control==true)
  {
    $mail= "
    Ad: $contactName
    
    Mail: $contactMail
  
    Numara: $contactPhone
    Mesaj: $message

    ";
    mail("lexvon53@gmail.com","İletişim Maili",$mail);
    
    
  }
  
  
  
}


?>




<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->




<?php  include "navbar.php"    ?>
<style>
  body
  {
    background-color: black;
  }
  .contact-form{
    background: #ffb900;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
    border-radius: 15px;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: black;
    border: none;
    cursor: pointer;
}
.btn-dark 
{
  background-color: black;
}

.wrap {
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button {
  min-width: 300px;
  min-height: 60px;
  font-family: 'Nunito', sans-serif;
  font-size: 22px;
  text-transform: uppercase;
  letter-spacing: 1.3px;
  font-weight: 700;
  color: yellow;
 background-color: black;

  border: none;
  border-radius: 1000px;
  box-shadow: 12px 12px 24px rgba(79,209,197,.64);
  transition: all 0.3s ease-in-out 0s;
  cursor: pointer;
  outline: none;
  position: relative;
  padding: 10px;
  }

button::before {
content: '';
  border-radius: 1000px;
  min-width: calc(300px + 12px);
  min-height: calc(60px + 12px);
  border: 6px solid #00FFCB;
  box-shadow: 0 0 60px rgba(0,255,203,.64);
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all .3s ease-in-out 0s;
}

.button:hover, .button:focus {
  color: #313133;
  transform: translateY(-6px);
}

button:hover::before, button:focus::before {
  opacity: 1;
}

button::after {
  content: '';
  width: 30px; height: 30px;
  border-radius: 100%;
  border: 6px solid #00FFCB;
  position: absolute;
  z-index: -1;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  animation: ring 1.5s infinite;
}

button:hover::after, button:focus::after {
  animation: none;
  display: none;
}

</style>
<div class="container contact-form rounded-4  " style="margin-top: 170px;">
            <div class="contact-image">
                <img src="images/f0c40dc2da345b941ac669f14d46dc9d.gif" alt="rocket_contact"/>
            </div>
            <form method="post" class="border-3">
    <h3 style="color: black;">Let Us Know Your Feedback</h3>
    <div class="row">
        <div class="col-md-6 rounded-5">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Adınız" value="" />
            </div>
            <div class="form-group">
                <input type="text" name="mail" class="form-control" placeholder="Your Email *" value="" />
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *" value="" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col text-center my-5">
            

<div class="wrap">
  <button class="button" style="background-color: black;">Submit</button>
</div>


        </div>
    </div>
</form>


</div>

<?php  include "footer.php"  ?>


