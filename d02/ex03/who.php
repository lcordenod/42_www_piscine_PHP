#!/usr/bin/php
<?PHP

function ft_strlen($str)
{
    $strlen = 0;

    while ($str[$strlen] != '')
        $strlen++;
    return ($strlen);
}

date_default_timezone_set("europe/paris");
$fd = fopen("/var/run/utmpx", "r");
fseek($fd, 1256);
$format = "a256user/a4id/a32c/ipid/itype/itime";
while (feof($fd) == FALSE)
{
    $content = fread($fd, 628);
    if (ft_strlen($content) == 628)
    {
        $content = unpack($format, $content);
        if ($content['type'] == 7)
        {
            echo trim($content['user']) . " ";
            echo trim($content['c']) . " ";
            echo trim($content['line']) . " ";
            $date = date("M d H:i", $content['time']);
            echo $date . " \n";
        }
    }
}
fclose ($fd);

?>