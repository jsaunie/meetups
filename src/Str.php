<?php

namespace Strings;


use PHPUnit\Runner\Exception;

class Str
{
    private $string;

    public function __construct($string)
    {
        $this->string = (string)$string;
    }

    public static function on(string $string): self
    {
        return new self($string);
    }

    public function ucwords(): self
    {
        return $this->build(ucwords($this->string));
    }

    public function lcfirst(): self
    {
        return $this->build(lcfirst($this->string));
    }

    public function lowerCase(): self
    {
        return $this->build(strtolower($this->string));
    }

    public function replace($search, string $replace): self
    {
        return $this->build(str_replace($search, $replace, $this->string));
    }

    private function tolower(): self
    {
        return $this->build(strtolower($this->string));
    }

    private function pregReplace(string $expression, string $replace): self
    {
        return $this->build(preg_replace($expression, $replace, $this->string));
    }

    // --------------------------

    public function camelCase(): self
    {
        return $this->pregReplace('/(\s)([A-Z])/', '$0')
            ->tolower()
            ->replace(['-','_'], ' ')
            ->replace('s', 'S')
            ->ucwords()
            ->replace(' ', '')
            ->lcfirst();
    }

    public function snakeCase(): self
    {
        return $this->pregReplace('/\s[A-Z]/', '$0')
            ->tolower()
            ->replace('s', '_s')
            ->replace([' ', '-', '__'], '_');
    }

    public function slugCase(): self
    {
        return $this->pregReplace('/\s[A-Z]/', '-$0')
            ->tolower()
            ->replace([' ', '_', '--'], '-')
            ->lowerCase();
    }

    public function kebabCase(): self
    {
        return $this->pregReplace('/\s[A-Z]/', '-$0')
            ->tolower()
            ->replace([' ', '_', '--'], '-')
            ->lowerCase();
    }

    public function studlyCase(): self
    {
        return $this->pregReplace('/(?<!\s)([A-Z])/', '$0')
            ->tolower()
            ->replace(['_', '-'], ' ')
            ->ucwords()
            ->replace('s', 'S')
            ->replace(' ', '');
    }

    public function titleCase(): self
    {
        return $this->pregReplace('/(?<!\s)([A-Z])/', '$0')
            ->tolower()
            ->replace(['_', '-'], ' ')
            ->ucwords()
            ->replace(' ', '');
    }

    // -------------------------

    private function build(string $string): self
    {
        return new self($string);
    }

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

    public function __get(string $method)
    {
        return (string)$this->{$method}()->toString();
    }

    public function __invoke()
    {
        return $this->string;
    }

}

