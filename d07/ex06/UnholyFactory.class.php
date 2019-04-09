<?PHP

class UnholyFactory {
    public $list = [];

    public function absorb($type) 
    {
        if ($type instanceof Fighter)
        {
            if (array_search($type->getFighterType(), $this->list) === FALSE && !$this->list[$type->getFighterType()])
            {
                $this->list[$type->getFighterType()] = $type;
                print("(Factory absorbed a fighter of type ".$type->getFighterType().")". PHP_EOL);
            }
            else
                print("(Factory already absorbed a fighter of type ".$type->getFighterType().")". PHP_EOL);
        }
        else
            print("(Factory can't absorb this, it's not a fighter)". PHP_EOL);
    }

    

    public function fabricate($fighter)
    {
        if (array_key_exists($fighter, $this->list))
        {
            print("(Factory fabricates a fighter of type ".$fighter.")". PHP_EOL);
            return (clone $this->list[$fighter]);
        }
            else
        {
            print("(Factory hasn't absorbed any fighter of type ".$fighter.")". PHP_EOL);
            return (NULL);
        }
    }
}

?>