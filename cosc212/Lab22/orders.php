<?php
$scriptList = array('jquery-3.1.0.min.js', 'cookies.js');
include('php/header.php');
if (!(isset($_SESSION['authenticatedUser']))) {
    header("Location: index.php");?>
<?php } else { ?>

<div id="main">

<?php

$orders = simplexml_load_file('php/orders.xml');
$count = 0;

foreach ($orders->order as $order) {
    $orderName = (string)$order->delivery->orderName;
    if($orderName === $_SESSION['authenticatedUser'] || $_SESSION['role'] === "admin"){
        $name = $order->delivery->name;
        $email = $order->delivery->email;
        $address = $order->delivery->address;
        $city = $order->delivery->city;
        $postcode = $order->delivery->postcode;

        echo "</p>orderName: $orderName<p>";
        echo "</p>Name: $name<p>";
        echo "</p>email: $email<p>";
        echo "</p>address: $address<p>";
        echo "</p>city: $city<p>";
        echo "</p>postcode: $postcode<p>";

        foreach($order->items->item as $item) {
            $title = $item->title;
            $price = $item->price;;
            echo "</p>title: $title<p>";
            echo "</p>price: $price<p>";
        }
        $count++;
    }
    echo "<br/>";
}

if($count === 0){
    echo "You have not made any orders";
}

?>
<?php } ?>

</div>
<?php
include ("php/footer.php");
?>

