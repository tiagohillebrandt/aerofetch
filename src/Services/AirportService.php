<?php

namespace THSCD\AeroFetch\Services;

use THSCD\AeroFetch\Helpers\Continent;
use THSCD\AeroFetch\Models\Airport;
use THSCD\AeroFetch\Models\Country;

/**
 * The Airport Service.
 *
 * @since {VERSION}
 */
class AirportService
{
    /**
     * The list of airports.
     *
     * @since {VERSION}
     *
     * @var array
     */
    private static array $airports = [];

    /**
     * Load airports information from CSV file and cache them in memory.
     *
     * @since {VERSION}
     *
     * @return void
     */
    private static function load()
    {
        if (!empty(self::$airports)) {
            return;
        }

        $airports = array_map('str_getcsv', file(__DIR__ . '/../../data/airports.csv'));

        foreach ($airports as $airport) {
            if ($airport[0] === 'id') {
                continue;
            }

            $model = self::build($airport);

            self::$airports[$model->iataCode] = $model;
        }
    }

    /**
     * Build an airport model.
     *
     * @since {VERSION}
     *
     * @param array $airport The airport data.
     *
     * @return Airport
     */
    private static function build(array $airport): Airport
    {
        $model = new Airport();

        $model->iataCode     = $airport[13];
        $model->icaoCode     = $airport[1];
        $model->name         = $airport[3];
        $model->continent    = Continent::getName($airport[7]);
        $model->region       = $airport[9];
        $model->municipality = $airport[10];
        $model->latitude     = $airport[4];
        $model->longitude    = $airport[5];

        // Loads the Country object.
        $model->country = CountryService::get($airport[8]) ?? $airport[8];

        return $model;
    }

    /**
     * Get an airport by IATA code.
     *
     * @since {VERSION}
     *
     * @param string|null $iataCode The IATA code.
     *
     * @return Airport|array
     */
    public static function get(string $iataCode = null)
    {
        self::load();

        if (is_string($iataCode)) {
            return self::$airports[$iataCode] ?? null;
        }

        return self::$airports;
    }

    /**
     * Get airports by field value.
     *
     * @since {VERSION}
     *
     * @param string $field The field name.
     * @param mixed  $value The field value.
     *
     * @return array
     */
    public static function getBy($field, $value)
    {
        self::load();

        $airports = array_filter(
            self::$airports,
            fn($airport) => ($airport->$field instanceof Country ? $airport->$field->alpha2Code : $airport->$field) === $value
        ) ?: null;

        return is_array($airports) && count($airports) === 1
            ? $airports[0]
            : $airports;
    }
}
