<?php

namespace THSCD\AeroFetch\Factories;

use THSCD\AeroFetch\Models\Aircraft;

/**
 * The Aircraft Factory.
 *
 * @since {VERSION}
 */
class AircraftFactory
{
    /**
     * Build an aircraft model.
     *
     * @since {VERSION}
     *
     * @param array $aircraft The aircraft data.
     *
     * @return Aircraft
     */
    public function build(array $aircraft): Aircraft
    {
        $model = new Aircraft();

        $model->manufacturer = $aircraft['manufacturer'];
        $model->model        = $aircraft['model'];
        $model->type         = $aircraft['type'];
        $model->iataCode     = $aircraft['iata'];
        $model->icaoCode     = $aircraft['icao'];

        return $model;
    }
}
