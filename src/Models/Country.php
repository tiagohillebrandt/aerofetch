<?php

namespace THSCD\AeroFetch\Models;

/**
 * The Country Model.
 *
 * @since 1.0.0
 */
class Country extends AbstractModel
{
    /**
     * The country name.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $name;

    /**
     * The alpha-2 code.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $alpha2Code;

    /**
     * The alpha-3 code.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $alpha3Code;

    /**
     * The numeric code.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $numericCode;
}
