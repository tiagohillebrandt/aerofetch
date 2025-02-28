<?php

namespace THSCD\AeroFetch\Models;

/**
 * The Airline Model.
 *
 * @since 1.0.0
 */
class Airline extends AbstractModel
{
    /**
     * The airline name.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $name;

    /**
     * The IATA code.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $iataCode;

    /**
     * The ICAO code.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $icaoCode;

    /**
     * The three-digit code.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $threeDigitCode;

    /**
     * The country.
     *
     * @since 1.0.0
     *
     * @var Country|string|null
     */
    protected $country;
}
