<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use App\Generator\RandomStringGenerator;
use App\Generator\RandomArrayGenerator;
use App\Converter\PatternConverter;
use App\Converter\Rot13Converter;

$containerBuilder = new ContainerBuilder();

$loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__ . '/config'));
$loader->load('services.yaml');

$containerBuilder->compile();

$randomStringGenerator = $containerBuilder->get(RandomStringGenerator::class);
$randomArrayGenerator = $containerBuilder->get(RandomArrayGenerator::class);
$patternConverter = $containerBuilder->get(PatternConverter::class);
$rot13Converter = $containerBuilder->get(Rot13Converter::class);

$generators = [$randomStringGenerator, $randomArrayGenerator];

foreach ($generators as $generator) {
    $generatedData = $generator->generate();
    $converter = (rand(0, 1) === 0) ? $patternConverter : $rot13Converter;

    if (is_array($generatedData)) {
        foreach ($generatedData as $data) {
            echo $converter->convert($data) . PHP_EOL;
        }
    } else {
        echo $converter->convert($generatedData) . PHP_EOL;
    }
}
