<?PHP

require_once('Color.class.php');

class Vertex {
    static public $verbose = FALSE;
    private $_x;
    private $_y;
    private $_z;
    private $_w = 1.0;
    private $_color = FALSE;

    public function __construct(array $kwargs) {
        if ($kwargs['y'] !== NULL && $kwargs['z'] !== NULL && $kwargs['x'] !== NULL)
        {
            $this->_x = $kwargs['x'];
            $this->_y = $kwargs['y'];
            $this->_z = $kwargs['z'];
        }
        if ($kwargs['w'])
            $this->_w = $kwargs['w'];
        if (($kwargs['color']) !== NULL && $kwargs['color'] instanceof Color) {
                $this->_color = $kwargs['color'];
        }
        else if ($kwargs['color'] instanceof Color)
        {
            $this->_color = $kwargs['color'];
        }
        else
            $this->_color = new Color (array ('red' => 255, 'green' => 255, 'blue' => 255));
        if (self::$verbose === TRUE)
            printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed" . PHP_EOL , $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
        return;
    }

    public function __destruct()
        {
            if (self::$verbose)
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed" . PHP_EOL , $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
        }

    public function getX() {
        return ($this->_x);
    }

    public function getY() {
        return ($this->_y);
    }

    public function getZ() {
        return ($this->_z);
    }

    public function getW() {
        return ($this->_w);
    }

    public function getColor() {
        return ($this->_color);
    }

    public function setX($x) {
        $this->_x =  $x;
    }

    public function setY($y) {
        $this->_y =  $y;
    }

    public function setZ($z) {
        $this->_z =  $z;
    }

    public function setW($w) {
        $this->_w =  $w;
    }

    public function setColor($color) {
        $this->_color =  $color;
    }

    public function __toString()
    {
        if (self::$verbose)
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
        else
            return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
    }

    public static function doc() {
        return (file_get_contents('Vertex.doc.txt') . PHP_EOL );
    }

}

?>