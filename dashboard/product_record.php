<?php
    include '../header.php';
    include 'config.php';
?>

    <div class="container">
        <div class="row justify-content-center">
            <h1>Collection</h1>
            <hr>
                        <?php
                            if(isset($_GET['product_record_id']))
                            {
                                $p = $_GET['product_record_id'];
                                $sql = "SELECT * FROM `product1998` WHERE `pid` = '$p' ";
                                $res = $conn->query($sql);
                            }
                            if(mysqli_num_rows($res) > 0)
                            {
                                foreach($res as $row)
                                {
                                    ?>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="/ecommerce/admin/product/<?= $row['image']; ?>" alt="Product image" class="w-100" >
                                <hr>
                                <h4 class="text-center"><?= $row['name']; ?></h4>
                            </div>
                        </div>
                    </div>
                                    <?php
                                }
                            }

                        ?>
                    

        </div>
    </div>

<?php
    include '../footer.php';
?>