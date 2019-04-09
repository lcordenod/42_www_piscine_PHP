<?PHP

class Color {
    public $red = 0;
    public $green = 0;
    public $blue = 0;
    static $verbose = FALSE;

    public function __construct(array $kwargs) {
        if (array_key_exists('rgb', $kwargs))
        {
            $this->rgb = intval($kwargs['rgb']);
            $this->str = sprintf("%06X", $this->rgb);
            $this->red = hexdec(substr($this->str, 0, 2));
            $this->green = hexdec(substr($this->str, 2, 2));
            $this->blue = hexdec(substr($this->str, 4, 2));
        }
        else if ($kwargs['red'] !== NULL && $kwargs['green'] !== NULL && $kwargs['blue'] !== NULL)
        {
            foreach ($kwargs as $key => $val)
                $val = intval($val);
            $this->red = round($kwargs['red']);
            $this->green = round($kwargs['green']);
            $this->blue = round($kwargs['blue']);
        }
        if ($this->red < 0)
            $this->red = 0;
        if ($this->green < 0)
            $this->green = 0;
        if ($this->blue < 0)
            $this->blue = 0;
        if ($this->red > 255)
            $this->red = 255;
        if ($this->green > 255)
            $this->green = 255;
        if ($this->blue > 255)
            $this->blue = 255;
        if (self::$verbose === TRUE)
            printf("Color( red: %3d, green: %3d, blue: %3d ) constructed." . PHP_EOL , $this->red, $this->green, $this->blue);
        return;
    }

    public function __destruct() {
        if (self::$verbose === TRUE)
            printf("Color( red: %3d, green: %3d, blue: %3d ) destructed." . PHP_EOL , $this->red, $this->green, $this->blue);
        return;
    }

    public function add($color) {
        return (new Color(array( 'red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue)));
    }

    public function sub($color) {
        return (new Color(array( 'red' => $color - $this->red, 'green' => $color - $this->green, 'blue' => $color - $this->blue)));
    }

    public function mult($color) {
        return (new Color(array( 'red' => $color * $this->red, 'green' => $color * $this->green, 'blue' => $color * $this->blue)));
    }

    public function __toString() {
        return ("Color( red: ". sprintf("%3d", $this->red).", green: ". sprintf("%3d", $this->green).", blue: ". sprintf("%3d", $this->blue)." )");
    }

    public function doc() {
        return (file_get_contents('Color.doc.txt') . PHP_EOL );
    }
}

?>