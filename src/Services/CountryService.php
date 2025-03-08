<?php

namespace THSCD\AeroFetch\Services;

use Exception;
use League\ISO3166\ISO3166;
use THSCD\AeroFetch\Factories\CountryFactory;
use THSCD\AeroFetch\Models\Country;

/**
 * The Country Service.
 *
 * @since 1.0.0
 */
class CountryService
{
    /**
     * The singleton instance.
     *
     * @since {VERSION}
     *
     * @var CountryService|null
     */
    private static ?self $instance = null;

    /**
     * The ISO3166 instance.
     *
     * @since {VERSION}
     *
     * @var ISO3166
     */
    private ISO3166 $iso3166;

    /**
     * CountryService constructor.
     *
     * @since {VERSION}
     *
     * @param ISO3166 $iso3166 The ISO3166 instance.
     */
    private function __construct(ISO3166 $iso3166)
    {
        $this->iso3166 = $iso3166;
    }

    /**
     * Get the singleton instance.
     *
     * @since {VERSION}
     *
     * @return CountryService
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self(new ISO3166());
        }

        return self::$instance;
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
            $countryData = self::getInstance()->iso3166->alpha2($alpha2Code);

            return CountryFactory::build($countryData);
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
            $countryData = self::getInstance()->iso3166->name($name);

            return CountryFactory::build($countryData);
        } catch (Exception $e) {
        }

        return null;
    }
}
