<?php

namespace RailBaron\Enum;

abstract class CitiesTable
{
    const NORTHEAST_DESTINATIONS = [
        1 => [
            2 => CityName::NEW_YORK,
            3 => CityName::NEW_YORK,
            4 => CityName::NEW_YORK,
            5 => CityName::ALBANY,
            6 => CityName::BOSTON,
            7 => CityName::BUFFALO,
            8 => CityName::BOSTON,
            9 => CityName::PORTLAND_MA,
            10 => CityName::NEW_YORK,
            11 => CityName::NEW_YORK,
            12 => CityName::NEW_YORK,
        ],
        2 => [
            2 => CityName::NEW_YORK,
            3 => CityName::WASHINGTON,
            4 => CityName::PITTSBURGH,
            5 => CityName::PITTSBURGH,
            6 => CityName::PHILADELPHIA,
            7 => CityName::WASHINGTON,
            8 => CityName::PHILADELPHIA,
            9 => CityName::BALTIMORE,
            10 => CityName::BALTIMORE,
            11 => CityName::BALTIMORE,
            12 => CityName::NEW_YORK,
        ]
    ];

    const SOUTHEAST_DESTINATIONS = [
        1 => [
            2 => CityName::CHARLOTTE,
            3 => CityName::CHARLOTTE,
            4 => CityName::CHATTANOOGA,
            5 => CityName::ATLANTA,
            6 => CityName::ATLANTA,
            7 => CityName::ATLANTA,
            8 => CityName::RICHMOND,
            9 => CityName::KNOXVILLE,
            10 => CityName::MOBILE,
            11 => CityName::KNOXVILLE,
            12 => CityName::MOBILE,
        ],
        2 => [
            2 => CityName::NORFOLK,
            3 => CityName::NORFOLK,
            4 => CityName::NORFOLK,
            5 => CityName::CHARLESTON,
            6 => CityName::MIAMI,
            7 => CityName::JACKSONVILLE,
            8 => CityName::MIAMI,
            9 => CityName::TAMPA,
            10 => CityName::TAMPA,
            11 => CityName::MOBILE,
            12 => CityName::NORFOLK,
        ]
    ];

    const NORTH_CENTRAL_DESTINATIONS = [
        1 => [
            2 => CityName::CLEVELAND,
            3 => CityName::CLEVELAND,
            4 => CityName::CLEVELAND,
            5 => CityName::CLEVELAND,
            6 => CityName::DETROIT,
            7 => CityName::DETROIT,
            8 => CityName::INDIANAPOLIS,
            9 => CityName::MILWAUKEE,
            10 => CityName::MILWAUKEE,
            11 => CityName::CHICAGO,
            12 => CityName::MILWAUKEE,
        ],
        2 => [
            2 => CityName::CINCINNATI,
            3 => CityName::CHICAGO,
            4 => CityName::CINCINNATI,
            5 => CityName::CINCINNATI,
            6 => CityName::COLUMBUS,
            7 => CityName::CHICAGO,
            8 => CityName::CHICAGO,
            9 => CityName::ST_LOUIS,
            10 => CityName::ST_LOUIS,
            11 => CityName::ST_LOUIS,
            12 => CityName::CHICAGO,
        ]
    ];

    const SOUTH_CENTRAL_DESTINATIONS = [
        1 => [
            2 => CityName::MEMPHIS,
            3 => CityName::MEMPHIS,
            4 => CityName::MEMPHIS,
            5 => CityName::LITTLE_ROCK,
            6 => CityName::NEW_ORLEANS,
            7 => CityName::BIRMINGHAM,
            8 => CityName::LOUISVILLE,
            9 => CityName::NASHVILLE,
            10 => CityName::NASHVILLE,
            11 => CityName::LOUISVILLE,
            12 => CityName::MEMPHIS,
        ],
        2 => [
            2 => CityName::SHREVEPORT,
            3 => CityName::SHREVEPORT,
            4 => CityName::DALLAS,
            5 => CityName::NEW_ORLEANS,
            6 => CityName::DALLAS,
            7 => CityName::SAN_ANTONIO,
            8 => CityName::HOUSTON,
            9 => CityName::HOUSTON,
            10 => CityName::FORT_WORTH,
            11 => CityName::FORT_WORTH,
            12 => CityName::FORT_WORTH,
        ]
    ];

