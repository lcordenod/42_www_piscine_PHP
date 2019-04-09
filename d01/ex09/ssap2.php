#!/usr/bin/php
<?PHP

$i = 2;

function ft_strlen($str)
{
    $strlen = 0;

    while ($str[$strlen] != '')
        $strlen++;
    return ($strlen);
}

function ft_get_tab_idx($c)
{
    $tab_cmp = "abcdefghifjklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
    $i = 0;

    while ($i < ft_strlen($tab_cmp))
    {
        if ($c == $tab_cmp[$i])
            return ($i);
        $i++;
    }
    return (-1);
}

function ft_cmp_idx($a, $b)
{
    $i = 0;

    $c = strtolower($a);
    $d = strtolower($b);
    while ($i < min(ft_strlen($c), ft_strlen($d)))
    {
        if (ft_get_tab_idx($c[$i]) != ft_get_tab_idx($d[$i]))
            return (ft_get_tab_idx($c[$i]) < ft_get_tab_idx($d[$i])) ? -1 : 1;
        $i++;
    }
    if ($c[$i])
        return (1);
    else if ($d[$i])
        return (-1);
    return (0);
}

if ($argc > 1)
{
    $str = $argv[1];
    while ($i <= $argc)
    {
        $str = $str . " " . $argv[$i];
        $i++;
    }
    $string = trim($str);
    while (strpos($string, "  "))
        $string = str_replace("  ", " ", $string);
    $tab = explode(" ", $string);
    $i = 0;
    usort($tab, "ft_cmp_idx");
    while ($i < count($tab))
    {
        echo "$tab[$i]\n";
        $i++;
    }
}

?>