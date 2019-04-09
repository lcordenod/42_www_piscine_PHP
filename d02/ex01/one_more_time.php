#!/usr/bin/php
<?PHP

function ft_count_bissec($years)
{
    $start = 72;
    $count = 0;

    while ($start <= $years)
    {
        $start += 4;
        $count++;
    }
    if (($years % 72) % 4 == 0 || $years == 72)
        $count--;
    return ($count);
}

function ft_check_feb($year, $month, $day)
{
    if (($year % 72) % 4 == 0 || $year == 72)
    {
        if ($month == 1)
        {
            if ($day > 29)
                return (0);
        }
    }
    else if ($month == 1)
    {
        if ($day > 28)
            return (0);
    }
    return (1);
}

function ft_check_month($year, $month, $day)
{
    if ($month == 3)
    {
        if ($day > 30)
        {
            return (0);
        }
    }
    else if ($month == 5)
    {
        if ($day > 30)
            return (0);
    }
    else if ($month == 8)
    {
        if ($day > 30)
            return (0);
    }
    else if ($month == 10)
    {
        if ($day > 30)
            return (0);
    }
    else if (!$month)
        return (0);
    return (1);
}

if ($argc > 1)
{
    setlocale(LC_TIME, "fr_FR");
    $reg_check = preg_match("(\w*\s[0-9]*\s.*\s[0-9]*[\w+]\s[0-9]*:[0-9]*:[0-9]*)", $argv[1]);
    $tab = strptime($argv[1], "%A %d %B %Y %H:%M:%S");
    if ($tab['tm_sec'] > 59)
    {
        echo "Wrong Format\n";
        exit (0);
    }
    if ($reg_check == 1 && $tab !== 0 && (ft_check_month($tab['tm_year'], $tab['tm_mon'], $tab['tm_mday']) !== 0) && (ft_check_feb($tab['tm_year'], $tab['tm_mon'], $tab['tm_mday']) !== 0))
    {
        $res = (($tab['tm_year'] - 70) *  365 + (ft_count_bissec($tab['tm_year']))) * 86400
             + (($tab['tm_yday']) * 86400)
             + (($tab['tm_hour'] - 1) * 3600)
             + ($tab['tm_min'] * 60) + ($tab['tm_sec']);
        echo "$res\n";
    }
    else
    {
        echo "Wrong Format\n";
    }
}

?>