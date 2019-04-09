<?PHP
    if(session_start())
    {   
        $_SESSION['loggued_on_user'] = '';
        $cart = "private/cart";
        global $total;

        if (file_exists($cart))
        {
            unlink("private/cart");
        }
        header("Location: index.php");
    }
?>