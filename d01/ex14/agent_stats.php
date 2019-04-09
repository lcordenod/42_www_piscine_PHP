#!/usr/bin/php
<?PHP

function    ft_return_col($head, $var)
{
    $i = 0;

    while ($i < count($head))
    {
        if (trim(strtolower($head[$i]) == $var))
            return ($i);
        $i++;
    }
    return (-1);
}

function    ft_moyenne($stats)
{
    $i = 0;
    $sum = 0;
    foreach ($stats as $stat)
    {
        if ($stat['Corr'] !== "moulinette")
        {
            $i++;
            $sum += $stat['Mark'];
        }
    }
    $ret = $sum / $i;
    echo ($ret)."\n";
}

function    ft_moyenne_user($stats, $usrs)
{
    $users = array_unique($usrs);
    sort($users);
    $result = array();
    foreach ($users as $user)
    {
        $i = 0;
        $sum = 0;
        $mouli_mark = 0;
        foreach ($stats as $stat)
        {
            if ($stat['User'] == $user && $stat['Corr'] !== "moulinette")
            {
                $i++;
                $sum += $stat['Mark'];
            }
            else if ($stat['User'] == $user && $stat['Corr'] == "moulinette")
                $mouli_mark = $stat['Mark'];
        }
        $result[] = array(
            'User' => $user,
            'Avg' => $sum / $i,
            'Ecart' => $sum / $i - $mouli_mark
        );
    }
    return ($result);
}

if ($argc == 2)
{
    $start = 2;
    $i = 1;
    $marks = array();
    $corrs = array();
    $usrs = array();
    $fd = fopen("php://stdin", "r");
    $stats = [];
    while (($row = fgets($fd)) !== false) 
    {
        if (!is_string($row))
        {   
            fclose($fd);
            exit (0);
        }
        if ($i == 1)
            $header = explode(";", $row);
        $mark_idx = ft_return_col($header, "note");
        $corr_idx = ft_return_col($header, "noteur");
        $usr_idx = ft_return_col($header, "user");
        if($i >= $start)
        {
            $tab = explode(";", $row);
            $usrs[] = ($tab[$usr_idx]);
            if (is_numeric($tab[$mark_idx]))
            {
                $stats[] = array(
                    'User' => $tab[$usr_idx],
                    'Mark' => $tab[$mark_idx],
                    'Corr' => $tab[$corr_idx]
                );
            }
        }
        $i++;
    }

    if ($argv[1] == trim(strtolower("moyenne")))
        ft_moyenne($stats);
    else if ($argv[1] == trim(strtolower("moyenne_user")))
    {
        $ret = ft_moyenne_user($stats, $usrs);
        foreach ($ret as $elem)
        {
            echo ($elem['User']).":".($elem['Avg'])."\n";
        }
    }
    else if ($argv[1] == trim(strtolower("ecart_moulinette")))
    {
        $ret = ft_moyenne_user($stats, $usrs);
        foreach ($ret as $elem)
        {
            echo ($elem['User']).":".($elem['Ecart'])."\n";
        }
    }
    fclose($fd);
}


?>