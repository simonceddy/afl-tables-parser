<?php
namespace Eddy\AflTables\Parser\Txt;

use Eddy\AflTables\Contract\Parser;
use Eddy\AflTables\Util\Splitter;
use Eddy\AflTables\Contract\DataMap;
use Eddy\AflTables\Map\SeasonTxtMap;
use Eddy\AflTables\Factory\PlayerFactory;
use Eddy\AflTables\Contract\Factory;

class SeasonTxtFile implements Parser
{
    /**
     * DataMap - maps keys to their column names
     *
     * @var DataMap
     */
    protected $map;

    protected $teams = [];

    protected $rosters = [];

    protected $players = [];

    protected $rounds = [];

    protected $matches = [];

    protected $statlines = [];

    public function __construct(
        DataMap $map = null,
        Factory $player_factory = null
    ) {
        $this->map = $map ?? new SeasonTxtMap;
        $this->factory = $player_factory ?? new PlayerFactory;
    }

    public function parse(string $input): array
    {
        $input = Splitter::splitLines($input);
        // remove headings
        array_shift($input);
        foreach ($input as $line) {
            $this->processLine(str_getcsv($line));
        }
        var_dump($this->rosters);
        return [];
    }

    protected function processLine(array $line)
    {
        //var_dump($line);
        if (count($this->map::map()) === count($line)) {
            try {
                $data = array_combine($this->map::map(), $line);
            } catch (\Exception $e) {
                var_dump($line);
                throw $e;
            }
            if (isset($data['team']) && is_string($team = $data['team'])) {
                isset($this->teams[$team]) ?: $this->initTeam($team);
                isset($this->rosters[$team]) ?: $this->initRoster($team);
            } else {
                throw new \LogicException('Data has no team somehow');
            }
            isset($this->players[$data['name']]) ?: $this->initPlayer($data);
        }
    }

    protected function initTeam(string $team)
    {
        $this->teams[$team] = [
            'team_short' => $team
        ];
    }

    protected function initRoster(string $team)
    {
        $this->rosters[$team] = [];
    }

    protected function initPlayer(array $data)
    {
        $this->players[$data['name']] = $this->factory->build([
            'name' => $data['name'],
            'afl_tables_id' => $data['afl_tables_id']
        ])->generateUuid();
        $this->rosters[$data['team']][] = $this->players[$data['name']]->uuid();
    }
}
