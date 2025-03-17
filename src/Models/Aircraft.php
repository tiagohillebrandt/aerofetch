<?php

namespace THSCD\AeroFetch\Models;

/**
 * The Aircraft Model.
 *
 * @since 1.3.0
 */
class Aircraft extends AbstractModel
{
    /**
     * The aircraft manufacturer.
     *
     * @since 1.3.0
     *
     * @var string
     */
    protected string $manufacturer;

    /**
     * The aircraft model.
     *
     * @since 1.3.0
     *
     * @var string
     */
    protected string $model;

    /**
     * The aircraft type.
     *
     * @since 1.3.0
     *
     * @var string
     */
    protected string $type;

    /**
     * The aircraft IATA code.
     *
     * @since 1.3.0
     *
     * @var string
     */
    protected string $iataCode;

    /**
     * The aircraft ICAO code.
     *
     * @since 1.3.0
     *
     * @var string
     */
    protected string $icaoCode;
}
