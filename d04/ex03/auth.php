<?PHP

function    ft_check_pw($user, $passwd)
{
    $hashed_pw = hash("whirlpool", $passwd);
    if ($user['passwd'] != $hashed_pw)
        return (0);
    else
        return (1);
}

function    auth($login, $passwd)
{
    $dir = "../private";
    $file = "passwd";
    $path = $dir."/".$file;
    if (file_exists($dir) !== true || file_exists($path) !== true)
        return (FALSE);
    else if ($account = unserialize(file_get_contents($path)))
    {
        foreach ($account as &$user)
        {
            if ($user['login'] == $login)
            {
                if (!ft_check_pw($user, $passwd))
                    return (FALSE);
            }
        }
    }
    return (TRUE);
}

?>