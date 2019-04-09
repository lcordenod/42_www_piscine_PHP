<?PHP

function ft_filter($var)
{
    return ($var !== NULL && $var !== FALSE && $var !== '');
}

function ft_split($string)
{
    $text = explode(' ', $string);
    $ret = array_filter($text, 'ft_filter');
    sort($ret);
    return ($ret);
}

?>