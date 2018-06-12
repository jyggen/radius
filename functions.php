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

/**
 * @param string $request
 * @param string $response
 * @param string $secret
 *
 * @return bool
 */
function is_authentic_response($request, $response, $secret)
{
    if ($secret === '' || strlen($response) < 20 || strlen($request) < 20) {
        return false;
    }

    $checksum = md5(implode('', [
        substr($response, 0, 4),
        substr($request, 4, 16),
        substr($response, 20),
        $secret,
    ]), true);

    return $checksum === substr($response, 4, 16);
}
