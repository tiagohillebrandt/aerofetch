<?php

namespace THSCD\AeroFetch\Repositories;

use THSCD\AeroFetch\Factories\AirportFactory;
use THSCD\AeroFetch\Models\Airport;
use THSCD\AeroFetch\Models\Country;

/**
 * The Airport Repository.
 *
 * @since {VERSION}
 */
class AirportRepository
{
    /**
     * The airports.
     *
     * @since {VERSION}
     *
     * @var array
     */
    private array $airports = [];

    /**
     * AirportRepository constructor.
     *
     * @since {VERSION}
     */
    public function __construct()
    {
        $this->load();
    }

    /**
     * Load airports information from CSV file and cache them in memory.
     *
     * @since 1.0.0
     *
     * @return void
     */
    private function load()
    {
        if (!empty($this->airports)) {
            return;
        }

        $airports = array_map('str_getcsv', file(__DIR__ . '/../../data/airports.csv'));

        foreach ($airports as $airport) {
            if ($airport[0] === 'id') {
                continue;
            }

            $model = AirportFactory::build($airport);

            $this->airports[$model->iataCode] = $model;
        }
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
    public function get(string $iataCode): ?Airport
    {
        return $this->airports[$iataCode] ?? null;
    }

    /**
     * Get airports by field value.
     *
     * @since {VERSION}
     *
     * @param string $field The field to search by.
     * @param string $value The value to search for.
     *
     * @return array|null
     */
    public function getBy(string $field, string $value)
    {
        return array_filter(
            $this->airports,
            fn($airport) => ($airport->$field instanceof Country ? $airport->$field->alpha2Code : $airport->$field) === $value
        ) ?: null;
    }
}
