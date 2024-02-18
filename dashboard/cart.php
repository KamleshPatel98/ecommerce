<?php
    session_start();
    include '../header.php';
    include 'config.php';
?>

    <div class="container my-4  product_data">
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
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?= $_SESSION['delnot']; ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['delnot']);
                    }
                ?>
        <div class="row">
            <div class="card shadow">
                <div class="card-header bg-info">
                    All Order
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                            <th class="col-sm-2">User Name</th>
                            <th class="col-sm-2">Product</th>

                            <th class="col-sm-2">Price</th>
                            <th class="col-sm-2">Quantity</th>
                            <th class="col-sm-2">Total Price</th>
                            <th class="col-sm-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    if(isset($_SESSION['login_id']))
                                    {
                                        $c = $_SESSION['login_id'];

                                    /* $sql="SELECT q.id AS qid, q.product_id, q.product_qty, p.pid AS id, p.name, p.price, p.image
                                            FROM product_quantity q
                                            INNER JOIN product1998 p ON q.product_id = p.pid
                                            WHERE q.user_id = '$c'";
                                            */
                                        $sql = "SELECT * FROM `product_quantity` WHERE `user_id` = '$c' ";
                                        $res = $conn->query($sql);
                                    }
                                    
                                    if(mysqli_num_rows($res) > 0)
                                    {
                                        foreach($res as $row)
                                        {
                                            ?>
                            <tr>
                                <td><?= $row['username']; ?> </td>
                                <td><?= $row['prod_name']; ?> </td>
                                
                                <td><?= $row['price']; ?> </td>
                                <td><?= $row['product_qty']; ?> </td>
                                            <?php
                                                $totalprice = $row['price'] * $row['product_qty'];
                                            ?>
                                <td><?= $totalprice; ?></td>
                                <td>
                                    <button class="btn btn-danger btn-sm">
                                        <a href="card_delete.php?del_id=<?= $row['id']; ?>" class="text-light"> Delete </a>
                                    </button>
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
    include '../footer.php';
?>