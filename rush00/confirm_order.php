<?php
    session_start();
    include('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header" href="index.php">
    <a href="index.php">
        <img class="logo" src="srcs/images/logo.png"/>    
    </a>
</div>

<div class="topnav">

</div>

<div class="login">
<?php
            $cart = "private/cart";
            if (file_exists($cart))
            {
                if($_SESSION['loggued_on_user'] !== '')
                {
                    echo("Thank you ");
                    echo($_SESSION['loggued_on_user']);
                    echo(".");
                    echo("\n");
                    echo("Your order was successfully placed!");
                    archiveOrder();
                    unlink("private/cart");
                } else {
                    echo("You must be logged in to place an order.");
                    echo("\n");
                    echo("Please sign in or create an account.");
                }
            }
        ?>
        <br>
        <br>
        <a href="index.php">Back to site</a>
        <br>
        <br>
        <a href="login.html">Login</a>
</div>

<div class="footer">
  <h2>© mascagli / lcordeno 2019</h2>
</div>

</body>