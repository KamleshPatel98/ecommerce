<?php
    session_start();
    include '../header.php';
    include 'config.php';
?>
    <div class="container">
        <div class="row my-5">
                        <?php
                            if(isset($_GET['product_view_id']))
                            {
                                $p = $_GET['product_view_id'];
                                $sql = "SELECT * FROM `product1998` WHERE `pid` = '$p' ";
                                $res = $conn->query($sql);
                            }
                            if(mysqli_num_rows($res) > 0)
                            {
                                foreach($res as $row)
                                {
                                    ?>
            <div class="col-sm-4">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="/ecommerce/admin/product/<?= $row['image']; ?>" alt="Product image" width="380" height="300" >
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="container product_data">
                    <h4 class=" py-3"><?= $row['name']; ?>
                    <span class="text-danger">
                        <?php if($row['trending'] == '1')
                        {
                            echo "Trending"; 
                        }
                        ?>
                    </span>
                    </h4>
                    <hr>

                    <p><?= $row['small_description']; ?></p>

                    <div class="row">
                        <h5 class="col-sm-6 text-success">Rs <?= $row['price']; ?></h5>
                        <h5  class="col-sm-6 text-danger"><del>Rs <?= $row['selling_price']; ?></del></h5>
                    </div>
                    

                    <form method="post">
                        <div class="input-group mb-3" style="width:130px;">
                            <div class="input-group-prepend bg-info">
                                <span class="input-group-text" id="decreament">-</span>
                            </div>
                            <input type="number" class="form-control text-center" name="product_qty" id="input_qty" value="1" min="1" readonly>
                            <div class="input-group-append bg-info">
                                <span class="input-group-text" id="increament">+</span>
                            </div>
                        </div>

                        <div class="row my-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary col-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Order
                            </button>
                            <div class="col-sm-4">
                            </div>
                            <button class="col-sm-4 btn btn-danger">
                                <i class="fa-solid fa-heart"></i>
                                Add to Wishlist
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label  class="form-label">Username</label>
                                            <input type="text" class="form-control" name="username"  required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control" name="email"  required>  
                                        </div>
                                        <div class="mb-3">
                                            <label  class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" name="phone"   required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Pin Code</label>
                                            <input type="number" class="form-control" name="pin_code" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <textarea name="address" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button class="btn btn-primary"  type="submit">Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                

                <?php
                            if($_SERVER["REQUEST_METHOD"] == "POST")
                            {
                                if(isset($_SESSION['login_id']))
                                {
                                    $user_id = $_SESSION['login_id'];
                                    $username = $_POST['username'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $pin_code = $_POST['pin_code'];
                                    $address = $_POST['address'];
                                    $product_id = $row['pid'];
                                    $prod_name = $row['name'];
                                    $qty = $_POST['product_qty'];
                                    $price = $row['price'];
                                    
                                    $exist = "SELECT * FROM `product_quantity` WHERE `user_id` = '$user_id' AND `product_id` = '$product_id' ";
                                    $res1 = $conn->query($exist);
                                    if(mysqli_num_rows($res1) > 0)
                                    {
                                        $_SESSION['message'] = 'Order already exist';
                                    }
                                    else
                                    { 
                                        $sql = "INSERT INTO `product_quantity` (user_id, username, email, phone, pin_code, address, product_id, prod_name, 
                                        product_qty, price) 
                                        VALUES ('$user_id', '$username', '$email', '$phone', '$pin_code', '$address', '$product_id', '$prod_name', '$qty', '$price') ";
                                        $res = $conn->query($sql);
                                        if($res)
                                        {
                                            //update Product remainder qty
                                            $oriqty = $row['qty'];
                                            $remqty = $oriqty - $qty;
                                            $sql = "UPDATE `product1998` SET `qty` = '$remqty' WHERE `product1998`.`pid` = '$p' ";
                                            $conn->query($sql);

                                            $_SESSION['message'] = 'Order added successfully!';
                                        }
                                        else
                                        {
                                            $_SESSION['message'] = 'Order is not added!';
                                        }
                                    }
                                }
                                else
                                {
                                    $_SESSION['message'] = 'Login to continue';
                                }
                            }
                        ?>

                
                <hr>
                <div>Product Description</div>
                <p><?= $row['long_description']; ?></p>
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