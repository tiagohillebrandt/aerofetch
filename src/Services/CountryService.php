<?php

namespace THSCD\AeroFetch\Services;

use Exception;
use League\ISO3166\ISO3166;
use THSCD\AeroFetch\Models\Country;

/**
 * The Country Service.
 *
 * @since 1.0.0
 */
class CountryService
{
    /**
     * Build a country model.
     *
     * @since 1.0.0
     *
     * @param array $country The country data.
     *
     * @return Country
     */
    private static function build(array $country): Country
    {
        $model = new Country();

        $model->name        = $country['name'];
        $model->alpha2Code  = $country['alpha2'];
        $model->alpha3Code  = $country['alpha3'];
        $model->numericCode = $country['numeric'];

        return $model;
    }

    /**
     * Get a country by its alpha-2 code.
     *
     * @since 1.0.0
     *
     * @param string $alpha2Code The alpha-2 code.
     *
     * @return Country|null
     */
    public static function get(string $alpha2Code): ?Country
    {
        try {
            $countryData = (new ISO3166())->alpha2($alpha2Code);

            return self::build($countryData);
        } catch (Exception $e) {
        }

        return null;
    }

    /**
     * Get a country by its name.
     *
     * @since 1.0.0
     *
     * @param string $name The country name.
     *
     * @return Country|null
     */
    public static function getByName(string $name): ?Country
    {
        try {
            $countryData = (new ISO3166())->name($name);

            return self::build($countryData);
        } catch (Exception $e) {
        }

        return null;
    }
}
