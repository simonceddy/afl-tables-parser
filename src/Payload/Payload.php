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
    public $single_season = true;

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
     * the teams processed.
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
     * The rosters processed.
     * 
     * @var array
     */
    public $rosters = [];

    /**
     * The players, if any, that have been processed.
     * 
     * Players should assigned to team rosters.
     * 
     * The players processed.
     *
     * @var array
     */
    public $players = [];

    /**
     * The matches processed.
     *
     * @var array
     */
    public $matches = [];

    /**
     * Errors
     *
     * @var array
     */
    public $errors = [];

    /**
     * The matches processed, if any.
     * 
     * @return  array
     */ 
    public function getAllMatches()
    {
        return $this->matches;
    }

    public function hasMatch()
    {
        
    }

    /**
     * Get the individual season, if appropriate.
     *
     * @return  int
     */ 
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set the individual season, if appropriate.
     *
     * @param  int  $season
     *
     * @return  self
     */ 
    public function setSeason(int $season)
    {
        $this->season = $season;

        return $this;
    }
}
