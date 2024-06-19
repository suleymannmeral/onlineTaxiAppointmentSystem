<?php include "navbar.php"  ?>
<?php

include "function.php";
include "database/db.php";


$limit = 4; 
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; 
$offset = ($page - 1) * $limit; 

$total_records = getTotalDrivers(); 
$total_pages = ceil($total_records / $limit); 

$sonuc = getDrivers($limit, $offset);



?>

<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<style>
    .card-img-top
{
    width: 100%;
    height: 25vh;
    object-fit: cover;

}
body
{
  background-color: black;
}

.container
{
    margin-top: 130px;
    margin-bottom: 50px;
}
.btn-dark:hover
{
     background-color: #FFB900;
     transition: 0.7s;
}

.containerimg {
  position: relative;
  width: 100%;
}

.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  bottom: 100%;
  left: 0;
  right: 0;
  background-image: url(images/black.jpg);
  overflow: hidden;
  width: 100%;
  height:0;
  transition: 1s ease;
}

.containerimg:hover .overlay {
  bottom: 0;
  height: 100%;
}

.text {
  color: #ffb900;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
} 

</style>

<div class="container mx-auto ">
<div>
    <h1 style="color:#FFB900;" class="text-center my-3">Our Drivers</h1>
</div>

    <div class="d-flex flex-wrap">
        <?php  while($drivers = mysqli_fetch_assoc($sonuc)): ?>
        <div class="card m-2" style="width: 18rem;">
        
            <div class="containerimg">
            <img class="img-fluid rounded-start  card-img-top" loading="lazy" src="images/<?php echo $drivers["soforResim"] ?>" alt="Welcome back you've been missed!">
  <div class="overlay">
    <div class="text"><?php echo $drivers["plaka"]; ?></div>
  </div>
</div>
        
            <div class="card-body">
                <h5 class="card-title"><?php echo $drivers["soforAdi"] ?></h5>
                <p class="card-text"><?php echo $drivers["aracOzellikleri"] ?></p>
               
                <a href="viewDriverDetails.php?id=<?php echo $drivers["id"] ?>" class="btn btn-dark">View</a>
                <span class="badge text-bg-warning"> Point:<?php echo $drivers["puan"] ?></span>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    
    <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . ($page - 1); } ?>">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if($page >= $total_pages) { echo 'disabled'; } ?>">
                        <a class="page-link" href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=" . ($page + 1); } ?>">Next</a>
                    </li>
                </ul>
            </nav>
</div>

<?php  include "footer.php"   ?>

