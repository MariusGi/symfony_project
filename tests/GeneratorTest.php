<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Generator\RandomStringGenerator;

class GeneratorTest extends TestCase
{
    public function testRandomStringGenerator()
    {
        $generator = new RandomStringGenerator(10);
        $randomString = $generator->generate();
        $this->assertEquals(10, strlen($randomString));
    }
}
