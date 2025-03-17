# AeroFetch

AeroFetch is a powerful yet lightweight **PHP library** designed to seamlessly retrieve **airport, airline, and aircraft details** without requiring an external database or API.

- **⚡ Fast & Efficient** – Data is stored in optimized **CSV files**, enabling quick lookups without unnecessary overhead.
- **📅 Regular Updates** – Stay up-to-date with the latest **airport, airline, and aircraft information**, thanks to frequent data refreshes.
- **🔗 Easy Integration** – Simple API methods allow effortless retrieval of details using **IATA/ICAO codes, country, or name**.

# Installation

You can easily install AeroFetch using Composer:

```
composer require tiagohillebrandt/aerofetch
```

That's it! Once installed, you can start retrieving airport and airline details with ease. 🚀

# Documentation
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
    $airport->name,
    $airport->iataCode,
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
    [timezone:protected] => America/Sao_Paulo
)

Guarulhos - Governador André Franco Montoro International Airport (GRU) is located in São Paulo, Brazil (South America)
```

### Retrieving all airports by country code

You can find the list of ISO 3166-1 alpha-2 country codes [here](https://www.iban.com/country-codes).

```php
<?php
use THSCD\AeroFetch\Services\AirportService;

// Retrieve airline information by ISO 3166-1 alpha-2 country code.
$airports = AirportService::getBy('country', 'US'); // United States.
```

### Retrieving all airports by continent

```php
$airports = AirportService::getBy('continent', 'Europe');
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

### Retrieving all airlines by country code

You can find the list of ISO 3166-1 alpha-2 country codes [here](https://www.iban.com/country-codes).

```php
<?php
use THSCD\AeroFetch\Services\AirlineService;

// Retrieve airline information by ISO 3166-1 alpha-2 country code.
$airlines = AirlineService::getBy('country', 'BR'); // Brazil.
```

## Aircrafts

Retrieve aircraft information by IATA code.

```php
<?php
use THSCD\AeroFetch\Services\AircraftService;

// Retrieve aircraft information by IATA code.
$aircraft = AircraftService::get('E90');
print_r($aircraft);
```

Result:

```php
Array
(
    [0] => THSCD\AeroFetch\Models\Aircraft Object
        (
            [manufacturer:protected] => Embraer
            [model:protected] => Embraer 190
            [type:protected] => Passenger Aircraft
            [iataCode:protected] => E90
            [icaoCode:protected] => E190
        )
    [1] => THSCD\AeroFetch\Models\Aircraft Object
        (
            [manufacturer:protected] => Embraer
            [model:protected] => Embraer Lineage 1000
            [type:protected] => Passenger Aircraft
            [iataCode:protected] => E90
            [icaoCode:protected] => E190
        )
)
```

### Retrieving aircraft by ICAO code

```php
<?php
use THSCD\AeroFetch\Services\AircraftService;

// Retrieve aircraft information by ICAO code.
$aircraft = AircraftService::getBy('icaoCode', 'B38M');
print_r($aircraft);
```

Result:

```php
Array
(
    [0] => THSCD\AeroFetch\Models\Aircraft Object
        (
            [manufacturer:protected] => Boeing
            [model:protected] => Boeing 737 MAX 8
            [type:protected] => Passenger Aircraft
            [iataCode:protected] => 7M8
            [icaoCode:protected] => B38M
        )
)
```

### Retrieving all aircrafts by manufacturer

```php
<?php
use THSCD\AeroFetch\Services\AircraftService;

// Retrieve all aircraft by manufacturer.
$aircraft = AircraftService::getBy('manufacturer', 'Airbus');
```

# Datasets

Datasets used by AeroFetch for airport and airline information:

| Dataset       | Last Updated | Source                                                                                                                                               |
|---------------|--------------|------------------------------------------------------------------------------------------------------------------------------------------------------|
| airports.csv  | 2025-03-16   | [OurAirports](https://ourairports.com/data/) + [timezonefinder](https://pypi.org/project/timezonefinder/) to determine the timezone for each airport |
| airlines.csv  | 2025-03-16   | [IATA Airline List](https://www.iata.org/en/about/members/airline-list/) (via web scraping)                                                          |
| aircraft.csv  | 2025-03-17   | -                                                                                                                                                    |
