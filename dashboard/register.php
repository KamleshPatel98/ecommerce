<?php
    session_start();
    include 'config.php';
    include '../header.php';
?>
<?php
    $alert1 = false;
    $alert2 = false;
    $alert3 = false;
    $alert4 = false;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];

        $exist = "SELECT * FROM `register` WHERE `email` = '$email' ";
        $result = $conn->query($exist);

        if(mysqli_num_rows($result) > 0)
        {
            $_SESSION['message'] = 'Email is already signup';
        }
        else
        {
            if($password == $cpassword){
                $sql = "INSERT INTO `register` (`cid`, `name`, `email`, `phone`, `password`, `created_at`) VALUES (NULL, '$name', '$email', '$phone', '$password', current_timestamp())";
                $res = $conn->query($sql);
    
                if($res)
                {
                    $_SESSION['message'] = 'Sign Up Successful keep login ..';
                    //header("Location:login.php");
                }
                else
                {
                    $_SESSION['message'] = 'Sign Up not Successful!';
                }
            }
            else
            {
                $_SESSION['message'] = 'Password are not match';
            }
        }
    }
?>
    <div class="container col-sm-4 justify-content-center my-5">
        <div class="card" id="form">
            <div class="card-header text-center">
                <h4>Sign Up Form</h4>
            </div>
            <div class="card-body text-dark">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text"  class="form-control" id="input" name="name" pattern="^[A-Za-z\- ']+$" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" id="input" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="input" name="phone" pattern="[0-9]{10}" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Password</label>
                        <input type="password" class="form-control" id="input" name="password" minlength="8" maxlength="12" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="input" name="cpassword"  minlength="8" maxlength="12" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class=" btn btn-primary col-sm-6" id="input">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    include '../footer.php';
?>