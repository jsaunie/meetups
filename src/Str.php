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

    public function lowerCase(): self
    {
        $this->string = strtolower($this->string);
        return $this;
    }

    public function replace(string $search, string $replace): self
    {
        $this->string = str_replace($search, $replace, $this->string);
        return $this;
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
        $this->string = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $this->string));
        $this->replace(' ', '_')
            ->replace('__', '_')
            ->replace('-', '_')
            ->lowerCase();
        return $this;
    }

    public function slugCase(): self
    {
        $this->string = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $this->string));
        $this->replace(' ', '-')
            ->replace('_', '-')
            ->replace('--', '-')
            ->lowerCase();
        return $this;
    }

    public function studlyCase(): self
    {
        $this->string = strtolower(preg_replace('/[A-Z]/', ' $0', $this->string));
        $this->replace('_', ' ')
            ->replace('-', ' ')
            ->ucwords()
            ->replace(' ', '');
        return $this;
    }

    public function titleCase(): self{
        $this->studlyCase();
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


}

