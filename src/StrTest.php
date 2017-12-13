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
        $this->assertSame(Str::on('my_string')->camelCase()->toString(), 'myString'); // true
        $this->assertSame(Str::on('myString')->camelCase()->toString(), 'myString'); // true
        $this->assertSame(Str::on('my-string')->camelCase()->toString(), 'myString'); // true
        $this->assertSame(Str::on('my string')->camelCase()->toString(), 'myString'); // true
        $this->assertSame(Str::on('My String')->camelCase()->toString(), 'myString'); // true
    }

    public function testExo3()
    {
        $this->assertSame(Str::on('my_string')->snakeCase()->toString(), 'my_string'); // true
        $this->assertSame(Str::on('myString')->snakeCase()->toString(), 'my_string'); // true
        $this->assertSame(Str::on('my-string')->snakeCase()->toString(), 'my_string'); // true
        $this->assertSame(Str::on('my string')->snakeCase()->toString(), 'my_string'); // true
        $this->assertSame(Str::on('My String')->snakeCase()->toString(), 'my_string'); // true
    }

    public function testExo4()
    {
        $this->assertSame(Str::on('my_string')->slugCase()->toString(), 'my-string'); // true
        $this->assertSame(Str::on('myString')->slugCase()->toString(), 'my-string'); // true
        $this->assertSame(Str::on('my-string')->slugCase()->toString(), 'my-string'); // true
        $this->assertSame(Str::on('my string')->slugCase()->toString(), 'my-string'); // true
        $this->assertSame(Str::on('My String')->slugCase()->toString(), 'my-string'); // true
    }

    public function testExo5()
    {
        $this->assertSame(Str::on('my_string')->studlyCase()->toString(), 'MyString'); // true
        $this->assertSame(Str::on('myString')->studlyCase()->toString(), 'MyString'); // true
        $this->assertSame(Str::on('my-string')->studlyCase()->toString(), 'MyString'); // true
        $this->assertSame(Str::on('my string')->studlyCase()->toString(), 'MyString'); // true
        $this->assertSame(Str::on('My String')->studlyCase()->toString(), 'MyString'); // true
    }

    public function testExo6()
    {
        $str = Str::on('mY StrIng');
        $this->assertSame($str->camelCase()->toString(), 'myString'); // true
//        $this->assertSame($str->snakeCase()->toString(), 'my_string'); // true
//        $this->assertSame($str->studlyCase()->toString(), 'MyString'); // true
//        $this->assertSame($str->titleCase()->toString(), 'MyString'); // true
//        $this->assertSame($str->slugCase()->toString(), 'my-string'); // true
//        $this->assertSame($str->kebabCase()->toString(), 'my-string'); // true
//        $this->assertSame($str->toString(), 'mY StrIng'); // true
//        $this->assertSame((string)$str, 'mY StrIng'); // true
    }

}