<?php

namespace App\Generator;

class RandomStringGenerator
{
    private int $stringLength;

    public function __construct(int $stringLength)
    {
        $this->stringLength = $stringLength;
    }

    public function generate(): string
    {
        $posibleCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';

        for ($i = 0; $i < $this->stringLength; $i++) {
            $randomString .= $posibleCharacters[rand(0, strlen($posibleCharacters) - 1)];
        }

        return $randomString;
    }
}