<?php


/**
 * Factory one cookie
 *
 * @param Container $c
 * @return Cookie
 */
$cookieFactory = function(Container $c)
{
    return new Cookie($c['color']);
};

/**
 * Factory one box cookie
 *
 * @param Container $c
 * @return CookieBox
 */
$boxCookieFactory = function(Container $c)
{
    $cookieCollection = array();
    for ($i = 1; $i <= 5; $i++) {
        $cookieCollection[] = $c['cookie'];
    }

    return new CookieBox($cookieCollection);
};

/**
 * Factory one instance of Color
 *
 * @param Container $c
 * @return Colors
 */
$colorFactory = function(Container $c)
{
    return new Colors();
};

/**
 * Class Container
 */
class Container implements ArrayAccess
{
    /**
     * @var array collection of services
     */
    protected $services = array();

    /**
     * Is the service exist
     *
     * @param string $offset the service name
     */
    public function offsetExists($offset)
    {
        return isset($this->services[$offset]);
    }

    /**
     * @param string $offset the service name
     * @return Closure
     */
    public function offsetGet($offset)
    {
        return $this->services[$offset]($this);
    }

    /**
     * Set the service
     *
     * @param string $offset the service name
     * @param Closure $value
     */
    public function offsetSet($offset, $value)
    {
        $this->services[$offset] = $value;
    }

    /**
     * Remove the service
     *
     * @param string $offset the service name
     */
    public function offsetUnset($offset)
    {
        unset($this->services[$offset]);
    }

    /**
     * Create shared factory
     *
     * @param Closure $factory the service factory
     * @return Closure the shared factory
     */
    public function share($factory)
    {
        return function() use ($factory)
        {
            static $instance;

            if (null === $instance) {
                $instance = $factory($this);
            }

            return $instance;
        };
    }
}

// Instantiate container
$container = new Container();

// Declare services
$container['cookie'] = $cookieFactory;
$container['box_cookie'] = $container->share($boxCookieFactory);
$container['color'] = $container->share($colorFactory);

// Return container
return $container;