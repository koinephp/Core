<?php

namespace Dummy;

use Koine\KoineString;

class Object extends \Koine\Object
{
    public function exampleOne()
    {
        return 'example one';
    }

    public function exampleTwo($argument)
    {
        return 'argumets: ' . $argument;
    }

    public function exampleThree($a, $b = null, $c = null)
    {
        $string = new KoineString('argumets: a: ');
        $string->append($a)
            ->append(', b: ')
            ->append($b)
            ->append(', c: ')
            ->append($c);

        return $string->toString();
    }

    protected function protectedMethod()
    {
    }

    private function privateMethod()
    {
    }
}
