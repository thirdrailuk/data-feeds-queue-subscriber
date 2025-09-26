<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Whitespace\IndentationTypeFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([
        __DIR__ . '/src',
    ])
    ->withSets([
        \McArrowsmithPackages\EcsSets\SetList::MCARROWSMITH
    ])
    ->withRules([IndentationTypeFixer::class]);
