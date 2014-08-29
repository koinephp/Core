<?php

namespace KoineTests;

use Koine\ArrayReference;
use PHPUnit_Framework_TestCase;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class ArrayReferenceTest extends PHPUnit_Framework_TestCase
{
    protected $object;
    protected $array;

    public function setUp()
    {
        $this->array = array('name' => 'Jon', 'lastname' => 'Doe');

        $this->object = new ArrayReference($this->array);
    }

    /**
     * @test
     */
    public function canBeForeached()
    {
        $string = '';

        foreach ($this->object as $key  => $value) {
            $string .= $key . ' ' . $value . ' ';
        }

        foreach ($this->object as $value) {
            $string .= $value . ' ';
        }

        $this->assertEquals('name Jon lastname Doe Jon Doe ', $string);
    }

    /**
     * @test
     */
    public function offsetSet()
    {
        $this->object->offsetSet('foo', 'bar');
        $this->assertEquals('bar', $this->object->offsetGet('foo'));

        $array = array();
        $object = new ArrayReference($array);

        $object[] = 1;
        $this->assertEquals(array(0 => 1), $object->toArray());
    }

    /**
     * @test
     */
    public function offsetExists()
    {
        $this->assertTrue($this->object->offsetExists('name'));
        $this->assertFalse($this->object->offsetExists('undefined'));
    }

    /**
     * @test
     */
    public function offsetUnset()
    {
        $this->object->offsetUnset('name');
        $this->assertFalse($this->object->offsetExists('name'));
    }

    /**
     * @test
     */
    public function offsetGet()
    {
        $this->assertEquals('Jon', $this->object->offsetGet('name'));
        $this->assertEquals('Doe', $this->object->offsetGet('lastname'));
        $this->assertNull($this->object->offsetGet('undefined'));
    }

    /**
     * @test
     */
    public function countTheNumberOfElements()
    {
        $this->assertEquals(2, $this->object->count());
    }

     /**
      * @test
      */
     public function whenTheObjectIsChangedTheArrayIsAlsoChanged()
     {
         $this->object->offsetUnset('lastname');
         $this->assertEquals(array('name' => 'Jon'), $this->array);

         unset($this->object['name']);
         $this->assertEquals(array(), $this->array);

         $this->array['foo'] = 'bar';
         $this->assertEquals(array('foo' => 'bar'), $this->object->toArray());
         $this->object->offsetUnset('foo');

         $this->object['user'] = array('name' => 'Jon');

         $this->assertEquals(
             array('user' => array('name' => 'Jon')),
             $this->array
         );
     }
}
