<?php

namespace THSCD\AeroFetch\Models;

/**
 * The Aircraft Model.
 *
 * @since {VERSION}
 */
class Aircraft extends AbstractModel
{
    /**
     * The aircraft manufacturer.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $manufacturer;

    /**
     * The aircraft model.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $model;

    /**
     * The aircraft type.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $type;

    /**
     * The aircraft IATA code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $iataCode;

    /**
     * The aircraft ICAO code.
     *
     * @since {VERSION}
     *
     * @var string
     */
    protected string $icaoCode;
}
