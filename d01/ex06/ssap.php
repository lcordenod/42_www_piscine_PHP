#!/usr/bin/php
<?PHP

$i = 2;

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
    sort($tab);
    while ($i < count($tab))
    {
        echo "$tab[$i]\n";
        $i++;
    }
}

?>