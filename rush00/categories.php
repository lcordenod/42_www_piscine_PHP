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
    <ul class="main-nav">
        <?php getCats(); ?>
        <li class="right"><a href="cart.php"><img id="cart-icon" src="srcs/images/cart-icon.png"></a></li>
        <?php
            if(($_SESSION['loggued_on_user'] === ''))
            {
                echo '<li class="right"><a href="login.html">Log in / Register</a></li>';
            } else {
                echo '<li class="right"></li><form action="logout.php">
                            <input type="submit" name="submit" value="Hello '.$_SESSION["loggued_on_user"].' (Log out)"/>
                        </form></li>';
            }
        ?>
    </ul>
</div>

<div class="products">
<ul class="main-nav">
        <?php getPro(); ?>
    </ul>
</div>

<div class="footer">
  <h2>© mascagli / lcordeno 2019</h2>
</div>

</body>