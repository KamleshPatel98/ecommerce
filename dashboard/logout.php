<?php
    session_start();
    session_unset();
    session_destroy();
?>
<?php
    session_start();
    $_SESSION['logout'] = 'Logout successful';
    header("Location:/ecommerce/dashboard/login.php");
?>