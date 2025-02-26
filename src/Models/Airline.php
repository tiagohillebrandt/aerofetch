<?php

namespace THSCD\AeroFetch\Models;

/**
 * The Airline Model.
 *
 * @since {VERSION}
 */
class Airline extends AbstractModel
{
    /**
     * The airline name.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $name;

    /**
     * The IATA code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $iataCode;

    /**
     * The ICAO code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $icaoCode;

    /**
     * The three-digit code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $threeDigitCode;

    /**
     * The country.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $country;
}
