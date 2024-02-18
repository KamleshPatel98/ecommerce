<?php
    session_start();
    include '../header.php';
    include 'config.php';
?>

    <div class="container my-4">
        <div class="card shadow">
            <div class="card-body">
                <form method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Basic Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail4" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" id="inputEmail4" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" class="form-control" name="phone" id="phone" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pin_code" class="form-label">Pin Code</label>
                                            <input type="number" class="form-control" name="pin_code" id="pin_code" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="inputAddress2" class="form-label">Address </label>
                                        <textarea name="address" class="form-control" cols="3"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" class="form-control" name="payment_mode" value="COD">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    Ordered Details
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped text-center">
                                        <thead>
                                            <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    if(isset($_SESSION['login_id']))
                                                    {
                                                        $c = $_SESSION['login_id'];

                                                        $sql="SELECT q.id AS qid, q.product_id, q.product_qty, p.pid AS id, p.name, p.price, p.image
                                                            FROM product_quantity q
                                                            INNER JOIN product1998 p ON q.product_id = p.pid
                                                            WHERE q.user_id = '$c'";

                                                        $res = $conn->query($sql);
                                                    }
                                                    
                                                    if(mysqli_num_rows($res) > 0)
                                                    {
                                                        $p = 0;
                                                        foreach($res as $row)
                                                        {
                                                            ?>
                                            <tr>
                                                <td>
                                                    <img src="/ecommerce/admin/product/<?= $row['image']; ?>" alt="Product Image" width="50px" height="50px";>
                                                </td>
                                                <td><?= $row['name']; ?> </td>
                                                <td><?= $row['price']; ?> </td>

                                                <td> * <?= $row['product_qty']; ?></td>
                                            </tr>
                                                            <?php
                                                            $p += $row['price'] * $row['product_qty'];

                                                            $order_id = $row['qid'];
                                                            $product_id = $row['id'];
                                                            $product_qty = $row['product_qty'];
                                                            $price = $row['price'];
                                                        }
                                                    }
                                                ?>
                                        </tbody>
                                    </table>

                                    <span>Total Price</span>
                                    <span class="float-end fw-bold">
                                        <?php  
                                            if(isset($p)){
                                                echo $p;
                                            }
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="text-center my-5">
                                <button class="btn btn-outline-primary">Confirm Ordered and Checkout | COD</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $user_id = $_SESSION['login_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pin_code = $_POST['pin_code'];
    $address = $_POST['address'];
    $payment_mode = $_POST['payment_mode'];


    $sql = "INSERT INTO `orders` (`id`,  `user_id`, `name`, `email`, `phone`, `address`, `pin_code`, `total_price`, `payment_mode`,
    `status`, `comments`, `created_at`) VALUES (NULL, '$user_id', '$name', '$email', '$phone', '$address', '$pin_code', '$p',
    '$payment_mode', '', '', current_timestamp())";
    $res4 = $conn->query($sql);

    if($res4)
    {   
                $order_id1 = $order_id;
                $product_id1 = $product_id;
                $product_qty1 = $product_qty;
                $price1 = $price;
            
                $sql3 = "INSERT INTO `orders_item` (`id`, `order_id`, `product_id`, `product_qty`, `price`, `created_at`)
                VALUES (NULL, '$order_id1', '$product_id1', '$product_qty1', '$price1', current_timestamp())";
                $res3 = $conn->query($sql3);

                if($res3){

                    $del = "DELETE FROM `product_quantity` WHERE `product_quantity`.`id` = '$order_id1' ";
                    $conn->query($del);
                    echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Order Added Successfully!</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
                else
                {
                    echo    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Order is not added!</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
            
        
            
        
    }
}
?>

<?php
    include '../footer.php';
?>