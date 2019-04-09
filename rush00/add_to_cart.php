<?php
    include('functions.php');
    $cart = "private/cart";

    if ($_GET['pro_id'] !== NULL && $_GET['submit'] === 'Add to cart') 
    {
        if (file_exists($cart))
        {
            $data = unserialize(file_get_contents($cart));
            $stack = array("");
            foreach ($data as $key => $instance)
            {
                if ($_GET['pro_id'] === $instance['pro_id'])
                {
                        $instance['qty'] = $instance['qty'] + 1;
                        $data[$key] = $instance;
                        file_put_contents($cart, serialize($data));
                        header("Location: cart.php");
                } 
            } 
            foreach ($data as $instance)
            {
                array_push($stack, $instance['pro_id']);
            }
            if (!array_search($_GET['pro_id'], $stack)) {
                $cart_data = [
                    'pro_id' => $_GET['pro_id'],
                    'qty' => 1
                ];
                $data[] = $cart_data;
                file_put_contents($cart, serialize($data));
            }
        }  else {
            if (!file_exists('private'))
                mkdir('private', 0755);
                $cart_data = [
                    'pro_id' => $_GET['pro_id'],
                    'qty' => 1
                ];
                $data[] = $cart_data;
                file_put_contents($cart, serialize($data));
        }
        header("Location: cart.php");
    }
?>