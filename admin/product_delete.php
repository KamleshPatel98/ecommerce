<?php
    //session_start();
    session_start();
    include 'session.php';
    include 'config.php';
    if(isset($_POST['pid']))
    {
        $d = $_POST['pid'];
        $sql = "SELECT * FROM `product1998` WHERE `pid` = '$d' ";
        $res = $conn->query($sql);
        $row = $res->fetch_assoc();

        if(!empty($row))
        {
            $fname = $row['image'];
            unlink("product/" . $fname);
            $sql1 = "DELETE FROM `product1998` WHERE `product1998`.`pid` = '$d' ";
            $res1 = $conn->query($sql1);

            if($res1)
            {
                echo "200";
                //$_SESSION['del'] = 'Product deleted successfully';
                //header("Location:product_details.php");
            }
            else
            {
                echo "500";
                //$_SESSION['delnot'] = 'Product not deleted successfully';
                //header("Location:product_details.php");
            }
        }
    }
?>