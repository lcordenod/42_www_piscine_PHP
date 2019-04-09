<?PHP

function    ft_create_account($login, $hashed_pw)
{
    $dir = "../private";
    $file = "passwd";
    $path = $dir."/".$file;
    if (file_exists($dir) !== true)
        mkdir($dir);
    if (file_exists($path) !== true)
    {
        $account[] = array(
            'login' => $login,
            'passwd' => $hashed_pw,
        );
        $account_ser[] = serialize($account);
        file_put_contents($path, $account_ser);
        echo "OK\n";
    }
    else if ($account = unserialize(file_get_contents($path)))
    {
        foreach ($account as $user)
        {
            if ($user['login'] == $_POST['login'])
            {
                echo "ERROR\n";
                exit (0);
            }
        }
        $account[] = array(
            'login' => $login,
            'passwd' => $hashed_pw,
        );
        $account_unser[] = $account;
        $account_ser[] = serialize($account);
        file_put_contents($path, $account_ser);
        echo "OK\n";
    }
}

if ($_POST['submit'] == "OK" && $_POST['login'] != NULL && $_POST['passwd'] != NULL)
{
    $login = $_POST['login'];
    $hashed_pw = hash("whirlpool", $_POST['passwd']);
    ft_create_account($login, $hashed_pw);
}
else
    echo "ERROR\n";
    
?>