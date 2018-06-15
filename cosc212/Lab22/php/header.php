<?php
    if (session_id() === "") {
        session_start();
    }
    $_SESSION['lastPage'] = $_SERVER['PHP_SELF'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Classic Cinema</title>
        <link rel="stylesheet" href="./style.css">
        <meta charset="utf-8">
        <?php
        if (isset($scriptList) && is_array($scriptList)) {
            foreach ($scriptList as $script) {
                echo "<script src='$script'></script>";
            }
        }
        ?>
    </head>

    <header>
        <h1>Classic Cinema</h1>
    </header>
    
    <body>
    <div id="user">


        <?php if (isset($_SESSION['authenticatedUser'])) {?>


        <div id="logout">
            <form id="logoutForm" novalidate action="./logout.php" method="POST">
                <?php echo "<p>Welcome, ".$_SESSION['authenticatedUser']."</p>"?>
                <input type="submit" id="logoutSubmit" value="Logout">
            </form>
        </div>

        <?php } else { ?>

        <div id="login">
            <form id="loginForm" novalidate action="./login.php" method="POST">
                <label for="loginUser">Username: </label>
                <input type="text" name="loginUser" id="loginUser">
                <label for="loginPassword">Password: </label>
                <input type="password" name="loginPassword" id="loginPassword">
                <input type="submit" id="loginSubmit" value="Login">
            </form>
            <form novalidate action="./register.php" method="POST">
                <input type="submit" id="toRegister" value="Register">
            </form>
        </div>

        <?php } ?>

    </div>

        <nav>
            <ul>
            <?php
                $currentPage = basename($_SERVER['PHP_SELF']);
                if ($currentPage === 'index.php') {
                    echo "<li> Home";
                    } else {
                    echo "<li> <a href='./index.php'>Home</a>";
                    }

                    if ($currentPage === 'classic.php') {
                    echo "<li> Classic";
                    } else {
                    echo "<li> <a href='./classic.php'>Classics</a>";
                    }

                    if ($currentPage === 'scifi.php') {
                    echo "<li> Science Fiction and Horror";
                    } else {
                    echo "<li> <a href='./scifi.php'>Science Fiction and Horror</a>";
                    }

                    if ($currentPage === 'hitchcock.php') {
                    echo "<li> Hitchcock";
                    } else {
                    echo "<li> <a href='./hitchcock.php'>Hitchcock</a>";
                    }

                    if (isset($_SESSION['authenticatedUser'])) {

                        if ($currentPage === 'checkout.php') {
                            echo "<li> Checkout";
                        } else {
                            echo "<li> <a href='./checkout.php'>Checkout</a>";
                        }

                        if ($currentPage === 'orders.php') {
                            echo "<li> Orders";
                        } else {
                            echo "<li> <a href='./orders.php'>Orders</a>";
                        }
                    }

            ?>
            </ul>
        </nav>



    </body>
</html>

