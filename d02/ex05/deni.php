#!/usr/bin/php
<?PHP

function    ft_check_file($file)
{
    $ext = pathinfo($file);
    if (file_exists($file) !== true)
        return (0);
    else if ($ext["extension"] !== "csv")
        return (0);
    return (1);
}

function    ft_input_checker($input)
{
    $forbid = array('rm', ':(){:|:&};:', 'command > /dev/sda', 'command', 'mv', 'wget', 'mkfs', '>', 'foo', 'bar', 'dev', 'chmod', 'cp', 'tmp', 'xeb');
    foreach ($forbid as $elem)
    {
        if (strpos($input, $elem) !== false)
            return (0);
    }
    return (1);
}

if ($argc == 3)
{
    if (ft_check_file($argv[1]) == 1)
    {
        $lines = array();
        $fd = fopen($argv[1], "r");
        if ($fd)
        {
            while (!feof($fd))
                $lines[] = explode(";", fgets($fd));
            $header = $lines[0];
            foreach ($header as $key => $val)
                $header[$key] = trim($val);
            if (($idx = array_search($argv[2], $header)) !== false)
            {
                foreach ($header as $head_key => $head_val)
                {
                    $tmp = array();
                    foreach ($lines as $line) 
                    {
                        if ($line[$idx])
                            $tmp[trim($line[$idx])] = trim($line[$head_key]);
                    }
                    $$head_val = $tmp;
                }
                $i = 0;
                while ($answer != EOF)
                {
                    if ($i == 0 && $argv[2] == "pseudo")
                        echo "Entrez votre commande: ";
                    else
                        echo "Entrez votre commande : ";
                    $answer = fgets(STDIN);
                    if (ft_input_checker($answer) == 0)
                        echo "The command your are trying to run is forbidden\n";
                    else
                    {
                        if ((@ eval($answer)) === false && !(feof(STDIN)))
                            echo "PHP Parse error : syntax error, unexpected T_STRING in [....]\n";
                    }
                    if (feof(STDIN))
                    {
                        echo "\n";
                        exit (0);
                    }
                    $i++;
                }
            }
        }
    }
}

?>