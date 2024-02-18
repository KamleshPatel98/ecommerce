<?php
    session_start();
    include 'header.php';
    include 'dashboard/config.php';
?>


<?php
    if(isset($_SESSION['user']))
    {
        ?>
                <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
                    <strong><?php echo $_SESSION['user']; ?></strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        <?php
        unset($_SESSION['user']);
    }
?>
    <div class="m-4">
        <!-- Slider -->
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="slider/slider1.png" class="d-block w-100" alt="Slider Image" height="500px">
                </div>
                <div class="carousel-item">
                    <img src="slider/slider4.png" class="d-block w-100" alt="Slider Image"  height="500px">
                </div>
                <div class="carousel-item">
                    <img src="slider/slider3.png" class="d-block w-100" alt="Slider Image"  height="500px">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="d-flex justify-content-center text-light">
            <h5 class=" px-5 p-2 mt-2 text-center col-4" id="trend">Trending Products</h5>
        </div>
        <div class="container">
            <div class="row">
                <?php
                    $sql = "SELECT * FROM `product1998` WHERE `trending` = '1' ";
                    $res = $conn->query($sql);
                    if(mysqli_num_rows($res) > 0)
                    {
                        foreach($res as $row)
                        {
                            ?>
                                <div class="col-md-4 py-3 my-3">
                                    <div class="card shadow" id="card">
                                        <div class="card-body ">
                                            <a href="dashboard/product_view.php?product_view_id=<?= $row['pid']; ?>" id="a">
                                                <div class="text-center text-dark">
                                                    <img src="admin/product/<?= $row['image']; ?>" alt="Product Image" width="250px" height="200px">
                                                    <br>
                                                    <h6 class="my-2" id="button"><?= $row['name']; ?></h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    
        <div class="d-flex justify-content-center text-light">
            <h5 class=" px-5 p-2 text-center col-4" id="about">About Us</h5>
        </div>
        <div>
            <p class="px-3">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloribus debitis molestias explicabo, nihil perspiciatis sint unde dolores perferendis minima odit delectus. Nulla quas dolor expedita consectetur porro, optio culpa enim rerum. Corrupti ex illum ullam quas doloribus maxime cum. Ea, ut! Ea odit ab labore aperiam harum possimus incidunt consequuntur ipsa omnis assumenda ex cumque sint ut, perferendis neque dignissimos, culpa sit necessitatibus sunt itaque fugiat recusandae dolor? Nam dicta vero debitis autem quam cum quas impedit aliquam et voluptate ratione doloribus possimus, modi repellendus hic vitae dolorum iste velit, eos saepe dolores! Perferendis vitae assumenda accusantium unde, iure facilis!</p>
        </div>

        
        <div class="text-dark" id="details">
            <div class="row px-4">
                <div class="col-md-3 my-4">
                    <h5 class="text-light">E-shop</h5>
                    <hr class="danger">
                    <div class="ul">
                        <li><a href="/ecommerce/index.php" class="text-dark" id="a">Home</a></li>
                        <li><a href="" class="text-dark" id="a">About Us</a></li>
                        <?php
                            if(isset($_SESSION['login_id']))
                            {
                                echo ' 
                                    <li><a href="/ecommerce/dashboard/order.php" class="text-dark" id="a">My Order</a></li>
                                    <li><a href="/ecommerce/dashboard/categories.php" class="text-dark" id="a">Our Collection</a></li>
                                ';
                            }
                        ?>
                        
                    </div>
                </div>
                <div class="col-md-3 my-4">
                    <h5 class="text-light">Address</h5>
                    <hr class="danger">
                    <div class="ul">
                        <li> 54/2463, Daganiya, Amanaka, Raipur, Chhattisgarh 492001</li>
                        <li>
                        <i class="fa-solid fa-phone"></i> +91 8319277348 
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i> kamleshp52170@gmail.com 
                        </li>
                    </div>
                </div>
                <div class="col-md-6 my-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.888540915166!2d81.6038160755636!3d21.236267980465477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a28ddd92adbb5eb%3A0x2103c03dcfdfa4a5!2sAghariya%20Samaj%20Seva%20Samiti(%20Boys%20Hostel)!5e0!3m2!1sen!2sin!4v1699010161032!5m2!1sen!2sin" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="text-center p-2">
            <div class="text-light">
                ALL rights reserved Copyright @ Kamlesh Patel - <?= date( 'd/m/Y'); ?>
            </div>
        </div>
    </footer>
<?php
    include 'footer.php';
?>
