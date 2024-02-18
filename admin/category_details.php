<?php
    session_start();
    $module="cateDeta";
    include 'session.php';
    include 'header.php';
    include 'config.php';
?>

<div class="container">
    <div class="card">
        <div class="card-header bg-secondary">
            <h4>Category Details</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="example">
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
                                $sql = "SELECT * FROM `category` ";
                                $res = $conn->query($sql);

                                if(mysqli_num_rows($res) > 0)
                                {
                                    foreach($res as $row)
                                    {
                                        ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><img src="photos/<?= $row['image']; ?>"  alt="image" width="50px;"> </td>
                        <td>
                            <?= $row['status'] == '1' ? 'Visible' : 'Hide' ; ?>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info"><a href="category_edit.php?edit_id=<?= $row['id']; ?>" class="text-light">Edit</a></button>
                            <button class="btn btn-sm btn-danger categorydel" value="<?= $row['id']; ?>">Delete</button>
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

<?php
    include 'footer.php';
?>