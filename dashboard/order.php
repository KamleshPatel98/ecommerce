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
                    <h5> All Order </h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped text-center"  id="example">
                        <thead>
                            <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Pin-code</th>
                            <th>Address</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
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
                                <td><?= $row['email']; ?> </td>
                                <td><?= $row['phone']; ?> </td>
                                <td><?= $row['pin_code']; ?> </td>
                                <td><?= $row['address']; ?> </td>
                                <td><?= $row['prod_name']; ?> </td>
                                <td><?= $row['product_qty']; ?> </td>
                                            <?php
                                                $totalprice = $row['price'] * $row['product_qty'];
                                            ?>
                                <td><?= $totalprice; ?></td>
                                <td><?= $row['status'] == '0' ? 'Under Process' : ''; ?>
                                    <?= $row['status'] == '1' ? 'Completed' : '' ?>
                                    <?= $row['status'] == '2' ? 'Canceled' : '' ?>
                                </td>
                                <td>
                                    <a href="product_view.php?product_view_id=<?= $row['product_id']; ?>" class="text-light btn btn-sm btn-primary">View</a>
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