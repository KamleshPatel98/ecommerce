<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce</title>
    <link rel="stylesheet" href="/ecommerce/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- alertify -->
    <link rel="stylesheet" href="/ecommerce/admin/assets/alertify/alertify.min.css">
    <link rel="stylesheet" href="/ecommerce/admin/assets/alertify/alertify/bootstrap.min.css">

    <!--datatables-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>
    <header>
    <!-- Navbar start-->
        <nav class="navbar navbar-expand-lg  body-secondary sticky-top shadow" id="navbar">
            <div class="container">
                <h3 class="navbar-brand text-light">Ecommerce</h3>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" id="nav">
                        <a class="nav-link active text-light"  aria-current="page" href="/ecommerce/index.php">Home</a>
                    </li>
                    <li class="nav-item" id="nav">
                        <a class="nav-link active text-light"  aria-current="page" href="/ecommerce/dashboard/categories.php">Categories</a>
                    </li>
                        <?php
                            if(empty($_SESSION['username'])){
                                echo '
                    <li class="nav-item" id="nav">
                        <a class="nav-link active text-light"  aria-current="page" href="/ecommerce/dashboard/register.php">Register</a>
                    </li>
                    <li class="nav-item" id="nav">
                        <a class="nav-link active text-light"  aria-current="page" href="/ecommerce/dashboard/login.php">Login</a>
                    </li>
                                ';
                            }
                        ?>
                    
                    <?php
                            if(isset($_SESSION['username']))
                            {
                                echo '
                    <li class="nav-item" id="nav">
                        <a class="nav-link active text-light"  aria-current="page" href="/ecommerce/dashboard/order.php">Order</a>
                    </li>
                    <li class="nav-item" id="nav">
                        <a class="nav-link active text-light"  aria-current="page" href="/ecommerce/dashboard/logout.php">Logout</a>
                    </li>
                    ';
                            }
                        ?>
                        <?php
                        if(isset($_SESSION['username']))
                            {
                                ?>
                    <li class="nav-item" id="nav">
                        <a class="nav-link active text-light"  href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?=  $_SESSION['username']; ?>
                        </a>
                    </li>
                        <?php
                            }
                        ?>
                </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar end-->
    </header>
    