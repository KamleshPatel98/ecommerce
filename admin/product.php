<?php
    session_start();
    $module="product";
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

        if(file_exists("product/" . $image['name']))
        {   
            $_SESSION['message'] = 'File is already exist!';
        }
        else if($image['type'] == "image/jpeg")
        {
            move_uploaded_file($image['tmp_name'], "product/" . $image['name'] );

            $fname = $image['name'];
            $sql = "INSERT INTO `product1998` (`pid`, `category_id`, `slug`, `name`, `small_description`, `long_description`, `price`, `qty`, `selling_price`, `trending`, `status`,
            `created_at`, `image`)
            VALUES (NULL, '$category_id', '$slug', '$name', '$small_description', '$long_description', '$price', '$qty', '$selling_price', '$trending', '$status', current_timestamp(), '$fname')";
            $res = $conn->query($sql);
            if($res)
            {
                $_SESSION['message'] = 'Product added successfully!';
            }
            else
            {
                $_SESSION['message'] = 'Product is not  added!';
            }
        }
        else
        {
            $_SESSION['message'] = 'File formate is not valid';
        }
        
    }
?>

    <div class="container">
        <div class="row">
            <div class="card">
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
                                        <option value="<?= $row1['id']; ?>"><?= $row1['name']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control bg-light" name="slug" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control bg-light" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Small Description</label>
                                    <textarea name="small_description" class="form-control bg-light" cols="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">long Description</label>
                                    <textarea name="long_description" class="form-control bg-light" cols="4" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label"> Price</label>
                                    <input type="number" class="form-control bg-light" name="price" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Qty</label>
                                    <input type="number" class="form-control bg-light" name="qty" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Selling Price</label>
                                    <input type="number" class="form-control bg-light" name="selling_price" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Trending</label>
                                    <input type="checkbox" name="trending">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="checkbox"  name="status">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" class="form-control bg-light" name="image" required>
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