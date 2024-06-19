<?php  

include "ad_navbar.php";
include "../function.php";







?>
<style>
    .container
    {
        margin-top: 140px;
    }
</style>

<div class="container ">
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Question 1 </th>
                        <th>Question 2</th>
                        <th>Question 3</th>
                        <th>Question 4</th>
                        <th>Question 5</th>
                        <th>Question 6</th>
                        <th>Transaction
</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $sonuc = getPuanlamaSorilari(); // doğru fonksiyon adını çağırın
                    while($sorular = mysqli_fetch_assoc($sonuc)): ?> 

                  
                        <tr>
                            <td><?php echo $sorular["s1text"]?></td>
                            <td><?php echo $sorular["s2text"]?></td>
                            <td><?php echo $sorular["s3text"]?></td>
                            <td><?php echo $sorular["s4text"]?></td>
                            <td><?php echo $sorular["s5text"]?></td>
                            <td><?php echo $sorular["s6text"]?></td>
                            <td><a href="soruUpdate.php" class="btn btn-warning">Change</a></td>


                           

                          
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "ad_footer.php"   ?>
