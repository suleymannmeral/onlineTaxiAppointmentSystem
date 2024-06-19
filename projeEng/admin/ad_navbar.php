
<?php session_start();  ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Taxi</title>
    <link rel="shortcut icon" href="../images/logo_hYn_icon.ico" type="image/x-icon">
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
          width: 100%; 
          z-index: 1000; 
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <ul class="nav-links ">
    <li >    <a href="index.php"><img src="../images/logo.png" alt="..." width="80px" style="border-radius: 50%;" ></a>  
</li>

    <li class="forward"><a href="ad_soforler.php"><i class="fa-solid fa-car"></i> Driver Transactions</a></li>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
    <li class="forward"><a href="ad_tarihAyarla.php"><i class="fa-solid fa-calendar"></i> Set Date
</a></li>
    <li class="forward"><a href="ad_degerlendirme.php"><i class="fa-solid fa-thumbs-up"></i> Reviews </a></li>
    <div class="dropdown">
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
  Appointments
</a></li>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <li><a href="ad_onayliRandevu.php"  class="dropdown-item">Active Appointments
</a></li>
    <li><a href="ad_onayBekleyenRandevular.php"  class="dropdown-item">Appointments Pending Approval
</a></li>
    <li><a href="ad_gecmisRandevular.php"  class="dropdown-item">Past Appointments
</a></li>
  </ul>
  

</div>
<li class="forward"><a href="../index.php"><i class="fa-solid fa-car"></i> Log Out</a></li>





  

    

     
 
  </ul>


</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>