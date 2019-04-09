<?php
    $connection = mysqli_connect("localhost:3307", "root", "azerty123");
    $sql = file_get_contents("rush00.sql");
    $sql_array = explode(";", $sql);
    foreach ($sql_array as $elem) {
      mysqli_query($connection, $elem);
    }
?>