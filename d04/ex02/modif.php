<?PHP

function    ft_exit()
{
    echo "ERROR\n";
    exit (0);
}

function    ft_check_pw($hashed_oldpw, $hashed_newpw, $user)
{
    if ($user['passwd'] != $hashed_oldpw)
        return (0);
    else
        return (1);
}

function    ft_modify_account($login, $hashed_oldpw, $hashed_newpw)
{
    $dir = "../private";
    $file = "passwd";
    $path = $dir."/".$file;
    if (file_exists($dir) !== true || file_exists($path) !== true)
        echo "ERROR\n";
    else if ($account = unserialize(file_get_contents($path)))
    {
        foreach ($account as &$user)
        {
            if ($user['login'] == $_POST['login'])
            {
                if (ft_check_pw($hashed_oldpw, $hashed_newpw, $user))
                    $user['passwd'] = $hashed_newpw;
                else
                    ft_exit();
            }
            else
                ft_exit();
        }
        $account_ser[] = serialize($account);
        file_put_contents($path, $account_ser);
        echo "OK\n";
    }
}

if ($_POST['submit'] == "OK" && $_POST['login'] != NULL && $_POST['oldpw'] != NULL && $_POST['newpw'] != NULL)
{
    $login = $_POST['login'];
    $hashed_oldpw = hash("whirlpool", $_POST['oldpw']);
    $hashed_newpw = hash("whirlpool", $_POST['newpw']);
    ft_modify_account($login, $hashed_oldpw, $hashed_newpw);
}
else
    ft_exit();

?>