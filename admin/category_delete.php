<?php
    session_start();
    include 'session.php';
    include 'config.php';
    

    if(isset($_POST['id']))
    {
        $d = $_POST['id'];

        $sql1 = "SELECT * FROM `category` WHERE `id` = '$d' ";
        $res1 = $conn->query($sql1);

        $row1 = $res1->fetch_assoc();
        if(!empty($res1))
        {
            $fname = $row1['image'];
            unlink("photos/" . $fname);

            $sql = "DELETE FROM `category` WHERE `category`.`id` = '$d' ";
            $res = $conn->query($sql);

            if($res)
            {
                echo "200";
            }
            else
            {
                echo "500";
            }
        }
    }
?>