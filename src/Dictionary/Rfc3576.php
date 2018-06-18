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

final class Rfc3576 implements DictionaryInterface
{
    const SERVICE_TYPE_AUTHORIZE_ONLY = 17;
    const ERROR_CAUSE_RESIDUAL_CONTEXT_REMOVED = 201;
    const ERROR_CAUSE_INVALID_EAP_PACKET = 202;
    const ERROR_CAUSE_UNSUPPORTED_ATTRIBUTE = 401;
    const ERROR_CAUSE_MISSING_ATTRIBUTE = 402;
    const ERROR_CAUSE_NAS_IDENTIFICATION_MISMATCH = 403;
    const ERROR_CAUSE_INVALID_REQUEST = 404;
    const ERROR_CAUSE_UNSUPPORTED_SERVICE = 405;
    const ERROR_CAUSE_UNSUPPORTED_EXTENSION = 406;
    const ERROR_CAUSE_ADMINISTRATIVELY_PROHIBITED = 501;
    const ERROR_CAUSE_PROXY_REQUEST_NOT_ROUTABLE = 502;
    const ERROR_CAUSE_SESSION_CONTEXT_NOT_FOUND = 503;
    const ERROR_CAUSE_SESSION_CONTEXT_NOT_REMOVABLE = 504;
    const ERROR_CAUSE_PROXY_PROCESSING_ERROR = 505;
    const ERROR_CAUSE_RESOURCES_UNAVAILABLE = 506;
    const ERROR_CAUSE_REQUEST_INITIATED = 507;

    /**
     * @var array[]
     */
    private static $attributes = [
        [
            'encoder' => [
                'class' => Attributes\IntegerAttribute::class,
                'options' => [
                ],
            ],
            'has_tag' => false,
            'name' => 'Error-Cause',
            'type' => 101,
            'vendor' => null,
        ],
    ];

    /**
     * @var array[]
     */
    private static $vendors = [
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
