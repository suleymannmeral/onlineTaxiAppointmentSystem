<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Navbar</title>
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
          font-size: 20px;
          font-weight: 500;
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
<body>

  <ul class="nav-links">
    <li>      <img src="logo.png" alt="..." width="100px" style="border-radius: 50%;" >
</li>
    <li class="center"><a href="#">Portfolio</a></li>
    <li class="upward"><a href="#">Services</a></li>
    <li class="forward"><a href="#">Feedback</a></li>
    <li class="upward"><a href="#">Services</a></li>
    <li class="forward"><a href="#">Feedback</a></li>
  </ul>


</body>
</html>
