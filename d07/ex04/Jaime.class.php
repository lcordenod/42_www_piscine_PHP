<?PHP

class Jaime extends Lannister {
    public function sleepWith($character) {
        if ($character instanceof Tyrion)
            print("Not even if I'm drunk !". PHP_EOL);
        else if ($character instanceof Sansa)
            print("Let's do this.". PHP_EOL);
        else if ($character instanceof Cersei)
            print("With pleasure, but only in a tower in Winterfell, then.". PHP_EOL);
    }
}

?>