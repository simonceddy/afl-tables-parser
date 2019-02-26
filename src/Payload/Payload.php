<?php
namespace AflParser\Payload;

/**
 * The Payload prototype object
 * 
 * @category AflParser
 * @package  AflParser
 * @author   Simon Eddy <simon@simoneddy.com.au>
 * @license  MIT
 * @link     http://github.com/simonceddy/afl-tables-parser
*/
class Payload
{
    /**
     * The individual season, if appropriate.
     *
     * @var int
     */
    public $season = null;

    /**
     * The teams, if any, that have been processed.
     * 
     * Teams should have rosters for each season being processed.
     * 
     * If a single season is being parsed, a teams data can contain its roster
     *
     * @var array
     */
    public $teams = [];

    /**
     * The rosters, if any, that have been processed.
     * 
     * This should be populated when parsing data from multiple seasons.
     * 
     * If parsing data from a single season, rosters can be stored as team data.
     *
     * @var array
     */
    public $rosters = [];

    /**
     * The players, if any, that have been processed.
     * 
     * Players should assigned to team rosters.
     *
     * @var array
     */
    public $players = [];

    /**
     * The matches processed, if any.
     * 
     * Matches should be stored as either:
     * - season => round => match, or
     * - round => match, if parsing a single season.
     * 
     * Even if processing a single match the round, and season if possible,
     * should be recorded.
     *
     * @var array
     */
    public $matches = [];
}
