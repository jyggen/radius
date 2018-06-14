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

use Boo\Radius\DictionaryInterface;

final class Rfc5176 implements DictionaryInterface
{
    const VALUE_ERROR_CAUSE_INVALID_ATTRIBUTE_VALUE = 407;
    const VALUE_ERROR_CAUSE_MULTIPLE_SESSION_SELECTION_UNSUPPORTED = 508;

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return [
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getVendorAttributes()
    {
        return [
        ];
    }
}
