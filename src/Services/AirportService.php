<?php

namespace THSCD\AeroFetch\Services;

use THSCD\AeroFetch\Models\Airport;
use THSCD\AeroFetch\Repositories\AirportRepository;

/**
 * The Airport Service.
 *
 * @since 1.0.0
 */
class AirportService
{
    /**
     * The airport repository.
     *
     * @since 1.1.0
     *
     * @var AirportRepository
     */
    private static AirportRepository $repository;

    /**
     * Get the repository.
     *
     * @since 1.1.0
     *
     * @return AirportRepository
     */
    private static function getRepository()
    {
        return self::$repository ??= new AirportRepository();
    }

    /**
     * Get an airport by IATA code.
     *
     * @since 1.0.0
     *
     * @param string $iataCode The IATA code.
     *
     * @return Airport|array
     */
    public static function get(string $iataCode)
    {
        return self::getRepository()->get($iataCode);
    }

    /**
     * Get airports by field value.
     *
     * @since 1.0.0
     *
     * @param string $field The field name.
     * @param string $value The field value.
     *
     * @return array
     */
    public static function getBy(string $field, string $value)
    {
        return self::getRepository()->getBy($field, $value);
    }
}
