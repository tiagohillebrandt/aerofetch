<?php

namespace THSCD\AeroFetch\Factories;

use THSCD\AeroFetch\Models\Country;

/**
 * The Country Factory.
 *
 * @since {VERSION}
 */
class CountryFactory
{
    /**
     * Build a country model.
     *
     * @since {VERSION}
     *
     * @param array $country The country data.
     *
     * @return Country
     */
    public static function build(array $country): Country
    {
        $model = new Country();

        $model->name        = $country['name'];
        $model->alpha2Code  = $country['alpha2'];
        $model->alpha3Code  = $country['alpha3'];
        $model->numericCode = $country['numeric'];

        return $model;
    }
}
