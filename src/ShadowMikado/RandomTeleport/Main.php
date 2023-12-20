<?php

namespace ShadowMikado\RandomTeleport;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\SingletonTrait;
use ShadowMikado\RandomTeleport\command\randomteleport;

class Main extends PluginBase

{
    use SingletonTrait;

    public static Config $config;

    protected function onLoad(): void
    {
        $this->getLogger()->info("Loading...");
        self::setInstance($this);
    }

    protected function onEnable(): void
    {
        $this->getLogger()->info("Enabling...");
        $this->saveDefaultConfig();
        self::$config = $this->getConfig();
        $this->getServer()->getCommandMap()->register("", new randomteleport());
    }

    protected function onDisable(): void
    {
        $this->getLogger()->info("Disabling...");
    }

}