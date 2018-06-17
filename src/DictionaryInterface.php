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

interface DictionaryInterface
{
    /**
     * @return array[]
     */
    public function getAttributes();

    /**
     * @return array[]
     */
    public function getVendors();
}
