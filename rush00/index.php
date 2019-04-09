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
        global $con;
        $get_ord = "select * from customers";
        $run_ord = mysqli_query($con, $get_ord);

        while ($row_ord=mysqli_fetch_array($run_ord)) {
            $login = $row_ord['customer_login'];
            if ($_SESSION['loggued_on_user'] === $login )
            {
                $is_admin = $row_ord['is_admin'];
            }
        }
        if ($is_admin == 1)
        {
            echo '<form action="admin/admin.php">
                <input type="submit" value="Show Admin Panel" />
            </form>';

        }
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

<div class="card">
    <div class="img">
        <img class="homepage" src="srcs/home_page.jpg"/>
    </div>
</div>

<div class="footer">
  <h2>© mascagli / lcordeno 2019</h2>
</div>

</body>