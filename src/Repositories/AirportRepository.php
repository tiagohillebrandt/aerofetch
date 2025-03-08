<?php

namespace THSCD\AeroFetch\Repositories;

use THSCD\AeroFetch\Factories\AirportFactory;
use THSCD\AeroFetch\Models\Airport;
use THSCD\AeroFetch\Models\Country;

/**
 * The Airport Repository.
 *
 * @since 1.1.0
 */
class AirportRepository
{
    /**
     * The airports.
     *
     * @since 1.1.0
     *
     * @var array
     */
    private array $airports = [];

    /**
     * The airport factory.
     *
     * @since 1.2.0
     *
     * @var AirportFactory
     */
    private AirportFactory $factory;

    /**
     * AirportRepository constructor.
     *
     * @since 1.1.0
     *
     * @param AirportFactory $factory The airport factory.
     */
    public function __construct(AirportFactory $factory)
    {
        $this->factory = $factory;

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
        // If the airports are already loaded, skip the loading process.
        if (!empty($this->airports)) {
            return;
        }

        // Load the airports from the CSV file.
        $airports = array_map('str_getcsv', file(__DIR__ . '/../../data/airports.csv'));

        foreach ($airports as $airport) {
            // Skip the header.
            if ($airport[0] === 'name') {
                continue;
            }

            // Build the model object.
            $model = $this->factory->build($airport);

            // Cache the model.
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
     * @since 1.1.0
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
