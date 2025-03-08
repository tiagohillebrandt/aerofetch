<?php

namespace THSCD\AeroFetch\Repositories;

use THSCD\AeroFetch\Factories\AirlineFactory;
use THSCD\AeroFetch\Models\Airline;
use THSCD\AeroFetch\Models\Country;

/**
 * The Airline Repository.
 *
 * @since 1.1.0
 */
class AirlineRepository
{
    /**
     * The airlines.
     *
     * @since 1.1.0
     *
     * @var array
     */
    private array $airlines = [];

    /**
     * The airport factory.
     *
     * @since {VERSION}
     *
     * @var AirlineFactory
     */
    private AirlineFactory $factory;

    /**
     * AirlineRepository constructor.
     *
     * @since 1.1.0
     *
     * @param AirlineFactory $factory The airline factory.
     */
    public function __construct(AirlineFactory $factory)
    {
        $this->factory = $factory;

        $this->load();
    }

    /**
     * Load airlines information from CSV file and cache them in memory.
     *
     * @since 1.0.0
     *
     * @return void
     */
    private function load()
    {
        if (!empty($this->airlines)) {
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

            $model = $this->factory->build($airline);

            $this->airlines[$model->iataCode] = $model;
        }
    }

    /**
     * Get an airline by IATA code.
     *
     * @since 1.1.0
     *
     * @param string $iataCode The IATA code.
     *
     * @return Airline|null
     */
    public function get(string $iataCode): ?Airline
    {
        return $this->airlines[$iataCode] ?? null;
    }

    /**
     * Get airlines by a specific field.
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
            $this->airlines,
            fn($airline) => ($airline->$field instanceof Country ? $airline->$field->alpha2Code : $airline->$field) === $value
        ) ?: null;
    }
}
