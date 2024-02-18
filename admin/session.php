<?php
    //session_start();
    if(empty($_SESSION['role_as']))
    {
        header("Location:/ecommerce/dashboard/logout.php");
    }
?>
