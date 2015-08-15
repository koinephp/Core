<?php

namespace KoineTests;

use Koine\KoineString;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class KoineStringTest extends \PHPUnit_Framework_TestCase
{
    public function testItCanBeConvertedToString()
    {
        $string = new KoineString('hello');
        $this->assertEquals('hello world', $string . ' world');
    }

    public function testItCanAppendString()
    {
        $string = new KoineString();
        $string->append('abc')->append(new KoineString('de'));
        $this->assertEquals('abcde', (string) $string);
    }

    /**
     * Data Provider
     */
    public function caseProvider()
    {
        return array(
            array('abc', 'ABC'),
            array('saúdações', 'SAÚDAÇÕES'),
        );
    }

    /**
     * @dataProvider caseProvider
     */
    public function testToUppercase($lower, $upper)
    {
        $string = new KoineString($lower);
        $this->assertEquals($upper, $string->toUpperCase());
        $this->assertInstanceOf('Koine\KoineString', $string->toUpperCase());
    }

    /**
     * @dataProvider caseProvider
     */
    public function testToLowerCase($lower, $upper)
    {
        $string = new KoineString($upper);
        $this->assertEquals($lower, $string->toLowerCase());
        $this->assertInstanceOf('Koine\KoineString', $string->toLowerCase());
    }

    /**
     * Data Provider
     */
    public function parameterizedProvider()
    {
        return array(
            array('Foo Bar', 'foo-bar', '-'),
            array('Foo Bar', 'foo_bar', '_'),
            array('M!@#$%)ab C', 'mab-c', '-'),
        );
    }

    /**
     * @dataProvider parameterizedProvider
     */
    public function testParameterize($normal, $parameterized, $separator)
    {
        $string = new KoineString($normal);
        $this->assertEquals($parameterized, $string->parameterize($separator));
        $this->assertInstanceOf('Koine\KoineString', $string->toLowerCase());
    }

    /**
     * Data Provider
     */
    public function providerForGsub()
    {
        return array(
            array('abcdabc', 'a', 'A', 'AbcdAbc'),
            array('abcdabc', '/[ac]/', 'A', 'AbAdAbA'),
        );
    }

    /**
     * @dataProvider providerForGsub
     */
    public function testGsub($string, $find, $replacement, $expected)
    {
        $string = new KoineString($string);
        $result = $string->gsub($find, $replacement);
        $this->assertEquals($expected, $result);
        $this->assertInstanceOf('Koine\KoineString', $result);
    }

    public function testSplit()
    {
        $string   = new KoineString('a, b, c');
        $expected = array('a', 'b', 'c');
        $split    = $string->split(', ');
        $this->assertEquals($expected, $split->toArray());
        $this->assertInstanceOf('Koine\KoineString', $split->first());
    }

    public function countProvider()
    {
        return array(
            array('abc', 3),
            array('ÂçÇÉ', 4),
        );
    }

    /**
     * @dataProvider countProvider
     */
    public function testCount($string, $count)
    {
        $string = new KoineString($string);
        $this->assertEquals($count, $string->count());
    }

    public function atProvider()
    {
        return array(
            array('abcdef', 0, null, 'abcdef'),
            array('abcdef', 5, null, 'f'),
            array('abcdef', 1, 3,    'bcd'),
            array('não avião',  1, null, 'ão avião'),
            array('não avião',  1, 7, 'ão aviã'),
            array('não avião',  4, 5, 'avião'),
        );
    }

    /**
     * @dataProvider atProvider
     * @requires PHP 5.4
     */
    public function testAt($value, $start, $end, $expected)
    {
        $object = new KoineString($value);
        $result = $object->at($start, $end);

        $this->assertInstanceOf('Koine\KoineString', $result);
        $this->assertEquals($expected, (string) $result);
    }

    public function testTrim()
    {
        $object = new KoineString('  abc ');
        $this->assertEquals('abc', $object->trim()->toString());
    }
}
