<?php
session_start();
if (isset($_SESSION['lastPage'])) {
    $url = $_SESSION['lastPage'];
    //print_r($url);
}
if (isset($_SESSION['authenticatedUser'])){
    header("Location: index.php");
}
include('php/header.php');
?>

<div id="main">
<?php

    $userName = $_POST["loginUser"];
    $userPass = $_POST["loginPassword"];

    include('php/connectData.php');

    if ($conn->connect_errno) {
    echo "wrong connecting<br/>";
    }

    $query = "SELECT * FROM Users WHERE username = '$userName'";
    $query1 = "SELECT * FROM Users WHERE username = '$userName' AND password = SHA('$userPass')";
    $result = $conn->query($query);
    $result1 = $conn->query($query1);
    //$query2 = "SELECT username FROM Users WHERE username = '$userName'";
    //$result2 = $conn->query($query2);


    if ($result->num_rows === 0) {
        echo "sorry, you need to register first<br/>";
    } else {
        if($result1->num_rows === 0){
            echo "Your got wrong password<br/>";
        }else {
            $row = $result->fetch_assoc();
            $name = $row["username"];
            $role = $row["role"];
            $_SESSION['authenticatedUser'] = $name;
            $_SESSION['role'] = $role;
            echo "Thank you for coming back $name<br/>";
            //print_r($url);
            header("refresh:0.6; $url");
        }
    }

$result->free();
$result1->free();
$conn->close();
?>

</div>

<?php
include ("php/footer.php");
exit;
?>