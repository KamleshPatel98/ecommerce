<?php
    session_start();
    include 'config.php';
    if(isset($_GET["del_id"]))
    {
        $d = $_GET['del_id'];
        $sql = "DELETE FROM `product_quantity` WHERE `product_quantity`.`id` = '$d' ";
        $res = $conn->query($sql);

        if($res)
        {
            $_SESSION['del'] = 'Order deleted successfully';
            header("Location:cart.php");
        }
        else
        {
            $_SESSION['delnot'] = 'Order not deleted';
            header("Location:cart.php");
        }
    }

?>