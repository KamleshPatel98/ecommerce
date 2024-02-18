<?php
    session_start();
    include 'session.php';
    include 'header.php';
    include 'config.php';
?>
<?php
    $alert = false;
    $error = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $status = $_POST['status'];

        $e = $_GET['edit_id'];
        $sql = "UPDATE `product_quantity` SET `status` = '$status' WHERE `product_quantity`.`id` = $e";
        $res = $conn->query($sql);
        if($res)
        {
            $alert = true;
        }
        else
        {
            $error = true;
        }
    }
?>


<div class="container">
    <div class="card">
            <?php
                if($alert)
                {
                    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Status updated successfully!</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
            ?>
            <?php
                if($error)
                {
                    echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Status is not updated!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                }
            ?>
        <div class="card-header">
            <h6>Update Status</h6>
        </div>
        <div class="card-body">
                <?php
                    if(isset($_GET['edit_id']))
                    {
                        $e = $_GET['edit_id'];
                        $sql = "SELECT * FROM `product_quantity` WHERE `id` = '$e' ";
                        $res = $conn->query($sql);
                    }
                    if(mysqli_num_rows($res) > 0)
                    {
                        foreach($res as $row)
                        {
                            ?>

                            <?php
                        }
                    }
                    
                ?>
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label  class="form-label">Username</label>
                            <input type="text" class="form-control bg-light" name="username" value="<?= $row['username']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control bg-light" name="email" value="<?= $row['email']; ?>">  
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Phone Number</label>
                            <input type="number" class="form-control bg-light" name="phone" value="<?= $row['phone']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pin Code</label>
                            <input type="number" class="form-control bg-light" value="<?= $row['pin_code']; ?>" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control bg-light" ><?= $row['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Product ID</label>
                            <input type="number" class="form-control bg-light" value="<?= $row['product_id']; ?>" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control bg-light" value="<?= $row['prod_name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="text" class="form-control bg-light" value="<?= $row['price']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Quantity</label>
                            <input type="text" class="form-control bg-light" value="<?= $row['product_qty']; ?> <?= $row['status']; ?>" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-control bg-light">
                                <option>Slect the order status</option>
                                <option value="0"  <?= $row['status'] == 0 ? 'selected' : '' ;  ?> >Under Process</option>
                                <option value="1"  <?= $row['status'] == 1 ? 'selected' : '' ;  ?> >Completed</option>
                                <option value="2"  <?= $row['status'] == 2 ? 'selected' : '' ;  ?> >Canceled</option>
                            </select>
                        </div> 
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary col-md-6" type="submit">Update Status</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include 'footer.php';
?>