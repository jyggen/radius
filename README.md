# RADIUS Client (PHP implementation)

[![Source Code][badge-source]][source]
[![Latest Version][badge-release]][release]
[![Software License][badge-license]][license]
[![Build Status][badge-build]][build]
[![Coverage Status][badge-coverage]][coverage]
[![Total Downloads][badge-downloads]][downloads]

boo/radius is a PHP 5.5+ RADIUS client implementation.

## Installation

The preferred method of installation is via [Packagist][] and [Composer][]. Run the following command to install the package and add it as a requirement to your project's `composer.json`:

```bash
composer require boo/radius
```

## Usage

```php
<?php

use Boo\Radius\Client;
use Boo\Radius\Packet;
use Boo\Radius\PacketType;

$client = new Client('udp://127.0.0.1:1812', /* timeout */ 2);
$response = $client->send(new Packet(PacketType::ACCESS_REQUEST(), /* secret */ 'xyzzy5461', [
    'User-Name' => 'nemo',
    'User-Password' => 'arctangent',
]));

if ($response->getType() !== PacketType::ACCESS_ACCEPT()) {
    throw new \RuntimeException('Unable to authenticate as user "nemo"');
}
```

## Dictionary

The following RADIUS dictionaries are supported out-of-the-box:

* MikroTik
* RFC 2865 (*)
* RFC 2866 (*)
* RFC 2867 (*)
* RFC 2868 (*)
* RFC 2869 (*)
* RFC 5176 (*)

Dictionaries that are enabled in the encoder by default are denoted with (*).

### Custom Dictionary

Additional attributes can be registered by creating a custom dictionary class that implements `Boo\Radius\DictionaryInterface`. 

## Copyright and License

The boo/radius library is copyright © [Jonas Stendahl](https://stendahl.me/) and licensed for use under the MIT License (MIT). Please see [LICENSE][] for more information.

[packagist]: https://packagist.org/packages/boo/radius
[composer]: http://getcomposer.org/

[badge-source]: https://img.shields.io/badge/source-boo/radius-blue.svg?style=flat-square
[badge-release]: https://img.shields.io/packagist/v/boo/radius.svg?style=flat-square
[badge-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[badge-build]: https://img.shields.io/travis/jyggen/radius/master.svg?style=flat-square
[badge-coverage]: https://img.shields.io/coveralls/jyggen/radius/master.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/boo/radius.svg?style=flat-square

[source]: https://github.com/jyggen/radius
[release]: https://packagist.org/packages/boo/radius
[license]: https://github.com/jyggen/radius/blob/master/LICENSE
[build]: https://travis-ci.org/jyggen/radius
[coverage]: https://coveralls.io/r/jyggen/radius?branch=master
[downloads]: https://packagist.org/packages/boo/radius
