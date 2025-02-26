<?php

namespace THSCD\AeroFetch\Models;

/**
 * The Airport Model.
 *
 * @since {VERSION}
 */
class Airport extends AbstractModel
{
    /**
     * The airport name.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $name;

    /**
     * The airport IATA code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $iataCode;

    /**
     * The airport ICAO code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $icaoCode;

    /**
     * The airport continent.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $continent;

    /**
     * The airport country.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $country;

    /**
     * The airport region.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $region;

    /**
     * The airport municipality.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $municipality;

    /**
     * The airport latitude.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $latitude;

    /**
     * The airport longitude.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $longitude;
}
