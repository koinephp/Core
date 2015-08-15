<?php

namespace Koine;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class KoineString extends Object
{

    protected $content;

    /**
     * @param string $string
     */
    public function __construct($string = '')
    {
        $this->content = (string) $string;
    }

    /**
     * Append text to the string
     * @param string $string
     */
    public function append($string)
    {
        $this->content .= $string;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->content;
    }

    /**
     * To Upper Case
     * @return String
     */
    public function toUpperCase()
    {
        return new KoineString(mb_strtoupper($this, 'UTF-8'));
    }

    /**
     * To Lower Case
     * @return self
     */
    public function toLowerCase()
    {
        return new KoineString(mb_strtolower($this, 'UTF-8'));
    }

    /**
     * String to parameter
     *
     * @param string separator
     * @return self
     */
    public function parameterize($separator = '-')
    {
        $forbiddenChars = "/[^$separator,a-z]/";

        return $this->toLowerCase()
            ->gsub('/\s+/', $separator)
            ->gsub($forbiddenChars, '');
    }

    /**
     * Replace string
     *
     * @param string $pattern string regexp or string
     * @return String
     */
    public function gsub($pattern, $replacement)
    {
        $pattern = new KoineString($pattern);

        if ($pattern->isRegexp()) {
            return new KoineString(preg_replace($pattern, $replacement, $this));
        } else {
            return new KoineString(str_replace($pattern, $replacement, $this));
        }
    }

    /**
     * Checks if string is a Regular Expression.
     *
     * If param is not given, the considered string is the object itself.
     *
     * @param  string $string defaults to null
     * @return bool
     */
    protected function isRegexp($string = null)
    {
        if ($string === null) {
            $string = $this;
        }

        return preg_match('/\/.*\//', $string);
    }

    /**
     * Splits the string
     * @param string separator
     * @return Hash[KoineString]
     */
    public function split($separator)
    {
        $hash = new Hash(explode((string) $separator, (string) $this));

        return $hash->map(
            function ($value) {
                return new KoineString($value);
            }
        );
    }

    /**
     * Get the number of chars
     * @return int
     */
    public function count()
    {
        return mb_strlen((string) $this, 'UTF-8');
    }

    /**
     * Get the number of chars
     * @return int
     */
    public function length()
    {
        return $this->count();
    }

    /**
     * Returns part of a string
     * Known bug in php 5.3.3
     * @see https://bugs.php.net/bug.php?id=62703
     *
     * @param integer start
     * @param  integer      $length the length of the string from the starting point
     * @return KoineString
     */
    public function at($start = null, $length = null)
    {
        return new KoineString(mb_substr((string) $this, $start, $length, 'UTF-8'));
    }

    /**
     * Removes leading and trailing spaces
     * @return String
     */
    public function trim()
    {
        return new KoineString(trim((string) $this));
    }
}
