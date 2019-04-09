<?php
    session_start();
?>
<!DOCTYPE html>
<?php
    include('functions.php');
?>
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
        <a href="index.php" style="float:right">Continue Shopping</a>
        <?php
        if(($_SESSION['loggued_on_user'] === ''))
        {
            echo '<a href="login.html" style="float:right">Log in / Register  </a>';
        } else {
            echo '<form action="logout.php">
                        <input class="logout"  style="float:right" type="submit" name="submit" value="Hello '.$_SESSION["loggued_on_user"].' (Log out)"/>
                </form>';
        }
        ?>
</div>

<div class="card">
    <form action="" method="post" enctype="multipart/form-data">
        <table align="center" width= "700">
            <tr align="center">
                <?PHP
                    displayCart();
                    totalCart();
                ?>
            </tr>
        </table>
    </form>
</div>

<?php
    $cart = "private/cart";
    if (file_exists($cart))
    {
        echo'
        <div class="card">
        <form action="confirm_order.php" method="POST">
                <input style="float:right" type="submit" name="submit" value="Confirm Order"/>
        </form>
        </div>';
    }
?>

<div class="footer">
  <h2>© mascagli / lcordeno 2019</h2>
</div>

</body>