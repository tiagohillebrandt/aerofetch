<?php

namespace THSCD\AeroFetch\Models;

/**
 * The Country Model.
 *
 * @since {VERSION}
 */
class Country extends AbstractModel
{
    /**
     * The country name.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $name;

    /**
     * The alpha-2 code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $alpha2Code;

    /**
     * The alpha-3 code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $alpha3Code;

    /**
     * The numeric code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $numericCode;
}