    const PLAINS_DESTINATIONS = [
        1 => [
            2 => CityName::KANSAS_CITY,
            3 => CityName::KANSAS_CITY,
            4 => CityName::DENVER,
            5 => CityName::DENVER,
            6 => CityName::DENVER,
            7 => CityName::KANSAS_CITY,
            8 => CityName::KANSAS_CITY,
            9 => CityName::KANSAS_CITY,
            10 => CityName::PUEBLO,
            11 => CityName::PUEBLO,
            12 => CityName::OKLAHOMA_CITY,
        ],
        2 => [
            2 => CityName::OKLAHOMA_CITY,
            3 => CityName::ST_PAUL,
            4 => CityName::MINNEAPOLIS,
            5 => CityName::ST_PAUL,
            6 => CityName::MINNEAPOLIS,
            7 => CityName::OKLAHOMA_CITY,
            8 => CityName::DES_MOINES,
            9 => CityName::OMAHA,
            10 => CityName::OMAHA,
            11 => CityName::FARGO,
            12 => CityName::FARGO,
        ]
    ];

    const NORTHWEST_DESTINATIONS = [
        1 => [
            2 => CityName::SPOKANE,
            3 => CityName::SPOKANE,
            4 => CityName::SEATTLE,
            5 => CityName::SEATTLE,
            6 => CityName::SEATTLE,
            7 => CityName::SEATTLE,
            8 => CityName::RAPID_CITY,
            9 => CityName::CASPER,
            10 => CityName::BILLINGS,
            11 => CityName::BILLINGS,
            12 => CityName::SPOKANE,
        ],
        2 => [
            2 => CityName::SPOKANE,
            3 => CityName::SALT_LAKE_CITY,
            4 => CityName::SALT_LAKE_CITY,
            5 => CityName::SALT_LAKE_CITY,
            6 => CityName::PORTLAND_ORE,
            7 => CityName::PORTLAND_ORE,
            8 => CityName::PORTLAND_ORE,
            9 => CityName::POCATELLO,
            10 => CityName::BUTTE,
            11 => CityName::BUTTE,
            12 => CityName::PORTLAND_ORE,
        ]
    ];

    const SOUTHWEST_DESTINATIONS = [
        1 => [
            2 => CityName::SAN_DIEGO,
            3 => CityName::SAN_DIEGO,
            4 => CityName::RENO,
            5 => CityName::SAN_DIEGO,
            6 => CityName::SACRAMENTO,
            7 => CityName::LAS_VEGAS,
            8 => CityName::PHOENIX,
            9 => CityName::EL_PASO,
            10 => CityName::TUCUMCARI,
            11 => CityName::PHOENIX,
            12 => CityName::PHOENIX,
        ],
        2 => [
            2 => CityName::LOS_ANGELES,
            3 => CityName::OAKLAND,
            4 => CityName::OAKLAND,
            5 => CityName::OAKLAND,
            6 => CityName::LOS_ANGELES,
            7 => CityName::LOS_ANGELES,
            8 => CityName::LOS_ANGELES,
            9 => CityName::SAN_FRANCISCO,
            10 => CityName::SAN_FRANCISCO,
            11 => CityName::SAN_FRANCISCO,
            12 => CityName::SAN_FRANCISCO,
        ]
    ];


    public static function citiesForRegionName($regionName)
    {
        return [
            RegionName::NORTHEAST => self::NORTHEAST_DESTINATIONS,
            RegionName::SOUTHEAST => self::SOUTHEAST_DESTINATIONS,
            RegionName::NORTH_CENTRAL => self::NORTH_CENTRAL_DESTINATIONS,
            RegionName::SOUTH_CENTRAL => self::SOUTH_CENTRAL_DESTINATIONS,
            RegionName::PLAINS => self::PLAINS_DESTINATIONS,
            RegionName::NORTHWEST => self::NORTHWEST_DESTINATIONS,
            RegionName::SOUTHWEST => self::SOUTHWEST_DESTINATIONS,
        ][$regionName];
    }
}
