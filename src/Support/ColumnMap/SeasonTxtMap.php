<?php
namespace AflParser\Support\ColumnMap;

class SeasonTxtMap implements ColumnMapInterface
{
    private static $mappings = [
        0 => "Player",
        1 => "ID",
        2 => "Team",
        3 => "Opponent",
        4 => "Round",
        5 => "Kicks",
        6 => "Marks",
        7 => "Hand Balls",
        8 => "Disp",
        9 => "Goals",
        10 => "Behinds",
        11 => "Hit Outs",
        12 => "Tackles",
        13 => "Rebounds",
        14 => "Inside 50",
        15 => "Clearances",
        16 => "Clangers",
        17 => "Frees For",
        18 => "Frees Against",
        19 => "Brownlow",
        20 => "Contested Possessions",
        21 => "Uncontested Possessions",
        22 => "Contested Marks",
        23 => "Marks Inside 50",
        24 => "One Percenters",
        25 => "Bounces",
        26 => "Goal Assists",
        27 => "% Time Played",
    ];

    public function mappings(): array
    {
        return static::$mappings;
    }
}