<?PHP

function    clean($string)
{
    return (htmlentities($string));
}

function    escape($con, $string)
{
    return (mysqli_real_escape_string($con, $string));
}

?>