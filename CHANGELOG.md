# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.3.0] - 2025-03-17
### Added
- Added aircraft support. https://github.com/tiagohillebrandt/aerofetch/pull/15

## [1.2.1] - 2025-03-16
### Changed
- Refreshed the airport and airline datasets. https://github.com/tiagohillebrandt/aerofetch/pull/14

## [1.2.0] - 2025-03-08
### Added
- Created singleton instances to ensure dependencies are managed internally within a single instance. https://github.com/tiagohillebrandt/aerofetch/pull/9

### Changed
- Refactored `CountryService` to centralize country retrieval logic. https://github.com/tiagohillebrandt/aerofetch/pull/9
- Refreshed the airport and airline datasets. https://github.com/tiagohillebrandt/aerofetch/pull/11

## [1.1.1] - 2025-03-05
### Changed
- Updated the airport repository and factory to work with the new airport dataset structure. https://github.com/tiagohillebrandt/aerofetch/pull/6

### Fixed
- Fixed an issue where the airport ID was returned instead of the ICAO code. https://github.com/tiagohillebrandt/aerofetch/pull/6

### Removed
- Removed some unnecessary columns from the airport dataset. https://github.com/tiagohillebrandt/aerofetch/pull/6

## [1.1.0] - 2025-03-04
### Added
- Added timezone support to the airport dataset. https://github.com/tiagohillebrandt/aerofetch/pull/3

### Changed
- Updated the airports dataset (2025-03-04).
- Added timezone data to each airport in the dataset. https://github.com/tiagohillebrandt/aerofetch/pull/3
- Refactored Service classes to enhance separation of concerns.
- Moved object initialization logic to dedicated Factory classes for better maintainability.

## [1.0.0] - 2025-02-28
### Added
- Initial release.
