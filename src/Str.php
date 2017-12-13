<?php

namespace Strings;


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
        $this->string = ucwords($this->string);
        return $this;
    }

    public function lcfirst(): self
    {
        $this->string = lcfirst($this->string);
        return $this;
    }

    public function replace(string $search, string $replace): self
    {
        $this->string = str_replace($search, $replace, $this->string);
        return $this;
    }

    public function toString()
    {
        return $this->__toString();
    }

    public function __toString()
    {
        return $this->string;
    }

    public function camelCase(): self
    {
        $this->replace('_', ' ')
            ->replace('-', ' ')
            ->ucwords()
            ->replace(' ', '')
            ->lcfirst();
        return $this;
    }

    public function snakeCase(): self
    {
        $this->replace(' ', '_')->lowerCase();
    }

    public function lowerCase(){
        $this->string = strtolower($this->string);
    }

}

