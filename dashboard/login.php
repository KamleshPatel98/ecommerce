<?php
    session_start();
    include 'config.php';
    include '../header.php';
?>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST['email'];
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql = "SELECT * FROM `register` WHERE `email` = '$email' AND `password` = '$password' ";
        $res = $conn->query($sql);

        $row = $res->fetch_assoc();
        if(!empty($row))
        {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $row['name'];
            $_SESSION['login_details'] = $row;
            $_SESSION['login_id'] = $row['cid'];
            $_SESSION['role_as'] = $row['role_as'];

            if(!empty($_SESSION['role_as'] == 1))
            {
                $_SESSION['logadmin'] = 'Welcome to admin dashboard';
                header("Location:/ecommerce/admin/index.php");
            }
            else
            {
                header("Location:/ecommerce/index.php");
            }
            
        }
        else
        {
            $_SESSION['message'] = 'Login not successful';
        }
    }
?>

    <div class="container my-5 col-sm-4 justify-content-center">
        <div class="card" id="form">
            <div class="card-header text-center">
                <h4>Sign In Form</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3 my-4">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" id="input" name="email" required>
                    </div>
                    <div class="mb-3 my-4">
                        <label  class="form-label">Password</label>
                        <input type="password" class="form-control" id="input" name="password"  minlength="8" maxlength="12" required>
                    </div>
                    <div class="text-center my-4">
                        <button type="submit" id="input" class=" btn btn-primary col-sm-6">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    include '../footer.php';
?>