<?php
namespace AflParser\Config;

class ParserConfig
{
    public const FILENAME = 'aflParser.php';

    protected $config_path;

    protected $config;
    
    public function __construct(string $config_path = null)
    {
        
        $this->config_path = $config_path;
    }

    private function loadConfigFromFile()
    {
        if (!file_exists($this->config_path)) {
            throw new \LogicException('Invalid config path.');
        }
        $this->config = loadConfigFile($this->config_path);
    }

    private function resolveConfigFile(string $config_path = null)
    {
        if (!$config_path
            || (!is_dir($config_path)
            && !file_exists($config_path))
        ) {
            $config_path = $this->resolveConfigFile();
        } elseif (is_dir($config_path)) {
            if (!file_exists($config_path.'/'.static::FILENAME)) {
                throw new \InvalidArgumentException('Could not locate config.');
            }
            $config_path .= '/'.static::FILENAME;
        }
        $dir = dirname(__DIR__);
        while (!file_exists($dir.'/config/aflParser.php')
            && dirname($dir) !== $dir
        ) {
            $dir = dirname($dir);
        }
        return $dir.'/config/';
    }

    public function get(string $key)
    {
        isset($this->config) ?: $this->loadConfigFromFile();
        if (!isset($this->config[$key])) {
            throw new \InvalidArgumentException($key.' is not a valid key.');
        }
    }
}

function loadConfigFile(string $path)
{
    $loader = \Closure::fromCallable(function (string $path) {
        return include $path;
    });
    return $loader($path);
}
