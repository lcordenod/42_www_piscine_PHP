#!/usr/bin/php
<?PHP

if ($argc >= 2)
{
    $str = preg_replace('/\s+/', ' ', $argv[1]);
    echo trim($str)."\n";
}

?>