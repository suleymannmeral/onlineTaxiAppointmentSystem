<?php
include "ad_navbar.php";
include "../function.php";

$limit = 3;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; 
$offset = ($page - 1) * $limit; 

$total_records = getTotalMeetingsOnayli(); 
$total_pages = ceil($total_records / $limit); 

$sonuc = getMeetingsOnayli($limit, $offset);
?>

<style>
    .container {
        margin-top: 150px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-3">Active Appointments</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 50px;">Id</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th style="width: 120px;">Kalkış Adresi</th>
                        <th>Kalkış Zamanı</th>
                        <th style="width: 120px;">Varış Adresi</th>
                        <th>Driver</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($meetings = mysqli_fetch_assoc($sonuc)): ?>
                    <tr>
                        <td><?php echo $meetings["id"]; ?></td>
                        <td><?php echo $meetings["kullaniciAdi"]; ?></td>
                        <td><?php echo $meetings["adSoyad"]; ?></td>
                        <td><?php echo $meetings["kalkisAdres"]; ?></td>
                        <td><?php echo date("d/m/Y H:i:s", strtotime($meetings["kalkisTarihi"])); ?></td>
                        <td><?php echo $meetings["varisAdres"]; ?></td>
                        <td><?php echo $meetings["sofor"]; ?></td>
                        <td><?php echo $meetings["telefon"]; ?></td>
                        <td><?php echo $meetings["onay"]; ?></td>
                        <td>
                            <a href="ad_randevuBitir.php?id=<?php echo $meetings["id"]; ?>" class="btn btn-dark btn-sm">Done</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation example" class="ms-4">
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
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php include "ad_footer.php"; ?>

