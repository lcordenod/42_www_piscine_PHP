#!/usr/bin/php
<?PHP

function ft_strlen($str)
{
    $strlen = 0;

    while ($str[$strlen] != '')
        $strlen++;
    return ($strlen);
}

function    ft_input_checker($input)
{
    $forbid = array('rm', ':(){:|:&};:', 'command > /dev/sda', 'command', 'mv', 'wget', 'mkfs', '>', 'foo', 'bar', 'dev', 'chmod', 'cp', 'tmp', 'xeb');
    foreach ($forbid as $elem)
    {
        if (strpos($input, $elem) !== false)
            return (0);
    }
    return (1);
}

function ft_do_op($string)
{
    $str = trim($string);
    if (($op_idx = strpos($str, "/")) !== false)
        $op = "/";
    else if (($op_idx = strpos($str, "*")) !== false)
        $op = "*";
    else if (($op_idx = strpos($str, "%")) !== false)
        $op = "%";
    else if (($op_idx = strpos($str, "+")) !== false)
        $op = "+";
    else if ($str[0] == "-")
    {
        if (($op_idx = strpos($str, "-", 1)) !== false)
            $op = "-";
    }
    else if (($op_idx = strpos($str, "-")) !== false)
        $op = "-";
    $a = trim(substr($str, 0, $op_idx));
    $b = trim(substr($str, $op_idx + 1, ft_strlen($str)));
    if (is_numeric($a) && is_numeric($b))
    {
        if ($op == "+")
            echo ($a + $b)."\n";
        if ($op == "-")
            echo ($a - $b)."\n";
        if ($op == "/")
            echo ($a / $b)."\n";
        if ($op == "*")
            echo ($a * $b)."\n";
        if ($op == "%")
            echo ($a % $b)."\n";
    }
    else
    {
        echo "Syntax Error\n";
        return (0);
    }
}

if ($argc == 2)
    {
        if (ft_input_checker($argv[1]))
            ft_do_op($argv[1]);
        else
        {
            echo "Syntax Error\n";
            return (0);
        }
    }
else
    echo "Incorrect Parameters\n";

?>