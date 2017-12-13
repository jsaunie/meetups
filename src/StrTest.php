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
        $this->assertTrue(Str::on('my_string')->camelCase()->toString() === 'myString'); // true
        $this->assertTrue(Str::on('myString')->camelCase()->toString() === 'myString'); // true
        $this->assertTrue(Str::on('my-string')->camelCase()->toString() === 'myString'); // true
        $this->assertTrue(Str::on('my string')->camelCase()->toString() === 'myString'); // true
        $this->assertTrue(Str::on('My String')->camelCase()->toString() === 'myString'); // true
    }

    public function testExo3(){
        $this->assertTrue(Str::on('my_string')->snakeCase()->toString() === 'my_string'); // true
        $this->assertTrue(Str::on('myString')->snakeCase()->toString() === 'my_string'); // true
        $this->assertTrue(Str::on('my-string')->snakeCase()->toString() === 'my_string'); // true
        $this->assertTrue(Str::on('my string')->snakeCase()->toString() === 'my_string'); // true
        $this->assertTrue(Str::on('My String')->snakeCase()->toString() === 'my_string'); // true
    }

}