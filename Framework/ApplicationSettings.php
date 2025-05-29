<?php

namespace Framework;

class ApplicationSettings
{
    private static $instance;

    protected array $settings = [];

    public function __construct()
    {
        $this->settings = require basePath('config/app.php');
    }

    public static function getInstance()
    {
        if (! self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function get($key, $default = null)
    {
        return $this->settings[$key] ?? $default;
    }

    public function __get($key)
    {
        return $this->get($key);
    }
}
