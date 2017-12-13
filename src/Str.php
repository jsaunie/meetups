<?php

namespace Strings;


use PHPUnit\Runner\Exception;

class Str
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public static function on(string $string): self
    {
        return new self($string);
    }

    public function ucwords(): self
    {
        return new Str(ucwords($this->string));
    }

    public function lcfirst(): self
    {
        return new Str(lcfirst($this->string));
    }

    public function lowerCase(): self
    {
        return new Str(strtolower($this->string));
    }

    public function replace(string $search, string $replace): self
    {
        return new Str(str_replace($search, $replace, $this->string));
    }

    // --------------------------

    public function camelCase(): self
    {
        $str = new Str(preg_replace('/(\s)([A-Z])/', '$0', strtolower($this->string)));
        $string = $str->replace('_', ' ')
            ->replace('-', ' ')
            ->replace('s', 'S')
            ->ucwords()
            ->replace(' ', '')
            ->lcfirst();
        return new Str($string);
    }

    public function snakeCase(): self
    {
        $str = new Str(preg_replace('/\s[A-Z]/', '$0', strtolower($this->string)));
        $string = $str
            ->replace('s', '_s')
            ->replace(' ', '_')
            ->replace('-', '_')
            ->replace('__', '_');
        return new Str($string);
    }

    public function slugCase(): self
    {
        $str = new Str(preg_replace('/\s[A-Z]/', '-$0', $this->string));
        $string = $str->lowerCase()
            ->replace(' ', '-')
            ->replace('_', '-')
            ->replace('--', '-')
            ->lowerCase();
        return new Str($string);
    }

    public function studlyCase(): self
    {
        $str = new Str(preg_replace('/(?<!\s)([A-Z])/', '$0', strtolower($this->string)));
        $string = $str->replace('_', ' ')
            ->replace('-', ' ')
            ->ucwords()
            ->replace('s', 'S')
            ->replace(' ', '');
        return new Str($string);
    }

    public function titleCase(): self
    {
        $str = new Str(preg_replace('/(?<!\s)([A-Z])/', '$0', strtolower($this->string)));
        $string = $str->replace('_', ' ')
            ->replace('-', ' ')
            ->ucwords()
            ->replace(' ', '');
        return new Str($string);
    }

    // -------------------------

    public function toString(): string
    {
        return $this->string;
    }

    public function __toString(): string
    {
        return $this->string;
    }

    public static function __callStatic($name, $arguments)
    {
        if (!strpos('to', $name) === 0) {
            throw new Exception("Cette méthode n'existe pas");
        }
        $methodName = lcfirst(self::on($name)->replace('to', ''));
        return (string)self::on($arguments[0])->{$methodName}();
    }

}

