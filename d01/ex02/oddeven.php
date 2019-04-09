#!/usr/bin/php
<?PHP

$answer = 1;

while ($answer != EOF)
{
    echo "Entrez un nombre: ";
    $answer = fgets(STDIN);
    $answer = trim($answer);
    if (is_numeric($answer))
    {
        if ($answer % 2 == 0)
            echo "Le chiffre $answer est Pair\n";
        else
            echo "Le chiffre $answer est Impair\n";
    }
    else if (feof(STDIN))
    {
        echo "\n";
        exit (0);
    }
    else
        echo "'$answer' n'est pas un chiffre\n";
}

?>