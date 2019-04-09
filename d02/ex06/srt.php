#!/usr/bin/php
<?PHP

function    ft_parse_start_time($srt)
{
    $times = array();
    preg_match_all("/[0-9][0-9]:[0-9][0-9]:[0-9][0-9],[0-9][0-9][0-9] -->/", $srt, $matches, PREG_SET_ORDER);
    foreach ($matches as $time)
    {
        $str_time = implode($time);
        $times[] = str_replace(" -->", "", $str_time);
    }
    return ($times);
}

function    ft_parse_end_time($srt)
{
    $times = array();
    preg_match_all("/ --> [0-9][0-9]:[0-9][0-9]:[0-9][0-9],[0-9][0-9][0-9]/", $srt, $matches, PREG_SET_ORDER);
    foreach ($matches as $time)
    {
        $str_time = implode($time);
        $times[] = str_replace(" -->", "", $str_time);
    }
    return ($times);
}

function    ft_parse_txt($srt)
{
    $times = array();
    preg_match_all("/[\r\n][A-z|a-z]+/", $srt, $matches, PREG_SET_ORDER);
    foreach ($matches as $txt)
    {
        $str_txt = implode($txt);
        $txts[] = str_replace("\n", "", $str_txt);
    }
    return ($txts);
}

if ($argc == 2)
{
    if (file_exists($argv[1]))
    {
        $i = 1;
        $content = file_get_contents($argv[1]);
        $arr_st = ft_parse_start_time($content);
        $arr_ed = ft_parse_end_time($content);
        $arr_tx = ft_parse_txt($content);
        if (@ array_multisort($arr_st, $arr_ed, $arr_tx) !== false)
        {
            foreach ($arr_st as $elem)
            {
                echo $i."\n";
                echo $elem;
                echo " -->".$arr_ed[$i - 1]."\n";
                echo $arr_tx[$i - 1]."\n";
                if ($i < count($arr_st))
                    echo "\n";
                $i++;
            }
        }
    }
}

?>