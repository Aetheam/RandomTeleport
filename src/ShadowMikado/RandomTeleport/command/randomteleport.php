<?php

namespace ShadowMikado\RandomTeleport\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\math\Vector3;
use pocketmine\player\Player;
use ShadowMikado\RandomTeleport\Main;

class randomteleport extends Command
{

    public function __construct()
    {
        parent::__construct(Main::$config->getNested("command.name"), Main::$config->getNested("command.description"), Main::$config->getNested("command.usage_message"), Main::$config->getNested("command.aliases"));
        $this->setPermission("randomteleport.cmd");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {

        if (!$sender->hasPermission("randomteleport.cmd")) {
            $sender->sendMessage(Main::$config->getNested("messages.no_permission"));
            return;
        }

        if (!$sender instanceof Player) {
            $sender->sendMessage(Main::$config->getNested("messages.not_player"));
            return;
        }

        $rdm_x = random_int(Main::$config->getNested("range.x")[0], Main::$config->getNested("range.x")[1]);
        $rdm_z = random_int(Main::$config->getNested("range.z")[0], Main::$config->getNested("range.z")[1]);
        $pos_y = $sender->getWorld()->getHighestBlockAt($rdm_x, $rdm_z) + 1;

        $sender->teleport(new Vector3($rdm_x, $pos_y, $rdm_z));
        $sender->sendMessage(str_replace(["{x}", "{y}", "{z}"], [$rdm_x, $pos_y, $rdm_z], Main::$config->getNested("messages.success")));
        return;
    }
}
