<?php
session_start();
if (!(isset($_SESSION['authenticatedUser']))) {
    header("Location: index.php");
}
include('php/header.php');
?>

<div id="main">
    <?php
        setcookie('cart', '', time()-3600, '/');
        $_SESSION = array();
        session_destroy();
        unset($_COOKIE['cart']); //local copy
        unset($_SESSION['cart']);
        echo "See you soon";
        $url = "index.php";
        header("refresh:0.5; $url");
    ?>
</div>

<?php
include ("php/footer.php");
exit;
?>
