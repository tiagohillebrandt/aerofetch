<?php

namespace THSCD\AeroFetch\Services;

use THSCD\AeroFetch\Models\Airline;

/**
 * The Airline Service.
 *
 * @since {VERSION}
 */
class AirlineService
{
    /**
     * The list of airlines.
     *
     * @since {VERSION}
     *
     * @var array
     */
    private static array $airlines = [];

    /**
     * Load airlines information from CSV file and cache them in memory.
     *
     * @since {VERSION}
     *
     * @return void
     */
    private static function load()
    {
        if (!empty(self::$airlines)) {
            return;
        }

        $airlines = array_map(
            function ($line) {
                return str_getcsv($line, ';');
            },
            file(__DIR__ . '/../../data/airlines.csv')
        );

        foreach ($airlines as $airline) {
            if ($airline[0] === 'airline') {
                continue;
            }

            $model = self::build($airline);

            self::$airlines[$model->iataCode] = $model;
        }
    }

    /**
     * Build an airline model.
     *
     * @since {VERSION}
     *
     * @param array $airline The airline data.
     *
     * @return Airline
     */
    private static function build(array $airline): Airline
    {
        $model = new Airline();

        $model->name           = $airline[0];
        $model->iataCode       = $airline[1];
        $model->icaoCode       = $airline[3];
        $model->threeDigitCode = $airline[2];
        $model->country        = $airline[4];

        return $model;
    }

    /**
     * Get an airline by IATA code.
     *
     * @since {VERSION}
     *
     * @param string $iataCode The IATA code.
     *
     * @return Airline|null
     */
    public static function get(string $iataCode)
    {
        self::load();

        $airline = null;

        if (!empty(self::$airlines[$iataCode] )) {
            $airline = self::$airlines[$iataCode];

            $airline->country = CountryService::getByName($airline->country) ?? $airline->country;
        }

        return $airline;
    }

    /**
     * Get an airline by a specific field.
     *
     * @since {VERSION}
     *
     * @param string $field The field to search by.
     * @param mixed  $value The value to search for.
     *
     * @return Airline|array|null
     */
    public static function getBy(string $field, string $value)
    {
        self::load();

        $airlines = array_filter(self::$airlines, fn($airline) => $airline->$field === $value) ?: null;

        if (is_array($airlines)) {
            foreach ($airlines as $airline) {
                $airline->country = CountryService::getByName($airline->country) ?? $airline->country;
            }
        }

        return is_array($airlines) && count($airlines) === 1
            ? current($airlines)
            : $airlines;
    }
}
