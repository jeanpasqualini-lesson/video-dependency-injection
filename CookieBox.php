<?php

/**
 * Class CookieBox
 */
class CookieBox
{
    /**
     * @var array the cookie collection
     */
    protected $cookieCollection;

    /**
     * @var int the count instance (incremented by new CookieBox)
     */
    protected static $countInstance;

    /**
     * CookieBox constructor.
     * @param array $cookieCollection
     */
    public function __construct(array $cookieCollection = array())
    {
        self::$countInstance++;

        // Remove all cookie with unique identified null
        $this->cookieCollection = array_filter($cookieCollection, function($cookieItem) {
           return null !== $cookieItem->getUniqueIdentifier();
        });
    }

    /**
     * Print the box with cookies to standard output
     */
    public function show()
    {
        $box =
             '---------------------------------------------------|'.PHP_EOL
            .'|           Box n° X                               |'.PHP_EOL
            .'---------------------------------------------------|'.PHP_EOL
        ;

        // If the no cookie show error
        if (empty($this->cookieCollection))
        {
            echo '!!! CETTE BOITE EST VIDE !!!';
        }

        echo str_replace('X', self::$countInstance, $box);

        // Show cookies
        foreach ($this->cookieCollection as $cookieItem) {
            $cookieItem->show();
        }
    }
}