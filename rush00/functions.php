<?PHP
    $con = mysqli_connect("127.0.0.1", "root", "123456", "rush00");

    function getCats() {
        global $con;
        $get_cats = "select * from categories";
        $run_cats = mysqli_query($con, $get_cats);

        while ($row_cats=mysqli_fetch_array($run_cats)) {
            $cat_id = $row_cats['cat_id'];
            $cat_name = $row_cats['cat_name'];

            if ($cat_id < 100)
                echo"<li><a href='categories.php?cat=$cat_id'>$cat_name</a></li>";
        }
    }

    function getPro() {
        global $con;
        $get_pro = "select * from products";
        $run_pro = mysqli_query($con, $get_pro);

        foreach ($_GET as $key => $param)
        {
            if ($param !== NULL)
                $param = $param;
        }

        while ($row_pro=mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['product_id'];
            $pro_name = $row_pro['product_name'];
            $pro_desc = $row_pro['product_desc'];
            $pro_price = $row_pro['product_price'];
            $pro_stock = $row_pro['product_stock'];
            $pro_img = $row_pro['product_img'];
            $pro_parent_id = $row_pro['parent_id'];
            $pro_cat = $row_pro['product_cat'];
            $pro_cat_sec = $row_pro['product_cat_sec'];

            if ($pro_cat == $param || $pro_cat_sec == $param) {
            echo "
            <div id='single_product'>
            <h3>$pro_name</h3>
            <a href='products.php?prod_id=$pro_id'>
            <img src='$pro_img' height='350' />
            </a>
            <h3>$pro_price $</h3>
            </div>
            ";
        }                
        }
    }

    function getIndivPro() {
        global $con;
        $get_pro = "select * from products";
        $run_pro = mysqli_query($con, $get_pro);

        foreach ($_GET as $key => $param)
        {
            if ($param !== NULL)
                $param = $param;
        }

        while ($row_pro=mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['product_id'];
            $pro_name = $row_pro['product_name'];
            $pro_desc = $row_pro['product_desc'];
            $pro_price = $row_pro['product_price'];
            $pro_stock = $row_pro['product_stock'];
            $pro_img = $row_pro['product_img'];
            $pro_parent_id = $row_pro['parent_id'];
            $pro_cat = $row_pro['product_cat'];

            if ($pro_id == $param) {
            echo "
            <div id='full_product'>
                <div id='single_product'>
                <h3>$pro_name</h3>
                <a href='products.php?prod_id=$pro_id'>
                <img src='$pro_img' height='350' />
                </a>
                <h3>$pro_price $</h3>
                </div>
                <div id='product_desc'>
                <h3>$pro_desc</h3>
                </div>
            </div>
            ";
            }                
        }
    }

    function displayCart() 
    {
        global $con;
        $get_pro = "select * from products";
        $run_pro = mysqli_query($con, $get_pro);
        $cart = "private/cart";

        if (file_exists($cart))
        {
            while ($row_pro=mysqli_fetch_array($run_pro)) 
            {
                $pro_id = $row_pro['product_id'];
                $pro_name = $row_pro['product_name'];
                $pro_desc = $row_pro['product_desc'];
                $pro_price = $row_pro['product_price'];
                $pro_stock = $row_pro['product_stock'];
                $pro_img = $row_pro['product_img'];
                $pro_parent_id = $row_pro['parent_id'];
                $pro_cat = $row_pro['product_cat'];


                    $data = unserialize(file_get_contents($cart));
                    foreach($data as $instance)
                    {
                        if ($instance['pro_id'] === $pro_id)
                        {
                            echo "
                                <h5>$pro_name</h5>
                                <a href='products.php?prod_id=$pro_id'>
                                <img src='$pro_img' height='100' />
                                </a>
                                <h5>$pro_price $</h5>
                                <h5>Quantity: ".$instance['qty']."</h5>
                                </div>              
                            ";
                        }
                     }
            }              
        } else {
            echo '<h3>Your cart is empty<h3>';
        } 
    }

    function totalCart() 
    {
        global $con;
        $get_pro = "select * from products";
        $run_pro = mysqli_query($con, $get_pro);
        $cart = "private/cart";
        $total = 0;

        if (file_exists($cart))
        {
            while ($row_pro=mysqli_fetch_array($run_pro)) 
            {
                $pro_id = $row_pro['product_id'];
                $pro_price = $row_pro['product_price'];

                $data = unserialize(file_get_contents($cart));
                foreach ($data as $instance)
                {
                    if ($instance['pro_id'] === $pro_id) 
                    {
                        $total += $pro_price * $instance['qty'];
                    } 
                }
            }
        }
        echo "<h3>Total = $total $\n</h3>";
    }

    function archiveOrder()
    {
        global $con;
        $time = time();
        $login = $_SESSION['loggued_on_user'];

        $get_pro = "select * from products";
        $run_pro = mysqli_query($con, $get_pro);

        $cart = "private/cart";

        while ($row_pro=mysqli_fetch_array($run_pro)) 
            {
                $pro_id = $row_pro['product_id'];
                $pro_price = $row_pro['product_price'];

                $data = unserialize(file_get_contents($cart));
                foreach($data as $instance)
                {
                    if ($instance['pro_id'] === $pro_id)
                    {
                        $product_prices .= "$pro_price, ";
                        $total += $pro_price * $instance['qty'];
                    }
                }
            } 
        if (file_exists($cart))
        {
            $data = unserialize(file_get_contents($cart));

            foreach ($data as $instance)
            {
                $product_id = $instance['pro_id'];
                $product_ids .= "$product_id , ";
                $quantity = $instance['qty'];
                $quantities .= "$quantity , ";
            }

            $query = "INSERT INTO orders
                        SET order_id = $time,
                        customer_login = '$login',
                        product_ids = '$product_ids',
                        product_prices = '$product_prices',
                        product_quantities = '$quantities', 
                        total = '$total'";

            $run_ord = mysqli_query($con, $query);
            if (!$run_ord) {
                die("ERROR: ". mysqli_error($con));
            }
        }
    }
?>