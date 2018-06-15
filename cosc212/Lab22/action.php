<?php
function addReviewForm($xmlFileName) {
    if (isset($_SESSION['authenticatedUser'])) {
        echo "<form action='addReview.php' method='POST'>";
        echo "<input type='hidden' name='xmlFileName' value='$xmlFileName'>";
        echo "<select name='reviewValue'>";
        for ($k = 1; $k <= 5; $k++) {
            echo "<option value='$k'>$k</option>";
        }
        echo "</select>";
        echo "<input type='submit' id='submit'>";
        echo "</form>"; }
}
?>