<?php
    session_start();
    include '../header.php';
    include 'config.php';
?>

    <div class="container mt-2" id="slug">
        <div class="row">
            <div class="col-md-12 my-3">
            <h3>Collection/
                <?php
                    if(isset($_GET['category_id']))
                    {
                        
                        $e = $_GET['category_id'];
                        $sql1 = "SELECT * FROM `category` WHERE `id` = '$e'";
                        $res1 = $conn->query($sql1);
                    }
                    if(mysqli_num_rows($res1) > 0)
                    {
                        foreach($res1 as $row1)
                        {
                            echo $row1['slug'];
                        }
                    }
                ?>
            </h3>
            <hr>
                <div class="row my-3">
                    <?php
                        if(isset($_GET['category_id']))
                        {
                            $e = $_GET['category_id'];
                            $sql = "SELECT * FROM `product1998` WHERE `category_id` = '$e'";
                            $res = $conn->query($sql);
                        }
                        if(mysqli_num_rows($res) > 0)
                        {
                            foreach($res as $row)
                            {
                                if($row['status'] == '1')
                                {
                                    //$_SESSION['slug'] = $row['slug'];
                                    ?>
                                        <div class="col-sm-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <a href="product_view.php?product_view_id=<?= $row['pid']; ?>" class="text-dark" id="a">
                                                        <img src="/ecommerce/admin/product/<?= $row['image']; ?>" alt="Product image" width="270" height="200"><br>
                                                        <h5 class="text-center"><?= $row['name']; ?></h5>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        }
                        else
                        {
                            echo "<h5 class='text-danger'>Product not available</h5>";
                        }
                    ?>
                </div>
        </div>
    </div>

<?php
    include '../footer.php';
?>