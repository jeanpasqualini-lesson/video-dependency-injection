<?php

/**
 * Class Cookie
 */
class Cookie
{
    /**
     * @var string the unique idenfier of ressource
     */
    protected $uniqueIdentifier;

    /**
     * @var Colors
     */
    protected $colorizer;

    /**
     * @var int the count instance (incremented by new Cookie)
     */
    protected static $countInstance = 0;

    public function __construct(Colors $colorizer)
    {
        $this->colorizer = $colorizer;

        $this->uniqueIdentifier = $this->generateName();

        self::$countInstance++;
    }

    /**
     * Gets the unique identifier of instance
     *
     * @return int|string the unique identifier
     */
    public function getUniqueIdentifier()
    {
        return $this->uniqueIdentifier;
    }

    /**
     * Generate name for this cookie
     *
     * @return mixed|null
     */
    protected function generateName()
    {
        $names = array(
            'D A R K',
            'M I L K',
            'M M S',
            'O R E O',
            'D A I M',
        );

        return isset($names[self::$countInstance])
            ? $names[self::$countInstance]
            : null;
    }

    /**
     * Get color of the cookie
     *
     * Exemple,
     * array(
     *      'foreground' => 'black',
     *      'background' => white
     * );
     *
     * @return mixed
     */
    protected function getColors()
    {
        $colors = array(
            'D A R K' => array(
                'foreground' => 'black',
                'background' => null
            ),
            'M I L K' => array(
                'foreground' => 'dark_gray',
                'background' => null
            ),
            'M M S' => array(
                'foreground' => 'red',
                'background' => null
            ),
            'O R E O' => array(
                'foreground' => 'yellow',
                'background' => null
            ),
            'D A I M' => array(
                'foreground' => 'purple',
                'background' => null
            ),
        );

        return $colors[$this->getUniqueIdentifier()];
    }

    /**
     * Print the cookie to standard output
     */
    public function show()
    {
        $cookie = <<<EOL
      _.:::::._
     .:::'_|_':::.
    /::' --|-- '::\
   |:" .---"---. ':|
   |: ( - - - - ) :|
   |:: `-------' ::|
    \:::.......:::/
     ':::::::::::'
        `'"""'`
EOL;

        $colors = $this->getColors();

        echo $this->colorizer->getColoredString(
            str_replace('- - - -', $this->getUniqueIdentifier(), $cookie).PHP_EOL,
            $colors['foreground'],
            $colors['background']
        );

    }
}