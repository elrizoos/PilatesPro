<?php

return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'line_length' => 90,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setFinder(
       Finder::create()->in(__DIR__)
    );