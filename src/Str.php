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

    public static function on($string): self
    {
        return new self($string);
    }

    public static function checkIf(string $string): self
    {
        return self::on($string);
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

    public function trim($search): self
    {
        return $this->build(trim($this->string, $search));
    }

    public function replace($search, $replace): self
    {
        return $this->build(str_replace($search, $replace, $this->string));
    }

    private function pregReplace(string $expression, string $replace): self
    {
        return $this->build(preg_replace($expression, $replace, $this->string));
    }

    // --------------------------

    public function camelCase()
    {
        return $this->studlyCase()->lcfirst();
    }

    public function snakeCase(): self
    {
        return $this->pregReplace('/\s[A-Z]/', '$0')
            ->lowerCase()
            ->replace('s', '_s')
            ->replace([' ', '-', '__'], '_');
    }

    public function slugCase(): self
    {
        /* Regex source https://stackoverflow.com/questions/2955251/php-function-to-make-slug-url-string */
        return $this->pregReplace('/~[^\pL\d]+~u/', '-')// replace non letter or digits by -
        ->pregReplace('/~[^-\w]+~/', '')// remove unwanted characters
        ->trim('-')// trim
        ->pregReplace('/~-+~/', '-')// remove duplicate -
        ->lowerCase()
            ->replace([' ', '_', '--'], '-');
    }

    public function kebabCase(): self
    {
        return $this->slugCase();
    }

    public function studlyCase(): self
    {
        return $this->pregReplace('/(\s)([A-Z])/', '$0')
            ->lowerCase()
            ->replace(['_', '-'], ' ')
            ->ucwords()
            ->replace('s', 'S')
            ->replace(' ', '');
    }

    public function titleCase(): self
    {
        return $this->studlyCase();
    }

    // -------------------------

    private function build(string $string): self
    {
        return new self($string);
    }

    public function toString(): string
    {
        return (string)$this->string;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public static function __callStatic($name, $arguments)
    {
        if (!strpos('to', $name) === 0) {
            throw new Exception("Cette méthode n'existe pas");
        }
        $methodName = (string)self::on($name)->replace('to', '')->lcfirst()->toString();
        return (string)self::on($arguments[0])->{$methodName}();
    }

    public function __get(string $name)
    {
        return (string)$this->{$name}();
    }

    public function __invoke()
    {
        return $this->toString();
    }

}

