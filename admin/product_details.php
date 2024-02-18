<?php
    session_start();
    $module="prodDeta";
    include 'session.php';
    include 'header.php';
    include 'config.php';
?>

    <div class="container">
        <div class="row">
            <div class="card">

                        <?php
                            if(isset($_SESSION['del']))
                            {
                                ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong><?= $_SESSION['del']; ?></strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                <?php
                                unset($_SESSION['del']);
                            } 
                        ?>
                        <?php
                            if(isset($_SESSION['delnot']))
                            {
                                ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong><?= $_SESSION['delnot']; ?></strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                <?php
                                unset($_SESSION['delnot']);
                            } 
                        ?>

                <div class="card-header bg-secondary text-light">
                    Product Details
                </div>
                <div class="card-body">
                    <table class="table table_striped" id="example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <?php
                                        $sql = "SELECT * FROM `product1998` ";
                                        $res = $conn->query($sql);

                                        if(mysqli_num_rows($res) > 0)
                                        {
                                            foreach($res as $row)
                                            {
                                                ?>
                            <tr>
                                <td><?= $row['pid']; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td>
                                    <img src="product/<?= $row['image']; ?>" alt="Product Image" width="50px">
                                </td>
                                <td>
                                    <?= $row['status'] == '1' ? 'Visible' : 'Hidden'; ?> 
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"><a href="product_edit.php?edit_id=<?= $row['pid']; ?>" class="text-light" >Edit </a></button>
                                    <!--<button class="btn btn-sm btn-danger"><a href="product_delete.php?delete_id= class="text-light" > Delete</a></button>-->
                                    <button class="btn btn-sm btn-danger productdel" value="<?= $row['pid']; ?>">Delete</button>
                                </td>
                            </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<?php
    include 'footer.php';
?>