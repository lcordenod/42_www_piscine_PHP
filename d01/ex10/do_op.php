#!/usr/bin/php
<?PHP

function ft_do_op($a, $op, $b)
{
    if ($op == "+")
        return ($a + $b);
    else if ($op == "-")
        return ($a - $b);
    else if ($op == "*")
        return ($a * $b);
    else if ($op == "/")
        return ($a / $b);
    else if ($op == "%")
        return ($a % $b);
}

if ($argc == 4)
    echo ft_do_op(trim($argv[1]), trim($argv[2]), trim($argv[3]))."\n";
else
    echo "Incorrect Parameters\n";

?>