<?PHP

function ft_is_sort($tab)
{
    $i = 0;

    while ($i < count($tab) - 1)
    {
            if ($tab[$i] > $tab[$i + 1])
                return (0);
        $i++;
    }
    return (1);
}

?>