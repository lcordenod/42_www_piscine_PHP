#!/usr/bin/php
<?PHP

if ($argc == 2)
{
    $string = trim($argv[1]);
    while (strpos($string, "  "))
        $string = str_replace("  ", " ", $string);
    echo "$string\n";
}

?>