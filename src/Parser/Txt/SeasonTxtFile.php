<?php
namespace Eddy\AflTables\Parser\Txt;

use Eddy\AflTables\Contract\Parser;
use Eddy\AflTables\Util\Splitter;
use Eddy\AflTables\Contract\DataMap;
use Eddy\AflTables\Map\SeasonTxtMap;
use Eddy\AflTables\Factory\PlayerFactory;
use Eddy\AflTables\Factory\TeamFactory;
use Eddy\AflTables\Contract\Factory;
use Eddy\AflTables\Util\TeamName;
use Eddy\AflTables\Support\HasFactoryArray;
use Eddy\AflTables\Factory\StatlineFactory;
use Eddy\AflTables\Contract\Model;

class SeasonTxtFile implements Parser
{
    use HasFactoryArray;

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

    protected $allowed_factories = [
        'player',
        'statline',
        'team',
        'roster'
    ];

    public function __construct(
        DataMap $map = null,
        array $factories = []
    ) {
        $this->map = $map ?? new SeasonTxtMap;
        $this->initFactories($factories);
    }

    private function initFactories(array $factories)
    {
        isset($factories['player']) ?: $factories['player'] = new PlayerFactory;
        isset($factories['team']) ?: $factories['team'] = new TeamFactory;
        isset($factories['statline']) ?: $factories['statline'] = new StatlineFactory;
        $this->addFactories($factories);
    }

    public function parse(string $input): array
    {
        $input = Splitter::splitLines($input);
        // remove headings
        array_shift($input);
        foreach ($input as $line) {
            $this->processLine(str_getcsv($line));
        }
        return [
            'teams' => $this->teams,
            'rosters' => $this->rosters,
            'players' => $this->players,
            'statlines' => $this->statlines
        ];
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
            $this->initStatline($data, $this->players[$data['name']]);
        }
    }

    protected function initStatline(array $data, Model $player)
    {
        $data['player'] = $player->uuid();
        $this->statlines[] = $this->factory('statline')->buildFrom($data);
    }

    protected function initTeam(string $team)
    {
        $data = TeamName::resolve($team);
        if (!$data) {
            throw new \LogicException('Invalid team: '.$team);
        }
        $this->teams[$team] = $this->factory('team')->buildFrom([
            'team_short' => $team,
            'city' => $data[0],
            'name' => $data[1]
        ]);
    }

    protected function initRoster(string $team)
    {
        $this->rosters[$team] = [];
    }

    protected function initPlayer(array $data)
    {
        $this->players[$data['name']] = $this->factory('player')->buildFrom([
            'name' => $data['name'],
            'afl_tables_id' => $data['afl_tables_id']
        ])->generateUuid();
        $this->rosters[$data['team']][] = $this->players[$data['name']]->uuid();
    }
}
