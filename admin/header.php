<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">

    <title>
        Ecommerce
    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

    <!-- alertify -->
    <link rel="stylesheet" href="/ecommerce/admin/assets/alertify/alertify.min.css">
    <link rel="stylesheet" href="/ecommerce/admin/assets/alertify/bootstrap.min.css">

    <!--datatables-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

</head>


<body class="g-sidenav-show  bg-gray-100">
    
        <aside
            class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
            id="sidenav-main">

            <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank">
                <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Ecommerce</span>
            </a>
            </div>


            <hr class="horizontal light mt-0 mb-2">

            <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item">
                <a class="nav-link <?= $module=='index'?'active':'';?> text-white " href="index.php">
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $module=='category'?'active':'';?> text-white " href="category.php">
                        <span class="nav-link-text ms-1">Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  <?= $module=='cateDeta'?'active':'';?>   text-white " href="category_details.php">
                        <span class="nav-link-text ms-1">Category Details</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  <?= $module=='product'?'active':'';?> text-white " href="product.php">
                        <span class="nav-link-text ms-1">Product</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  <?= $module=='prodDeta'?'active':'';?> text-white " href="product_details.php">
                        <span class="nav-link-text ms-1">Product Details</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  <?= $module=='order'?'active':'';?> text-white " href="order.php">
                        <span class="nav-link-text ms-1">Orders</span>
                    </a>
                </li>

            
            </ul>
            </div>

            <div class="sidenav-footer position-absolute w-100 bottom-0 ">
                <div class="mx-3">
                    <a class="btn btn-primary w-100" href="/ecommerce/dashboard/logout.php" type="button">Logout</a>
                </div>
            </div>
        </aside>

        <main class="main-content border-radius-lg ">
        <!-- Navbar -->
        <div class="content-wrapper">
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">index</li>
                </ol>
                

                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                
                
                </div>
            </div>
            </nav>
        </div>
            <!-- End Navbar -->