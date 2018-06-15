<?php
session_start();
if (isset($_SESSION['authenticatedUser'])) {
    header("Location: index.php");
}
include('php/header.php');
?>

<div id="main">
<form id="checkoutForm" novalidate action="checkRegister.php" method="POST">
    <fieldset>
        <legend>Please enter your details:</legend>
        <p>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </p>
        <p>
            <label for="password1">Password:</label>
            <input type="password" name="password1" id="password1" required><br>
            (Please using more than 8 and less than 12 characters (letters and numbers), first character must be capital letter.)
        </p>
        <p>
            <label for="password2">Enter again:</label>
            <input type="password" name="password2" id="password2" required>
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required>
        </p>
        <input type="submit" id="submit">
        <input type="reset" id="reset">
    </fieldset>
</form>

</div>

<?php
include ("php/footer.php");
?>