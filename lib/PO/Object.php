<?php

namespace PO;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
abstract class Object
{
    /**
     * Get the class name of the object
     * @return string
     */
    public function getClass()
    {
        return get_class($this);
    }

    /**
     * Object to string
     * @return string
     */
    public function toString()
    {
        return (string) $this;
    }

    /**
     * Alias to missingMethod()
     *
     * @see PO\Object::methodMissing()
     * @throws PO\NoMethodException
     */
    public function __call($method, $args)
    {
        return $this->methodMissing($method, $args);
    }

    /**
     * Method missing callback
     *
     * @throws PO\NoMethodException
     */
    public function methodMissing($method, $args)
    {
        $message = new String("Undefined method '");
        $message->append($method)->append("' for ")->append($this->getClass());

        throw new NoMethodException($message);
    }

}
