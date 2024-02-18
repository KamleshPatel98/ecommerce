<?php
    session_start();
    include '../header.php';
    include 'config.php';
?>

<div class="container mt-2" id="category">
    <div class="row">
        <div class="col-sm-12">
            <h3>Collection</h3>
            <hr>
            <div class="row">
                <?php
                    $sql = "SELECT * FROM `category` ";
                    $res = $conn->query($sql);

                    if(mysqli_num_rows($res) > 0)
                    {
                        foreach($res as $row)
                        {
                            if($row['status'] == '1')
                            {
                                //$_SESSION['slug'] = $row['slug'];
                            ?>

                <div class="col-sm-3 py-2">
                    <div class="card shadow">
                        <div class="card-body">
                            <a href="slug.php?category_id=<?= $row['id']; ?>" class="text-center" id="a">
                                <img src= "/ecommerce/admin/photos/<?= $row['image']; ?>" alt="Category image" width="270" height="200"><br>
                                <h5 class="text-black my-2"><?= $row['name']; ?></h5>
                            </a>
                            
                        </div>
                    </div>
                    
                </div>
                            <?php
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
    include '../footer.php';
?>