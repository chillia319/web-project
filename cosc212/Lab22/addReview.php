<?php
    session_start();
    if (isset($_SESSION['lastPage'])) {
        $url = $_SESSION['lastPage'];
    }
    include('php/header.php');
?>
<div id="main">
<?php

    $filmName = $_POST['xmlFileName'];
    $filmName1 = $filmName.".xml";
    $reviews = simplexml_load_file("reviews/$filmName1");//must "" cannot ''

    foreach ($reviews->review as $review){
        $user = (String)$review->user;
        if($user === $_SESSION['authenticatedUser']){
            unset($review[0]);
        }
    }
    $review = $reviews->addChild('review');
    $review->addChild('user', $_SESSION['authenticatedUser']);
    $review->addChild('rating', $_POST['reviewValue']);
    $reviews->saveXML("reviews/$filmName1");

    echo "Thank you for write review<br/>";
    header("refresh:0.6; $url");
?>

</div>

<?php
    include ("php/footer.php");
    exit;
?>
