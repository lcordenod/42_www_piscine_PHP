<?PHP

if (isset($_GET['action']))
{
    if ($_GET['action'] == "set" && isset($_GET['name']) && isset($_GET['value']))
        setcookie($_GET['name'], $_GET['value'], 0);
    else if ($_GET['action'] == "get")
    {
        if ($_COOKIE[$_GET['name']])
            echo $_COOKIE[$_GET['name']]."\n";
    }
    else if ($_GET['action'] == "del" && isset($_GET['name']))
        setcookie($_GET['name'], '', -1);
}

?>