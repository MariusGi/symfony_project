<?php

namespace App\Converter;

class Rot13Converter
{
    public function convert(string $string): string
    {
        return str_rot13($string);
    }
}
