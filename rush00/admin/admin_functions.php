<?PHP
    include 'clean_sql.php';

    $con = mysqli_connect("127.0.0.1", "root", "123456", "rush00");

    if($_POST['edit_pro']) {
        $pro_id = escape($con, clean($_POST['edit_pro']));
        $pro_name = escape($con, clean($_POST['product_name']));
        $pro_desc = escape($con, clean($_POST['product_desc']));
        $pro_price = escape($con, clean($_POST['product_price']));
        $pro_stock = escape($con, clean($_POST['product_stock']));
        $pro_img = escape($con, clean($_POST['product_img']));
        $pro_cat = escape($con, clean($_POST['product_cat']));
        $pro_cat_sec = escape($con, clean($_POST['product_cat_sec']));
        $pro_var = escape($con, clean($_POST['product_var']));
        $update_pro = "UPDATE products
                        SET product_name = '$pro_name', 
                        product_desc = '$pro_desc',
                        product_price = '$pro_price',
                        product_stock = '$pro_stock',
                        product_img = '$pro_img',
                        product_cat = '$pro_cat',
                        product_cat_sec = '$pro_cat_sec',
                        product_var = '$pro_var'
                        WHERE product_id = '$pro_id'";
        $run_pro = mysqli_query($con, $update_pro);
        if (!$run_pro) {
            die("ERROR: ". mysqli_error($con));
        }
        header("location: admin.php?select=view_products");
    }

    if($_POST['insert_product']) 
    {
        $pro_id = escape($con, clean($_POST['insert_product']));
        $pro_name = escape($con, clean($_POST['product_name']));
        $pro_desc = escape($con, clean($_POST['product_desc']));
        $pro_price = escape($con, clean($_POST['product_price']));
        $pro_stock = escape($con, clean($_POST['product_stock']));
        $pro_img = escape($con, clean($_POST['product_img']));
        $pro_cat = escape($con, clean($_POST['product_cat']));
        $pro_cat_sec = escape($con, clean($_POST['product_cat_sec']));
        $pro_var = escape($con, clean($_POST['product_var']));
        $insert_pro = "INSERT INTO products
                        SET product_name = '$pro_name',
                        product_id = '$pro_id',
                        product_desc = '$pro_desc',
                        product_price = '$pro_price',
                        product_stock = '$pro_stock',
                        product_img = '$pro_img',
                        product_cat = '$pro_cat',
                        product_cat_sec = '$pro_cat_sec',
                        product_var = '$pro_var'";
        $run_pro = mysqli_query($con, $insert_pro);
        if (!$run_pro) {
            die("ERROR: ". mysqli_error($con));
        }
        header("location: admin.php?select=view_products");
    }

    if ($_POST['edit_cat']) 
    {
        $cat_id = escape($con, clean($_POST['edit_cat']));
        $cat_name = escape($con, clean($_POST['cat_name']));
        $update_cat = "UPDATE categories
                        SET cat_name = '$cat_name' 
                        WHERE cat_id = '$cat_id'";
        $run_cat = mysqli_query($con, $update_cat);
        if (!$run_cat) {
            die("ERROR: ". mysqli_error($con));
        }
        header("location: admin.php?select=view_categories");
    }

    if ($_POST['del_cat']) 
    {
        $cat_id = escape($con, clean($_POST['del_cat']));
        $del_cat = "DELETE FROM categories
                        WHERE cat_id = '$cat_id'";
        $run_cat = mysqli_query($con, $del_cat);
        if (!$run_cat) {
            die("ERROR: ". mysqli_error($con));
        }
        header("location: admin.php?select=view_categories");
    }

    if ($_POST['del_pro']) 
    {
        $product_id = escape($con, clean($_POST['del_pro']));
        $del_pro = "DELETE FROM products
                        WHERE product_id = '$product_id'";
        $run_pro = mysqli_query($con, $del_pro);
        if (!$run_pro) {
            die("ERROR: ". mysqli_error($con));
        }
        header("location: admin.php?select=view_products");
    }

    if ($_POST['insert_cat']) 
    {
        $cat_id = escape($con, clean($_POST['insert_cat']));
        $cat_name = escape($con, clean($_POST['cat_name']));
        $insert_cat = "INSERT INTO categories
                        SET cat_name = '$cat_name',
                        cat_id = '$cat_id'";
        $run_cat = mysqli_query($con, $insert_cat);
        if (!$run_cat) {
            die("ERROR: ". mysqli_error($con));
        }
        header("location: admin.php?select=view_categories");
    }

    if ($_POST['del_customer']) 
    {
        $customer_login = escape($con, clean($_POST['del_customer']));
        $del_cust = "DELETE FROM customers
                        WHERE customer_login = '$customer_login'";
        $run_cust = mysqli_query($con, $del_cust);
        if (!$run_cust) {
            die("ERROR: ". mysqli_error($con));
        }
        header("location: admin.php?select=view_customers");
    }

    if ($_POST['edit_customer']) 
    {
        $customer_login = escape($con, clean($_POST['edit_customer']));

        $check_cust = "SELECT * FROM customers WHERE customer_login = '$customer_login'";
        $run_check_cust = mysqli_query($con, $check_cust);
        if (!$run_check_cust) {
            die("ERROR: ". mysqli_error($con));
        }
        $c = mysqli_fetch_assoc($run_check_cust);

        $rights = !$c['is_admin'];
        $sql = "UPDATE customers 
                SET is_admin = '$rights'
                WHERE customer_login = '$customer_login'";

        $edit_rights = mysqli_query($con, $sql);
        if (!$edit_rights) {
            die("ERROR: ". mysqli_error($con));
        }
    }

    function    select_option($id)
    {
        foreach ($_GET as $key => $val)
        {
            if ($key == "select")
                $option = $val;
            if ($key == "product_id")
                $id = $val;
            if ($key == "cat_id")
                $id = $val;
        }
        if ($option == "insert_product")
            insert_product();
        else if ($option == "view_products")
            view_products();
        else if ($option == "insert_category")
            insert_category();
        else if ($option == "view_categories")
            view_categories();
        else if ($option == "view_customers")
            view_customers();
        else if ($option == "view_orders")
            view_orders();
        else if ($option == "edit_product")
            edit_product($id);
        else if ($option == "edit_category")
            edit_category($id);
        else if ($option == "view_customers")
            view_customers();
        else if ($option == "edit_customer")
            edit_customer();
        else if ($option == "del_customer")
            del_customers();
    }

    function    view_products()
    {
        global $con;
        $get_pro = "select * from products";
        $run_pro = mysqli_query($con, $get_pro);

        echo "<h3>These are all the products, click on one to edit</h3>";
        while ($row_pro=mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['product_id'];
            $pro_name = $row_pro['product_name'];
            $pro_desc = $row_pro['product_desc'];
            $pro_price = $row_pro['product_price'];
            $pro_stock = $row_pro['product_stock'];
            $pro_img = $row_pro['product_img'];
            $pro_cat = $row_pro['product_cat'];
            $pro_cat_sec = $row_pro['product_cat_sec'];
            $pro_var = $row_pro['product_var'];
            if ($pro_var)
                echo '<a href="admin.php?select=edit_product&product_id='.$pro_id.'">'.$pro_id.' - '.$pro_name.' ('.$pro_var.')</a><br />';
            else
                echo '<a href="admin.php?select=edit_product&product_id='.$pro_id.'">'.$pro_id.' - '.$pro_name.'</a><br />';
        }
    }

    function    view_categories()
    {
        global $con;
        $get_cats = "select * from categories";
        $run_cats = mysqli_query($con, $get_cats);

        echo "<h3>These are all the categories, click on one to edit</h3>";
        while ($row_cats = mysqli_fetch_array($run_cats)) {
            $cat_id = $row_cats['cat_id'];
            $cat_name = $row_cats['cat_name'];
            echo '<a href="admin.php?select=edit_category&cat_id='.$cat_id.'">'.$cat_name.'</a><br />';
        }
    }

    function    edit_category($id)
    {
        global $con;
        $get_cat = "select * from categories where $id = cat_id";
        $run_cat = mysqli_query($con, $get_cat);

        while ($row_cat=mysqli_fetch_array($run_cat)) {
            $cat_id = $row_cat['cat_id'];
            $cat_name = $row_cat['cat_name'];
        }

        echo '
            <h3>Editing category '.$cat_name.' ('.$cat_id.')</h3>
            <br />
            <form action="#" method="POST">
            <input type="hidden" name="edit_cat" value="'.$cat_id.'">
            Cat ID:'.$cat_id.'<br><br>
            Cat name:<br>
                <input type="text" name="cat_name" value="'.$cat_name.'" required><br>
                <button style="background-color: grey;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"type="submit">Edit</button>
            </form>
            <br>
            <form action"#" method="POST">
                <input type="hidden" name="del_cat" value="'.$cat_id.'">
                <button style="background-color: red;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"type="submit">Delete</button>
            </form>';
    }

    function    list_categories($id)
    {
        global $con;
        $get_cat = "select * from categories";
        $run_cat = mysqli_query($con, $get_cat);
        $tab_cat = array();

        while ($row_cat=mysqli_fetch_array($run_cat)) {
            $tab_cat[] = $row_cat;
        }
        foreach ($tab_cat as $cat)
        {
            if ($cat['cat_id'] !== $id)
                $ret .= '<option value="'.$cat['cat_id'].'">'.$cat['cat_name'].'</option>';
            else if ($cat['cat_id'] == $id)
                $ret .= '<option value="'.$cat['cat_id'].'" selected>'.$cat['cat_name'].'</option>';
        }
        return ($ret);
    }

    function    edit_product($id)
    {
        global $con;
        $get_pro = "select * from products where $id = product_id";
        $run_pro = mysqli_query($con, $get_pro);

        while ($row_pro=mysqli_fetch_array($run_pro)) {
            $pro_id = $row_pro['product_id'];
            $pro_name = $row_pro['product_name'];
            $pro_desc = $row_pro['product_desc'];
            $pro_price = $row_pro['product_price'];
            $pro_stock = $row_pro['product_stock'];
            $pro_img = $row_pro['product_img'];
            $pro_cat = $row_pro['product_cat'];
            $pro_cat_sec = $row_pro['product_cat_sec'];
            $pro_var = $row_pro['product_var'];
        }

        $get_cat = "select * from categories where cat_id = $pro_cat";
        $run_cat = mysqli_query($con, $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $category_name = $row_cat['cat_name'];

        echo '
            <h3>Editing product '.$pro_name.' ('.$pro_id.')</h3>
            <br />
            <form action="#" method="POST">
            <input type="hidden" name="edit_pro" value="'.$pro_id.'">
            <img src="'.$pro_img.'"style="width: 80px"><br>
            Product ID:'.$pro_id.'<br><br>
            Product name:<br>
                <input type="text" name="product_name" value="'.$pro_name.'" required><br>
            Product description:<br>
                <input class="long-text" type="text" name="product_desc" value="'.$pro_desc.'"><br>
            Product price:<br>
                <input type="text" name="product_price" value="'.$pro_price.'" required><br>
            Product stock:<br>
                <input type="text" name="product_stock" value="'.$pro_stock.'" required><br>
            Product category:<br>
                <select name="product_cat" required>
                    '.list_categories($pro_cat).'
                </select><br><br>
            Product second category:<br>
                <select name="product_cat_sec">
                    '.list_categories($pro_cat_sec).'
                </select><br><br>
            Product image (link):<br>
                <input type="text" name="product_img" value="'.$pro_img.'" required><br>
            Product var:<br>
                <input type="text" name="product_var" value="'.$pro_var.'"><br><br>
                <button style="background-color: grey;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"type="submit">Edit</button>
            </form><br>
            <form action"#" method="POST">
                <input type="hidden" name="del_pro" value="'.$pro_id.'">
                <button style="background-color: red;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"type="submit">Delete</button>
            </form>';
    }

    function    insert_product()
    {
        global $con;

        $get_cat = "select * from categories";
        $run_cat = mysqli_query($con, $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $category_name = $row_cat['cat_name'];

        echo '
            <h3>Adding a new product</h3>
            <br />
            <form action="#" method="POST">
            <input type="hidden" name="insert_product" value="insert_product">
            Product name:<br>
                <input type="text" name="product_name" value="" required><br>
            Product description:<br>
                <input class="long-text" type="text" name="product_desc" value=""><br>
            Product price:<br>
                <input type="text" name="product_price" value="" required><br>
            Product stock:<br>
                <input type="text" name="product_stock" value="" required><br>
            Product category:<br>
                <select name="product_cat">
                    '.list_categories($category_name).'
                </select><br><br>
            Product second category:<br>
                <select name="product_cat_sec">
                    '.list_categories($category_name).'
                </select><br><br>
            Product image (link):<br>
                <input type="text" name="product_img" value="" required><br>
            Product var:<br>
                <input type="text" name="product_var" value=""><br><br>
                <button style="background-color: grey;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"type="submit">Insert</button>
            </form>';
    }

    function    insert_category()
    {
        echo '
            <h3>Inserting category</h3>
            <br />
            <form action="#" method="POST">
            <input type="hidden" name="insert_cat" value="insert_cat">
            Cat name:<br>
                <input type="text" name="cat_name" value="" required><br>
                <button style="background-color: grey;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;"type="submit">Insert</button>
            </form>';
    }

    function    view_customers()
    {
        global $con;
        $get_custs = "select * from customers";
        $run_cust = mysqli_query($con, $get_custs);

        while ($row_custs = mysqli_fetch_array($run_cust)) 
        {
            $cust_login = $row_custs['customer_login'];
            if ($cust_status = $row_custs['is_admin'])
                $status = "admin";
            else
                $status = "regular user";
            if ($cust_login)
            {
                echo '
                <h3>User management</h3>
                <form action="#" method="POST">
                <h3>These are all the users, click on one action to edit</h3>
                <input type="hidden" name="del_customer" value="'.$cust_login.'">
                <p>'.$cust_login.' => rights : '.$status.'</p>
                <button style="background-color: red;border: none;color: white;padding: 5px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 10px;"type="submit">Delete</button>
                </form>';
                echo '
                <form action="#" method="POST">
                <input type="hidden" name="edit_customer" value="'.$cust_login.'">
                <button style="margin-top:5px;background-color: blue;border: none;color: white;padding: 15px 20px;text-align: center;text-decoration: none;display: inline-block;font-size: 10px;"type="submit">Change rights</button>
                </form><br>';
                echo '</form><br>';
            }
        }
    }

?>