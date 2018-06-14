<?php

/*
 * This file is part of boo/radius.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\Radius;

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$header = <<<'EOT'
This file is part of boo/radius.

(c) Jonas Stendahl <jonas@stendahl.me>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOT;

$finder = Finder::create();
$config = Config::create();
$rules = [
    '@Symfony' => true,
    '@Symfony:risky' => true,
    'array_syntax' => [
        'syntax' => 'short',
    ],
    'combine_consecutive_unsets' => true,
    'header_comment' => [
        'header' => $header,
    ],
    'heredoc_to_nowdoc' => true,
    'linebreak_after_opening_tag' => true,
    'no_multiline_whitespace_before_semicolons' => true,
    'no_php4_constructor' => true,
    'no_short_echo_tag' => true,
    'no_unreachable_default_argument_value' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'ordered_class_elements' => true,
    'ordered_imports' => true,
    'php_unit_strict' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_order' => true,
    'semicolon_after_instruction' => true,
    'strict_comparison' => true,
    'strict_param' => true,
];

$finder->in(__DIR__);
$finder->name('.php_cs');
$finder->name('generate');
$finder->ignoreDotFiles(false);

$config->setFinder($finder);
$config->setRiskyAllowed(true);
$config->setRules($rules);

return $config;
