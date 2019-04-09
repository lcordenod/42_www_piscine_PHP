#!/usr/bin/php
<?PHP

function    ft_upcase($matches)
{
    return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
}

function        ft_upper($matches)
{
    $matches[0] = preg_replace_callback('/>[ \n\r\t]*(.*?)[ \n\r\t]*</', "ft_upcase", $matches[0]);
    $matches[0] = preg_replace_callback('/title="(.*?)"/i', "ft_upcase", $matches[0]);
    return ($matches[0]);
}

if ($argc > 1)
{
    if (file_exists($argv[1]))
    {
        $fd = fopen("$argv[1]", "r");
        while ($line = fgets($fd))
        {
            $html .= $line;
        }
        $title = preg_replace_callback('/title="(.*?)"/i', "ft_upcase", $html);
        $html = preg_replace_callback('/<a .*?<\/a>/si', 'ft_upper', $title);
        echo $html;
        fclose($fd);
    }
    else
        echo "No correct file entered\n";
}

?>