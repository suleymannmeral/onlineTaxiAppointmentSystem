
<?php session_start();  ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online</title>
    <style>
        /* Google Fonts Import Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: 'Poppins', sans-serif;
        }
       
        .nav-links{
          display: flex;
          align-items: center;
          background: #FFB900;
          padding: 20px 15px;
          border-radius: 12px;
          box-shadow: 0 5px 10px rgba(0,0,0,0.2);
          position: fixed;
          top: 0;
          left: 50%;
          transform: translateX(-50%);
          width: 100%; /* İhtiyaca göre genişlik ayarlayın */
          z-index: 1000; /* Diğer içeriklerin üzerine çıkması için */
        }
        .nav-links li{
          list-style: none;
          margin: 0 12px;
        }
        .nav-links li a{
          position: relative;
          color: black;
          font-size: 16px;
          font-weight: 300;
          padding: 6px 0;
          text-decoration: none;
        }
        .nav-links li a:before{
          content: '';
          position: absolute;
          bottom: 0;
          left: 0;
          height: 3px;
          width: 0%;
          background: aliceblue;
          border-radius: 12px;
          transition: all 0.4s ease;
        }
        .nav-links li a:hover:before{
          width: 100%;
        }
        .nav-links li.center a:before{
          left: 50%;
          transform: translateX(-50%);
        }
        .nav-links li.upward a:before{
          width: 100%;
          bottom: -5px;
          opacity: 0;
        }
        .nav-links li.upward a:hover:before{
          bottom: 0px;
          opacity: 1;
        }
        .nav-links li.forward a:before{
          width: 100%;
          transform: scaleX(0);
          transform-origin: right;
          transition: transform 0.4s ease;
        }
        .nav-links li.forward a:hover:before{
          transform: scaleX(1);
          transform-origin: left;
        }
   
    </style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>

  <ul class="nav-links ">
    <li >    <a href="index.php"><img src="logo.png" alt="..." width="80px" style="border-radius: 50%;" ></a>  
</li>
<?php  if(empty( $_SESSION["username"])) {
  
  
           echo " <li class='forward'>
           <a class='' href=kullaniciLogin.php ><i class='fa-solid fa-right-to-bracket'></i> Login</a>
         </li>";

    
   
  }
  ?>
    <li class="forward"><a href="viewSoforler.php"><i class="fa-solid fa-car"></i> Drivers</a></li>
    <?php  if(isset( $_SESSION["username"])) {
  
  $us=$_SESSION["username"];
           echo " <li class='forward'>
           <a class='' href='randevuAl.php'><i class='fa-regular fa-handshake'></i> Create An Appointment</a>
         </li>";

    
   
  }
  ?>

<?php  if(isset( $_SESSION["username"])) {
  
  $us=$_SESSION["username"];
           echo " <li class='forward'>
           <a class='' href='randevuGoruntuleKullanici.php'><i class='fa-solid fa-handshake'></i> My Appointments
           </a>
         </li>";

    
   
  }
  ?>
  
<?php  if(isset( $_SESSION["username"])) {
  
  $us=$_SESSION["username"];
           echo " <li class='forward'>
           <a class='' href='kullaniciProfilm.php'><i class='fa-solid fa-user'></i> My Profile</a>
         </li>";

    
   
  }
  ?>
   
    <li class="forward"><a href="contact.php"><i class="fa-solid fa-address-book"></i> Contact</a></li>

    <?php  if(isset( $_SESSION["username"])) {
  
  $us=$_SESSION["username"];
           echo " <li class='nav-item ms-5 '>
           <a class='nav-link navbtxt' href= > Welcome  $us</a>
         </li>";

    
   
  }
  ?>

<?php  if(isset( $_SESSION["username"])) {
  
  $us=$_SESSION["username"];
           echo " <li class='nav-item ms-5 '>
           <a class='nav-link navbtxt' href='logout.php' ><i class='fa-solid fa-right-from-bracket'></i> Log Out</a>
         </li>";

    
   
  }
  ?>
     
      <?php  if(empty( $_SESSION["username"])) {
  
  
  echo " <li class='forward'>
  <a class='' href=kullaniciRegister.php ><i class='fa-solid fa-user-plus'></i> Register</a>
</li>";



}
?>
<?php  if(empty( $_SESSION["username"])) {
  
  
  echo " <li class='forward'>
  <a class='' href=ad_login.php ><i class='fa-solid fa-right-to-bracket'></i> Admin Login</a>
</li>";



}
?>
  </ul>


</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>