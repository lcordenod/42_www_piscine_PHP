#!/usr/bin/php
<?PHP

$i = 2;

function    ft_filter($var)
{
    return ($var !== NULL && $var !== FALSE && $var !== '');
}

if ($argc > 1)
{
    $str = $argv[1];
    $string = trim($str);
    while (strpos($string, "  "))
        $string = str_replace("  ", " ", $string);
    $tab = explode(" ", $string);
    $tab = array_values(array_filter($tab, 'ft_filter'));
    $i = 1;
    while ($i < count($tab))
    {
        echo "$tab[$i] ";
        $i++;
    }
    echo "$tab[0]\n";
}

?>