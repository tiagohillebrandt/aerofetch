# AeroFetch

AeroFetch is a PHP library for retrieving airport and airline details.

| Dataset  | Last Updated | Source                                                                     |
|----------|--------------|----------------------------------------------------------------------------|
| Airports | 2025-02-26   | [OurAirports](https://ourairports.com/data/)                               |
| Airlines | 2025-02-27   | [IATA](https://www.iata.org/en/about/members/airline-list/) (web scraping) |

## Airports

Retrieve airport information by IATA code.

```php
<?php
use THSCD\AeroFetch\Services\AirportService;

// Retrieve airport information by IATA code.
$airport = AirportService::get('GRU');

// Output the airport object.
print_r($airport);

// Output the airport information using the object properties.
echo sprintf(
    '%s (%s) is located in %s, %s (%s)',
    $airport->iataCode,
    $airport->name,
    $airport->municipality,
    $airport->country->name,
    $airport->continent
);
```

Result:

```php
THSCD\AeroFetch\Models\Airport Object
(
    [name:protected] => Guarulhos - Governador André Franco Montoro International Airport
    [iataCode:protected] => GRU
    [icaoCode:protected] => SBGR
    [continent:protected] => South America
    [country:protected] => THSCD\AeroFetch\Models\Country Object
        (
            [name:protected] => Brazil
            [alpha2Code:protected] => BR
            [alpha3Code:protected] => BRA
            [numericCode:protected] => 076
        )

    [region:protected] => BR-SP
    [municipality:protected] => São Paulo
    [latitude:protected] => -23.431944
    [longitude:protected] => -46.467778
)

GRU (Guarulhos - Governador André Franco Montoro International Airport) is located in São Paulo, Brazil (South America)
```

## Airlines

Only airlines that are currently [IATA members](https://www.iata.org/en/about/members/airline-list/) are supported.

```php
<?php
use THSCD\AeroFetch\Services\AirlineService;

// Retrieve airline information by IATA designator.
$airline = AirlineService::get('AD');

// Output the airline object.
print_r($airline);
```

Result:

```php
THSCD\AeroFetch\Models\Airline Object
(
    [name:protected] => Azul Brazilian Airlines
    [iataCode:protected] => AD
    [icaoCode:protected] => AZU
    [threeDigitCode:protected] => 577
    [country:protected] => THSCD\AeroFetch\Models\Country Object
        (
            [name:protected] => Brazil
            [alpha2Code:protected] => BR
            [alpha3Code:protected] => BRA
            [numericCode:protected] => 076
        )
)
```
