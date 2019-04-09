<?PHP

class NightsWatch implements IFighter {
    private $_fighters = array();

    public function recruit($character) {
        if ($character instanceof IFighter)
            $this->_fighters[] = $character;
    }

    public function fight() {
        foreach ($this->_fighters as $fighter)
        {
            if (method_exists(get_class($fighter), "fight"))
                $fighter->fight();
        }
    }
}

?>