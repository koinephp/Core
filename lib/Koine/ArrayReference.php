<?php

namespace Koine;

use ArrayAccess;
use Iterator;
use Countable;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class ArrayReference implements ArrayAccess, Iterator, Countable
{
    /**
     * @var array
     */
    protected $data;

    /**
     * The given array will be modified by this object
     * @param array $array The array you want to reference as an object
     */
    public function __construct(array &$array)
    {
        $this->data =& $array;
    }

    /**
     * Gets an element from the array
     * ArrayAccess implementation
     * @param  mixed   $key
     * @return boolean
     */
    public function offsetExists($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * Get an element of the array
     * ArrayAccess implementation
     * @param  mixed $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        if ($this->offsetExists($key)) {
            return $this->data[$key];
        }
    }

    /**
     * Sets the value
     * ArrayAccess implementation
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function offsetSet($key, $value)
    {
        if ($key !== null) {
            $this->data[$key] = $value;
        } else {
            $this->data[] = $value;
        }

        return $this;
    }

    /**
     * ArrayAccess implementation
     * @param  mixed $key
     * @return mixed
     */
    public function offsetUnset($key)
    {
        unset($this->data[$key]);

        return $this;
    }

    /**
     * Iterator implementation
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * Iterator implementation
     * @return mixed
     */
    public function next()
    {
        return next($this->data);
    }

    /**
     * Iterator implementation
     * @return mixed
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * Iterator implementation
     * @return self
     */
    public function rewind()
    {
        reset($this->data);

        return $this;
    }

    /**
     * Iterator implementation
     * @return boolean
     */
    public function valid()
    {
        $key = key($this->data);

        return ($key !== null && $key !== false);
    }

    /**
     * Get the number of elements
     * Countable implementation
     * @return int the number of elements
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->data;
    }
}
