# AeroFecth

## Airport

Retrieve airport information by IATA code.

```php
<?php
use THSCD\AeroFetch\Services\AirportService;

// Retrieve airport information by IATA code.
$airport = AirportService::get('GRU');

// Output the airport object.
var_dump($airport);

// Output the airport information using the object properties.
echo sprintf(
    '%s (%s) is located in %s, %s (%s)',
    $airport->iataCode,
    $airport->name,
    $airport->municipality,
    $airport->country,
    $airport->continent
);
```

Result:

```php
class THSCD\AeroFetch\Models\Airport#6358 (9) {
  protected string $name =>
  string(66) "Guarulhos - Governador André Franco Montoro International Airport"
  protected string $iataCode =>
  string(3) "GRU"
  protected string $icaoCode =>
  string(4) "SBGR"
  protected string $continent =>
  string(13) "South America"
  protected string $country =>
  string(2) "BR"
  protected string $region =>
  string(5) "BR-SP"
  protected string $municipality =>
  string(10) "São Paulo"
  protected string $latitude =>
  string(10) "-23.431944"
  protected string $longitude =>
  string(10) "-46.467778"
}

GRU (Guarulhos - Governador André Franco Montoro International Airport) is located in São Paulo, BR (South America)
```
