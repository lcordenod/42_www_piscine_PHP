<?PHP

abstract class Fighter {
    public $fighter;

    public function __construct($input) {
        $this->fighter = $input;
    }

    abstract public function fight($target);
    
    public function getFighterType() {
        return($this->fighter);
    }
}

?>