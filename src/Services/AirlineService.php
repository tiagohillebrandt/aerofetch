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
        if (empty(self::$airlines)) {
            self::load();
        }

        return self::$airlines[ $iataCode ] ?? null;
    }
}
