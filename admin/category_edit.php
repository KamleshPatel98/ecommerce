<?php
    session_start();
    include 'session.php';
    include 'header.php';
    include 'config.php';
?>

<?php
    //$alert = false;
    //$error = false;
    //$alert1 = false;
    //$alert2 = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $old_image = $_POST['old_image'];
        $meta_title = $_POST['meta_title'];
        $meta_description = $_POST['meta_description'];
        $meta_keyword = $_POST['meta_keywords'];
        $status = isset($_POST['status']) == true ? '1' : '0';
        $popular = isset($_POST['popular']) == true ? '1' : '0';

        if(!empty($image['name']))
        {   
            if($image['type'] == "image/jpeg")
            {
                move_uploaded_file($image['tmp_name'], "photos/" . $image['name'] );
                unlink("photos/" . $old_image);
                $fname = $image['name'];
            }
            else
            {
                $_SESSION['message'] = 'ile format not valid!';
                $fname = $old_image;
            }
        }
        else
        {
            $fname = $old_image;
        }

        $e = $_GET['edit_id'];
        $sql = "UPDATE `category` SET `name` = '$name', `slug` = '$slug', `description` = '$description', `status` = '$status', `popular` = '$popular',
        `image` = '$fname', `meta_title` = '$meta_title', `meta_description` = '$meta_description', `meta_keywords` = '$meta_keyword' WHERE `category`.`id` = '$e' ";

        $res = $conn->query($sql);
        if($res)
        {
            $_SESSION['message'] = 'Category updated successfully!';
        }
        else
        {
            $_SESSION['message'] = 'Category is not updated!';
        }
    }
?>

    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    Add Category
                </div>
                <div class="card-body">

                            <?php
                                if(isset($_GET['edit_id']))
                                {
                                    $e = $_GET['edit_id'];
                                    $sql = "SELECT * FROM `category` WHERE `id` = '$e' ";
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

                    <form method="post" enctype="multipart/form-data">
                        <div class="row text-dark">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control bg-light" name="name" value="<?= $row['name']; ?>" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control bg-light" name="slug" value="<?= $row['slug']; ?>" >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control bg-light" cols="3"><?= $row['description']; ?></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" class="form-control bg-light" name="image">
                                    <input type="hidden" name="old_image" value="<?= $row['image']; ?>" >
                                    <img src="photos/<?= $row['image']; ?>" alt="image" width="50px" > 
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="mb-3">
                                    <label class="form-label">Meta title</label>
                                    <input type="text" class="form-control bg-light" name="meta_title" value="<?= $row['meta_title']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control bg-light" cols="3"><?= $row['meta_description']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Keyword</label>
                                    <input type="text" class="form-control bg-light" name="meta_keywords" value="<?= $row['meta_keywords']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="checkbox"  name="status" <?= $row['status'] == '1' ? 'checked' : ''; ?> >
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Popular</label>
                                    <input type="checkbox" name="popular" <?= $row['popular'] == '1' ? 'checked' : ''; ?> >
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