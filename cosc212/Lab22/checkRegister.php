<?php
include('php/header.php');
include('php/validationFunctions.php');
?>
<div id="main">
<?php
    $userName = $_POST["name"];
    $userPass1 = $_POST["password1"];
    $userPass2 = $_POST["password2"];
    $userEmail = $_POST["email"];
    $judge = true;

    if(!(checkPassLength($userPass1))){
        echo "your password is too short<br/>";
        $judge = false;
    }
    if(!(isEmail($userEmail))){
        echo "That doesn't look like a valid email address<br/>";
        $judge = false;
    }

    $firstLetter = substr($userPass1,0,1);
    if(!(isLetter($firstLetter))){
        echo "First character must be capital letter<br/>";
        $judge = false;
    }


    if($userPass1===$userPass2 && $judge === true) {


        include('php/connectData.php');

        if ($conn->connect_errno) {
            echo "wrong connecting<br/>";
        }

        $query = "SELECT * FROM Users WHERE username = '$userName'";
        $result = $conn->query($query);
        if ($result->num_rows === 0) {
            echo "Thank you for your register<br/>";

            $query = "INSERT INTO Users (username, password, email, role)" . "VALUES('$userName', SHA('$userPass1'), '$userEmail', 'user')";
            $conn->query($query);
            if ($conn->error) {
                echo "connection wrong, please try again<br/>";
            }
            header("refresh:0.7; index.php");
            $_SESSION['authenticatedUser'] = $userName;

        } else {
            echo "sorry, this username is already existed<br/>";
        }
        $result->free();
        $conn->close();
    }else if($userPass1!==$userPass2 && $judge === true){
        echo "Two password are not same, please type again<br/>";

        //header("refresh:0.7; register.php");
    }
?>
</div>
<?php
include ("php/footer.php");
exit;
?>