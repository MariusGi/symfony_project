<?php

namespace App\Generator;

class RandomArrayGenerator
{
    private int $arraySize;
    private int $stringLength;

    public function __construct(int $arraySize, int $stringLength)
    {
        $this->arraySize = $arraySize;
        $this->stringLength = $stringLength;
    }

    public function generate(): array
    {
        $stringGenerator = new RandomStringGenerator($this->stringLength);
        $randomArray = [];

        for ($i = 0; $i < $this->arraySize; $i++) {
            $randomArray[] = $stringGenerator->generate();
        }

        return $randomArray;
    }
}
