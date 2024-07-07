<?php

namespace App\Converter;

class PatternConverter
{
    public function convert(string $string): string
    {
        $result = [];

        foreach (str_split($string) as $stringChar) {
            if (is_numeric($stringChar)) {
                $result[] = $stringChar;
            } else {
                $result[] = ord($stringChar) % 32;
            }
        }

        return implode('/', $result);
    }
}