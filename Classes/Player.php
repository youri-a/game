<?php

namespace Classes;


use Classes\Strategy\Strategy;
use Classes\Strategy\StrategyInterface;

class Player
{


    /** @var string */
    private $name;

    /** @var int */
    private $health = 100;

    /** @var StrategyInterface */
    private $strategy;

    /**
     * Player constructor.
     * @param $name
     * @param $strategy
     * @param int $health
     */
    public function __construct($name, $strategy, $health=100)
    {
        $this->setName($name);
        $this->setHealth($health);
        $this->setStrategy(new Strategy($strategy));
    }

    /**
     * @param Player $player
     * @return bool
     */
    public function attack(Player $player)
    {
  /*      $damage = $this->getStrategy()->getWeapon()->getDamage();
        $armor = $player->getStrategy()->getArmor()->getDamageReduction();
        $reduction = $damage * $armor;
        $reddamage = $damage - $reduction;

        echo "attack : $damage $armor $reduction $reddamage <br />";
        echo "result : " . ($player->getHealth()-($this->getDamage()*(1-$player->getDamageReduction()))) . " <br />";
  */
        $player->setHealth($player->getHealth()-($this->getDamage()*(1-$player->getDamageReduction())));
        return ! $player->isAlive();
    }


    /**
     * @return bool
     */
    public function isAlive()
    {
        return $this->health > 0;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        return $this->name = $name;
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return StrategyInterface
     */
    public function getStrategy() : Strategy
    {
        return $this->strategy;
    }

    /**
     * @param int $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @param StrategyInterface $strategy
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @return int
     */
    public function getDamage()
    {
        return $this->getStrategy()->getDamage();
    }

    /**
     * @return int
     */
    public function getDamageReduction()
    {
        return $this->getStrategy()->getDamageReduction();
    }
}