<?php
include('php/header.php');
?>
<div id="main">
    <?php


    $reviews = simplexml_load_file("reviews/Gone_With_the_Wind.xml");//must "" cannot ''


    foreach ($reviews->review as $review) {
        $user = (String)$review->user;
        $rating = (String)$review->rating;

        echo "</p>User: $user<p>";
        echo "</p>Rating: $rating<p>";

    }
    print_r($reviews);
    ?>

</div>

<?php
include ("php/footer.php");
?>

