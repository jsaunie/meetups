<?php

namespace Strings;

use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    public function testEssai()
    {
        $string = (string)Str::on('my_string')
            ->replace('_', ' ')
            ->ucwords()
            ->replace(' ', '')
            ->lcfirst();
        $this->assertSame('myString', $string);
    }

    public function testExo2()
    {
        $this->assertSame(Str::toCamelCase('my_string'), 'myString'); // true
        $this->assertSame(Str::toCamelCase('myString'), 'myString'); // true
        $this->assertSame(Str::toCamelCase('my-string'), 'myString'); // true
        $this->assertSame(Str::toCamelCase('my string'), 'myString'); // true
        $this->assertSame(Str::toCamelCase('My String'), 'myString'); // true
    }

    public function testExo3()
    {
        $this->assertSame(Str::toSnakeCase('my_string'), 'my_string'); // true
        $this->assertSame(Str::toSnakeCase('myString'), 'my_string'); // true
        $this->assertSame(Str::toSnakeCase('my-string'), 'my_string'); // true
        $this->assertSame(Str::toSnakeCase('my string'), 'my_string'); // true
        $this->assertSame(Str::toSnakeCase('My String'), 'my_string'); // true
    }

    public function testExo5()
    {
        $this->assertSame(Str::toStudlyCase('my_string'), 'MyString'); // true
        $this->assertSame(Str::toStudlyCase('myString'), 'MyString'); // true
        $this->assertSame(Str::toStudlyCase('my-string'), 'MyString'); // true
        $this->assertSame(Str::toStudlyCase('my string'), 'MyString'); // true
        $this->assertSame(Str::toStudlyCase('My String'), 'MyString'); // true
    }

    public function testExo6()
    {
        $str = Str::on('mY StrIng');
        $this->assertSame($str->camelCase()->toString(), 'myString'); // true
        $this->assertSame($str->snakeCase()->toString(), 'my_string'); // true
        $this->assertSame($str->studlyCase()->toString(), 'MyString'); // true
        $this->assertSame($str->titleCase()->toString(), 'MyString'); // true
        $this->assertSame($str->slugCase()->toString(), 'my-string'); // true
        $this->assertSame($str->kebabCase()->toString(), 'my-string'); // true
        $this->assertSame($str->toString(), 'mY StrIng'); // true
        $this->assertSame((string)$str, 'mY StrIng'); // true
    }

    public function testExo7(){
        $str = str('mY StrIng');
        $this->assertSame($str->camelCase, 'myString'); // true
        $this->assertSame($str->snakeCase, 'my_string'); // true
        $this->assertSame($str->studlyCase, 'MyString'); // true
        $this->assertSame($str->titleCase, 'MyString'); // true
        $this->assertSame($str->slugCase, 'my-string'); // true
        $this->assertSame($str->kebabCase, 'my-string'); // true
        $this->assertSame($str(), 'mY StrIng'); // true
    }

}