<?php

namespace CommandBlocker;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Utils;
use pocketmine\utils\Config;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\level\Level;
use pocketmine\Server;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\event\server\RemoteServerCommandEvent;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\player\PlayerDeathEvent;

class Main extends PluginBase implements Listener{

public function onEnable(){
$this->getServer()->getPluginManager()->registerEvents($this, $this);
$this->saveDefaultConfig();
$this->getLogger()->info("CommandBlocker on.");
}
public function onDisable(){
$this->getLogger()->info("CommandBlocker off.");
}

public function onPlayerCommand(PlayerCommandPreprocessEvent $event){
$name = $event->getPlayer()->getDisplayName();
$command = $event->getMessage();
$comds = $this->getConfig()->get("cmd");
$com = explode(" ", $command);
foreach($comds as $cmd){
if($com[0] == "/" . $cmd or $com[0] == "./" . $cmd){
$event->setCancelled(true);
$event->getPlayer()->sendMessage("[CommandBlocker] Command blocked. Plugin by ArceusMatt.");
}
}
}

}
