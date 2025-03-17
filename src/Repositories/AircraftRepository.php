<?php
namespace THSCD\AeroFetch\Repositories;

use THSCD\AeroFetch\Factories\AircraftFactory;
use THSCD\AeroFetch\Models\Aircraft;

/**
 * The Aircraft Repository.
 *
 * @since {VERSION}
 */
class AircraftRepository
{
    /**
     * The aircraft.
     *
     * @since {VERSION}
     *
     * @var array
     */
    private array $aircraft = [];

    /**
     * The aircraft factory.
     *
     * @since {VERSION}
     *
     * @var AircraftFactory
     */
    private AircraftFactory $factory;

    /**
     * AircraftRepository constructor.
     *
     * @since {VERSION}
     *
     * @param AircraftFactory $factory The aircraft factory.
     */
    public function __construct(AircraftFactory $factory)
    {
        $this->factory = $factory;

        $this->load();
    }

    /**
     * Load $aircraft information from CSV file and cache them in memory.
     *
     * @since {VERSION}
     *
     * @return void
     */
    private function load()
    {
        // If the aircraft are already loaded, skip the loading process.
        if (!empty($this->aircraft)) {
            return;
        }

        $file = fopen(__DIR__ . '/../../data/aircraft.csv', 'r');

        while (($data = fgetcsv($file)) !== false) {
            $this->aircraft[] = $this->factory->build([
                'manufacturer' => $data[0],
                'model'        => $data[1],
                'type'         => $data[2],
                'iata'         => $data[3],
                'icao'         => $data[4],
            ]);
        }

        fclose($file);
    }

    /**
     * Get an aircraft by its IATA code.
     *
     * @since {VERSION}
     *
     * @param string $iataCode The IATA code.
     *
     * @return array|null
     */
    public function get(string $iataCode): ?array
    {
        $planes = [];

        foreach ($this->aircraft as $aircraft) {
            if ($aircraft->iataCode === $iataCode) {
                $planes[] = $aircraft;
            }
        }

        return ! empty( $planes ) ? $planes : null;
    }

    /**
     * Get aircraft by a specific field.
     *
     * @since {VERSION}
     *
     * @param string $field The field to search by.
     * @param string $value The value to search for.
     *
     * @return array|null
     */
    public function getBy(string $field, string $value): ?array
    {
        $planes = [];

        foreach ($this->aircraft as $aircraft) {
            if ($aircraft->$field === $value) {
                $planes[] = $aircraft;
            }
        }

        return ! empty( $planes ) ? $planes : null;
    }
}
