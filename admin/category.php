<?php
    session_start();
    $module="category";
    include 'session.php';
    include 'header.php';
    include 'config.php';
?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST['name'];
        $slug = $_POST['slug'];
        $description = $_POST['description'];
        $image = $_FILES['image'];
        $meta_title = $_POST['meta_title'];
        $meta_description = $_POST['meta_description'];
        $meta_keyword = $_POST['meta_keyword'];
        $status = isset($_POST['status']) == true ? '1' : '0';
        $popular = isset($_POST['popular']) == true ? '1' : '0';

        if(file_exists("photos/" . $image['name']))
        {   
            $_SESSION['message'] = 'photo is already is exist';
        }
        else if($image['type'] == "image/jpeg")
        {
            move_uploaded_file($image['tmp_name'], "photos/" . $image['name'] );

            $fname = $image['name'];
            $sql = "INSERT INTO `category` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES(NULL, '$name', '$slug', '$description', '$status', '$popular', '$fname', '$meta_title', '$meta_description', '$meta_keyword', current_timestamp())";
            $res = $conn->query($sql);
            if($res)
            { 
                $_SESSION['message'] = 'Category is added Successfully';
            }
            else
            {
                $_SESSION['message'] = 'Category is not added';
            }
        }
        else
        {
            $_SESSION['message'] = 'Image file is not valid';
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
                    <form method="post" enctype="multipart/form-data">
                        <div class="row text-dark">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control bg-light" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control bg-light" name="slug" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control bg-light" cols="3" required></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" class="form-control bg-light" name="image" required>
                                </div>
                            </div>
                            <div class="col-sm-6">

                                <div class="mb-3">
                                    <label class="form-label">Meta title</label>
                                    <input type="text" class="form-control bg-light" name="meta_title" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control bg-light" cols="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Keyword</label>
                                    <input type="text" class="form-control bg-light" name="meta_keyword" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="checkbox"  name="status">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Popular</label>
                                    <input type="checkbox" name="popular">
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