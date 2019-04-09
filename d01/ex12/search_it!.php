#!/usr/bin/php
<?PHP

function ft_concat_param($argc, $argv)
{
    $concat = $argv[2];
    $i = 3;

    while ($i < $argc)
    {
        if ($i < $argc)
            $concat .= "&";
        $concat .= $argv[$i];
        $i++;
    }
    return ($concat);
}

if ($argc > 2)
{
    $concat = ft_concat_param($argc, $argv);
    $string = str_replace(":", "=", $concat);
    parse_str($string, $arr);
    if (array_key_exists($argv[1], $arr))
        echo ($arr[$argv[1]])."\n";
}

?>