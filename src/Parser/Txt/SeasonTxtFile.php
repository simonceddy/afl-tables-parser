<?php
namespace Eddy\AflTables\Parser\Txt;

use Eddy\Norm\Contract\Model;
use Eddy\AflTables\Contract\DataMap;
use Eddy\AflTables\Contract\Factory;
use Eddy\AflTables\Contract\FactoryManager;
use Eddy\AflTables\Contract\Parser;
use Eddy\AflTables\Factory\Manager;
use Eddy\AflTables\Map\SeasonTxtMap;
use Eddy\AflTables\Util\Splitter;
use Eddy\AflTables\Util\TeamName;

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
        FactoryManager $factories = null
    ) {
        $this->map = $map ?? new SeasonTxtMap;
        $this->factories = $factories ?? new Manager();
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
            'statlines' => $this->statlines,
            'matches' => $this->matches
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
        $this->statlines[] = $this->factories
            ->factory('statline')
            ->buildFrom($data);
    }

    protected function initTeam(string $team)
    {
        $data = TeamName::resolve($team);
        if (!$data) {
            throw new \LogicException('Invalid team: '.$team);
        }
        $this->teams[$team] = $this->factories->factory('team')->buildFrom([
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
        $this->players[$data['name']] = $this->factories
            ->factory('player')
            ->buildFrom($data);
        // If Uuid is present generate UUIDs for players.
        if (class_exists('Ramsey\Uuid\Uuid')) {
            $this->players[$data['name']]->generateUuid();
        }
        $this->rosters[$data['team']][] = $this->players[$data['name']]->uuid();
    }
}
