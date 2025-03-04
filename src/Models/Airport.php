<?php

namespace THSCD\AeroFetch\Models;

/**
 * The Airport Model.
 *
 * @since 1.0.0
 */
class Airport extends AbstractModel
{
    /**
     * The airport name.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $name;

    /**
     * The airport IATA code.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $iataCode;

    /**
     * The airport ICAO code.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $icaoCode;

    /**
     * The airport continent.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $continent;

    /**
     * The airport country.
     *
     * @since 1.0.0
     *
     * @var Country|string|null
     */
    protected $country;

    /**
     * The airport region.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $region;

    /**
     * The airport municipality.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $municipality;

    /**
     * The airport latitude.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $latitude;

    /**
     * The airport longitude.
     *
     * @since 1.0.0
     *
     * @var string
     */
    protected string $longitude;

    /**
     * The airport timezone.
     *
     * @since 1.1.0
     *
     * @var string
     */
    protected string $timezone;
}
