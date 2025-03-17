<?php

namespace THSCD\AeroFetch\Factories;

use THSCD\AeroFetch\Models\Aircraft;

/**
 * The Aircraft Factory.
 *
 * @since 1.3.0
 */
class AircraftFactory
{
    /**
     * Build an aircraft model.
     *
     * @since 1.3.0
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
