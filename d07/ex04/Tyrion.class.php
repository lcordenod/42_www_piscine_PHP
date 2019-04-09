<?PHP

class Tyrion extends Lannister {
    public function sleepWith($character) {
        if ($character instanceof Jaime)
            print("Not even if I'm drunk !". PHP_EOL);
        else if ($character instanceof Sansa)
            print("Let's do this.". PHP_EOL);
        else if ($character instanceof Cersei)
            print("Not even if I'm drunk !". PHP_EOL);
    }
}

?>