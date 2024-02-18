<?php
    session_start();
    include 'session.php';
    include 'header.php';
    include 'config.php';
?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $category_id = $_POST['category_id'];
        $slug = $_POST['slug'];
        $name = $_POST['name'];
        $small_description = $_POST['small_description'];
        $long_description = $_POST['long_description'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];
        $selling_price = $_POST['selling_price'];
        $trending = isset($_POST['trending']) == true ? '1' : '0';
        $status = isset($_POST['status']) == true ? '1' : '0';
        $image = $_FILES['image'];
        $old_image = $_POST['old_image'];

        if(!empty($image['name']))
        {   
            if($image['type'] == "image/jpeg")
            {
            move_uploaded_file($image['tmp_name'], "product/" . $image['name'] );
            unlink("product/" . $old_image);
            $fname = $image['name'];
            }
            else
            {
                $_SESSION['message'] = 'File formate is not Valid!';
                $fname = $old_image;
            }
        }
        else
        {
            $fname = $old_image;
        }
        $e = $_GET['edit_id'];
        $sql = "UPDATE `product1998` SET `category_id` = '$category_id',  `slug` = '$slug',  `name` = '$name', `small_description` = '$small_description', 
        `long_description` = '$long_description', `price` = '$price', `qty` = '$qty', `selling_price` = '$selling_price', `trending` = '$trending',
        `status` = '$status', `image` = '$fname' WHERE `product1998`.`pid` = '$e' ";
            $res = $conn->query($sql);
            if($res)
            {
                $_SESSION['message'] = 'Product upadded successfully!';
            }
            else
            {
                $_SESSION['message'] = 'Product is not upadded!';
            }

    }
?>

    <div class="container">
        <div class="row">
            <div class="card">
                        <?php
                            if(isset($_GET['edit_id']))
                            {
                                $e = $_GET['edit_id'];
                                $sql = "SELECT * FROM `product1998` WHERE `pid` = '$e' ";
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

                <div class="card-header">
                    Add Product
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="row text-dark">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" class="form-control bg-light" required>
                                        <option>  Select category  </option>

                                                <?php
                                                    $sql1 = "SELECT * FROM `category`";
                                                    $res1 = $conn->query($sql1);

                                                    if(mysqli_num_rows($res1) > 0)
                                                    {
                                                        foreach($res1 as $row1)
                                                        {
                                                            ?>
                                        <option value="<?= $row1['id']; ?>" <?= $row['category_id'] == $row1['id'] ? 'selected' : ''; ?> >
                                            <?= $row1['name']; ?>
                                        </option>
                                                            <?php
                                                        }
                                                    }
                                                ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control bg-light" name="slug" value="<?= $row['slug']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control bg-light" name="name" value="<?= $row['name']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Small Description</label>
                                    <textarea name="small_description" class="form-control bg-light" cols="4"><?= $row['small_description']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">long Description</label>
                                    <textarea name="long_description" class="form-control bg-light" cols="4"><?= $row['long_description']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label"> Price</label>
                                    <input type="number" class="form-control bg-light" name="price" value="<?= $row['price']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Quantity</label>
                                    <input type="number" class="form-control bg-light" name="qty" value="<?= $row['qty']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Selling Price</label>
                                    <input type="number" class="form-control bg-light" name="selling_price" value="<?= $row['selling_price']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Trending</label>
                                    <input type="checkbox"  name="trending" <?= $row['trending']; ?>>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="checkbox"  name="status" <?= $row['status'] == '1' ? 'checked' : ''; ?> >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" class="form-control bg-light" name="image">
                                    <input type="hidden" class="form-control bg-light" name="old_image" value="<?= $row['image']; ?>">
                                    <img src="product/<?= $row['image']; ?>" alt="Product image" width="50px" >
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary col-sm-6">Submit</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php
    include 'footer.php';
?>