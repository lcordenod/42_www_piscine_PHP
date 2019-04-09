<?php
    session_start();
?>
<!DOCTYPE html>
<?php
    include('admin_functions.php');
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<div class="header" href="../index.php">
    <a href="../index.php">
        <img class="logo" src="../srcs/images/logo.png"/>    
    </a>
</div>

<h1 id="admin-section-title">Admin Section</h1>

<div id="admin-section-right">
    <h2>Control Panel</h2>
    <a href="admin.php?select=insert_product">Insert a product</a>
    <a href="admin.php?select=view_products">View all products</a>
    <a href="admin.php?select=insert_category">Insert new category</a>
    <a href="admin.php?select=view_categories">View all categories</a>
    <a href="admin.php?select=view_customers">View users</a>
    <a href="admin.php?select=view_orders">View orders</a>
    <a href="../logout.php">Logout</a>
</div>    
<div id="admin-section-left">
    <?PHP 
        select_option(NULL);
    ?>
</div>

</body>