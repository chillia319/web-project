<?php
    $scriptList = array('jquery-3.1.0.min.js', 'cookies.js');
    include('php/header.php');
    include('php/validationFunctions.php');
    if (!(isset($_SESSION['authenticatedUser']))) {
        header("Location: index.php");
        ?>
<?php } else { ?>


<div id="main">

<?php

/*get information and save in session, session like cookie but in server*/
$_SESSION['deliveryName'] = $_POST['deliveryName'];
$_SESSION['deliveryEmail'] = $_POST['deliveryEmail'];
$_SESSION['deliveryAddress1'] = $_POST['deliveryAddress1'];
$_SESSION['deliveryCity'] = $_POST['deliveryCity'];
$_SESSION['deliveryPostcode'] = $_POST['deliveryPostcode'];

$arr=array();//create an array to hole all errors

/*get deliver name from form in checkout page
 * @param $deliverNam send to isEmpty function
 * if it is empty, then push information in arr
 */
$deliverNam = $_POST['deliveryName'];
if (isEmpty($deliverNam) === true) {
    array_push($arr, "You must enter a deliver name<br/>");
}

/*get email from form in checkout page
 * @param $email send to isEmpty function and isEmail function
 * if it is empty, then push information in arr
 * if the email form is incorrect then push information in arr
 */
$email = $_POST['deliveryEmail'];
if (isEmpty($email) === true) {
    array_push($arr, "You must enter an email address<br/>");
} else if (isEmail($email) === false) {
    array_push($arr, "That doesn't look like a valid email address<br/>");
}

/*get deliveryAddress1 from form in checkout page
 * @param $address send to isEmpty function
 * if it is empty, then push information in arr
 */
$address = $_POST['deliveryAddress1'];
if (isEmpty($address) === true) {
    array_push($arr, "You must enter an address<br/>");
}

/*get deliveryCity from form in checkout page
 * @param $city send to isEmpty function
 * if it is empty, then push information in arr
 */
$city = $_POST['deliveryCity'];
if (isEmpty($city) === true) {
    array_push($arr, "You must enter a city<br/>");
}

/*get deliveryPostcode from form in checkout page
 * @param $number send to isEmpty function, isDigits function and checkLength
 * if it is empty, then push information in arr
 * if the $number is not digits or the length is not correct then push information in arr
 */
$number = $_POST['deliveryPostcode'];
if (isEmpty($number) === true) {
    array_push($arr, "You must enter a postcode<br/>");
} else if (!isDigits($number) || checkLength($number, 4) === false) {
    array_push($arr, "Postcodes must be exactly 4 digits long and only contain the digits 0-9<br/>");
}

/*get cardNumber and cardType from form in checkout page
 * @param $cardNum send to isEmpty function, isDigits function
 * if it is empty and not digits, then push information in arr
 * if the $cardNum and $cardTyp is not match then push information in arr
 */
$cardNum = $_POST['cardNumber'];
$cardTyp = $_POST['cardType'];
if (isEmpty($cardNum) === true) {
    array_push($arr, "You must enter a credit card number<br/>");
} else if (!isDigits($cardNum)) {
    array_push($arr, "The credit card number should only contain the digits 0-9<br/>");
} else if (checkCardNumber($cardTyp, $cardNum) === false) {
    if ($cardTyp === 'amex') {
        array_push($arr, "American Express card numbers must be 15 digits long and start with a '3'<br/>");
    } else if ($cardTyp === 'mcard') {
        array_push($arr, "MasterCard numbers must be 16 digits long and start with a '5'<br/>");
    } else {
        array_push($arr, "Visa card numbers must be 16 digits long and start with a '4'<br/>");
    }
}

/*get cardMonth and cardYear from form in checkout page
 * @param $cardMo and $cardYe send to checkCardDate function
 * if $cardMo and $cardYe cannot match, then push information in arr
 */
$cardMo = $_POST['cardMonth'];
$cardYe = $_POST['cardYear'];
if (checkCardDate($cardMo, $cardYe) === false) {
    array_push($arr, "The card expiry date must be in the future<br/>");
}

/*get cardValidation from form in checkout page
 * @param $cvc send to isEmpty function, isDigits function
 * if it is empty and not digits, then push information in arr
 * @param $cardTyp and $cvc send to checkCardVerification
 *  if they cannot match, then push information in arr
 */
$cvc = $_POST['cardValidation'];
if (isEmpty($cvc)) {
    array_push($arr, "You must enter a CVC value<br/>");
} else if (!isDigits($cvc)) {
    array_push($arr, "The CVC should only contain the digits 0-9<br/>");
} else if (checkCardVerification($cardTyp, $cvc) === false) {
    if ($cardTyp === 'amex') {
        array_push($arr, "American Express CVC values must be 4 digits long<br/>");
    } else if ($cardTyp === 'mcard') {
        array_push($arr, "MasterCard CVC values must be 3 digits long<br/>");
    } else {
        array_push($arr, "Visa CVC values must be 3 digits long<br/>");
    }
}

/*cart this will be an array of PHP objects, and each object will have two properties – a title and a price.*/
$cart = json_decode($_COOKIE['cart']);

if(count($arr)===0){
    setcookie('cart', '', time()-3600, '/'); //like Cookie.set
    //$_SESSION = array();//clear all of the session values $_SESSION = array() + session_destroy() = unset($_SESSION['name'])
    echo "<p>Thank you for your order</p>";
    echo "<table>";
    foreach($cart as $item){
        $title = $item->title;
        $price = $item->price;
        echo "<tr><th>$title</th><th>$price</th></tr>";
    }
    echo "</table>";

    /*write information in orders.xml file*/
    $orders = simplexml_load_file('php/orders.xml');
    $newOrder = $orders->addChild('order');
    $delivery = $newOrder->addChild('delivery');
    $delivery->addChild('orderName', $_SESSION['authenticatedUser']);
    $delivery->addChild('name', $_POST['deliveryName']);
    $delivery->addChild('email', $_POST['deliveryEmail']);
    $delivery->addChild('address', $_POST['deliveryAddress1']);
    $delivery->addChild('city', $_POST['deliveryCity']);
    $delivery->addChild('postcode', $_POST['deliveryPostcode']);
    $newItem = $newOrder->addChild('items');
    foreach($cart as $item) {
        $title = $item->title;
        $price = $item->price;
        $item = $newItem->addChild('item');
        $item->addChild('title', $title);
        $item->addChild('price', $price);
    }
    $orders->saveXML('php/orders.xml');
    
    //session_destroy();
    unset($_SESSION['deliveryName']);
    unset($_SESSION['deliveryEmail']);
    unset($_SESSION['deliveryAddress1']);
    unset($_SESSION['deliveryCity']);
    unset($_SESSION['deliveryPostcode']);
    unset($_COOKIE['cart']); //local copy

}else{
    echo "<p><strong>There were errors in your form</strong></p>";
    foreach($arr as $value) {
        echo $value;
    }
}

?>

</div>
    <?php } ?>
<?php
    include ("php/footer.php");
?>
