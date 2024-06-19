<?php include "navbar.php";
     include "function.php";

    
?>



<style>
       .card-img-top
{
    width: 100%;
    height: 25vh;
    object-fit: cover;
    border: 5px solid #FFB900;

}
body
  {
    background-color: black;
  }
    .card-body
    {
      background-color: black;
      color: #FFB900;
    }
    .card-body{
      background-color: black;
    }
    .carousel
    {
       margin-top: 160px;
    }
</style>

<div id="carouselExampleIndicators" class="carousel slide  " data-bs-ride="carousel" style="height: 500px;">
  <div class="carousel-indicators ">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner border-bottom border-warning">
    <div class="carousel-item active">
      <img src="images/logo.png" class="d-block w-100 " alt="..." style="height: 500px;">
    </div>
    <div class="carousel-item">
      <img src="images/Untitled design (1).gif" class="d-block w-100"  alt="..." style="height: 500px;">
    </div>
    <div class="carousel-item">
      <img src="images/t3.png" class="d-block w-100" alt="..." style="height: 500px;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div style="text-align: center;" >
  <h1 style="color: #FFB900; font-size: larger;" class="my-5">Favorite Drivers</h1>
</div>

<div class="row justify-content-center my-3 ms-5">
    <?php 
    $sonuc = getDriversByPoint(); 
    while($drivers = mysqli_fetch_assoc($sonuc)): 
    ?>
    <div class="col-md-4">
        <div class="card me-4 mb-4" style="width: 18rem;">
            <img class="card-img-top" src="images/<?php echo $drivers["soforResim"] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"><?php echo $drivers["soforAdi"] ?></p>
                <span class="badge bg-warning text-dark ms-1"> Point: <?php echo $drivers["puan"] ?></span>

            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var message2 = "<?php echo $mesaj2; ?>";
    if (message2 !== "") {
        Swal.fire(message2);
    }
</script>


<?php  include "footer.php";  ?>
