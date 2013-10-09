<?php

namespace HexArch;

/**
 * Class Message
 * @package HexArch
 * @author Carlos Buenosvinos (hi@©arlos.io)
 */
abstract class Message
{
    /**
     * Values dictionary
     * @var array
     */
    protected $values;

    /**
     * @param array $values
     */
    public function __construct($values = array())
    {
        $this->values = $values;
    }

    /**
     * Return true if this message
     *
     * @param $name
     * @return bool
     */
    public function hasValue($name)
    {
        return isset($this->values[$name]);
    }

    /**
     * Set new value for specific name
     *
     * @param string $name
     * @param mixed  $value
     * @return $this
     */
    public function setValue($name, $value)
    {
        $this->values[$name] = $value;

        return $this;
    }

    /**
     * Return the value for a specific name
     *
     * @param $name
     * @param  null $defaultValue
     * @return null
     */
    public function getValue($name, $defaultValue = null)
    {
        return $this->hasValue($name) ? $this->values[$name] : $defaultValue;
    }

    /**
     * Return all values dictionary
     *
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }
}
