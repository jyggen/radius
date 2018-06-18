<?php

/*
 * This file is part of boo/radius.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\Radius\Dictionary;

use Boo\Radius\Attributes;
use Boo\Radius\DictionaryInterface;

final class Rfc4679 implements DictionaryInterface
{
    /**
     * @var array[]
     */
    private static $attributes = [
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'ADSL-Forum-DHCP-Vendor-Specific',
            'type' => 255,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'ADSL-Forum-Device-Manufacturer-OUI',
            'type' => 255,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'ADSL-Forum-Device-Serial-Number',
            'type' => 255,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\StringAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'ADSL-Forum-Device-Product-Class',
            'type' => 255,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'ADSL-Forum-Gateway-Manufacturer-OUI',
            'type' => 255,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'ADSL-Agent-Circuit-Id',
            'type' => 1,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'ADSL-Agent-Remote-Id',
            'type' => 2,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Actual-Data-Rate-Upstream',
            'type' => 129,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Actual-Data-Rate-Downstream',
            'type' => 130,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Minimum-Data-Rate-Upstream',
            'type' => 131,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Minimum-Data-Rate-Downstream',
            'type' => 132,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Attainable-Data-Rate-Upstream',
            'type' => 133,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Attainable-Data-Rate-Downstream',
            'type' => 134,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Maximum-Data-Rate-Upstream',
            'type' => 135,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Maximum-Data-Rate-Downstream',
            'type' => 136,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Minimum-Data-Rate-Upstream-Low-Power',
            'type' => 137,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Minimum-Data-Rate-Downstream-Low-Power',
            'type' => 138,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Maximum-Interleaving-Delay-Upstream',
            'type' => 139,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Actual-Interleaving-Delay-Upstream',
            'type' => 140,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Maximum-Interleaving-Delay-Downstream',
            'type' => 141,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Actual-Interleaving-Delay-Downstream',
            'type' => 142,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Access-Loop-Encapsulation',
            'type' => 144,
            'vendor' => 3561,
        ],
        [
            'encoder' => [
                'class' => Attributes\OctetsAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'IWF-Session',
            'type' => 254,
            'vendor' => 3561,
        ],
    ];

    /**
     * @var array[]
     */
    private static $vendors = [
        [
           'identifier' => 3561,
           'name' => 'ADSL-Forum',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return self::$attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function getVendors()
    {
        return self::$vendors;
    }
}
