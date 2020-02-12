<?php

namespace RailBaron\Enum;

abstract class RegionTable
{
    const TABLE = [
        1 => [
            2 => RegionName::PLAINS,
            3 => RegionName::SOUTHEAST,
            4 => RegionName::SOUTHEAST,
            5 => RegionName::SOUTHEAST,
            6 => RegionName::NORTH_CENTRAL,
            7 => RegionName::NORTH_CENTRAL,
            8 => RegionName::NORTHEAST,
            9 => RegionName::NORTHEAST,
            10 => RegionName::NORTHEAST,
            11 => RegionName::NORTHEAST,
            12 => RegionName::NORTHEAST,
        ],
        2 => [
            2 => RegionName::SOUTHWEST,
            3 => RegionName::SOUTH_CENTRAL,
            4 => RegionName::SOUTH_CENTRAL,
            5 => RegionName::SOUTH_CENTRAL,
            6 => RegionName::SOUTHWEST,
            7 => RegionName::SOUTHWEST,
            8 => RegionName::PLAINS,
            9 => RegionName::NORTHWEST,
            10 => RegionName::NORTHWEST,
            11 => RegionName::PLAINS,
            12 => RegionName::NORTHWEST,
        ]
    ];
}
