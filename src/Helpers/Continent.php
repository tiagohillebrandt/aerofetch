<?php

namespace THSCD\AeroFetch\Helpers;

/**
 * The Continent helper class.
 *
 * @since 1.0.0
 */
class Continent
{
    /**
     * The list of continents.
     *
     * @since 1.0.0
     *
     * @var array
     */
    const CONTINENTS = [
        'AF' => 'Africa',
        'AN' => 'Antarctica',
        'AS' => 'Asia',
        'EU' => 'Europe',
        'NA' => 'North America',
        'OC' => 'Oceania',
        'SA' => 'South America',
    ];

    /**
     * Get the continent name by code.
     *
     * @since 1.0.0
     *
     * @param string $code The continent code.
     *
     * @return string|null
     */
    public static function getName(string $code): ?string
    {
        return self::CONTINENTS[$code] ?? null;
    }
}
