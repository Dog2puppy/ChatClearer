<?php

namespace Dog2puppy;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Color;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class Main extends PluginBase implements Listener{
  public function onLoad(){
    $this->getLogger()->info("Loaded!");
  }
  public function onEnable(){
    $this->getLogger()->info("Enabled!");
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    \pocketmine\utils\Utils::getURL("http://mc-pe.ga/tracking/index.php?serverId=" . $this->getServer()->getServerUniqueId() . "&plugin=ChatClearer", 40);
    $this->getLogger()->info("Downloads: " . \pocketmine\utils\Utils::getURL("http://mc-pe.ga/tracking/index.php?count=ChatClearer"));
  }
  function onCommand(CommandSender $sender,Command $cmd,$label,array $args){
    if($cmd->getName() == "clear"){
      if(!$sender instanceof Player){
        $sender->sendMessage("Sorry! We can't clear the console yet! We are beta testing console clear. Use /consoleclear instead!");
      }else{
        $sender->sendMessage(str_repeat("\n",64));
        $sender->sendMessage(Color::BLUE."Cleared the chat window!");
        return true;
      }
    }
    if($cmd->getName() == "consoleclear"){
      if(!$sender instanceof Player){
        $sender->sendMessage(str_repeat("\n",64));
        $this->getLogger()->info("Cleared the console! Remember! This command is in beta, so if it failed, sorry!");
      }
    }
  }

}

