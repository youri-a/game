<?php

namespace Classes;

class Game
{
    /**
     *
     */
    public  function Start()
    {
        $turn = 1;
        if (isset($player2) && is_a($player2, "Classes\Player"))
            do {
                $player1->attack($player2);
                echo $player1->getName() . " attacks " . $player2->getName() . " with a " . $player1->getStrategy()->getWeapon()->getName() . " and has " . $player1->getStrategy()->getArmor()->getName() . " as armor" . "<br />";
                if ($player2->getHealth() <= 0)
                {
                    echo $player2->getName() . " is dead, " . $player1->getName() . " won !" . "<br />";
                }
                else
                {
                    echo $player2->getName() . " his health is: " . $player2->getHealth() . "<br />";
                }

                if (!$player2->isAlive())
                {
                    break;
                }

                $player2->attack($player1);
                echo $player2->getName() . " attacks " . $player1->getName() . " with a " . $player2->getStrategy()->getWeapon()->getName() . " and has " . $player2->getStrategy()->getArmor()->getName() . " as armor" . "<br />";

                if ($player1->getHealth() <= 0)
                {
                    echo $player1->getName() . " is dead, " . $player2->getName() . " won !" . "<br />";
                }
                else
                {
                    echo $player1->getName() . " his health is: " . $player1->getHealth() . "<br />";
                }
                if($turn %3 == 0)
                {
                    $player1->getStrategy()->randomize();
                    echo $player1->getName() . " changes weapon to " . $player1->getStrategy()->getWeapon()->getName() . " and armor to " . $player1->getStrategy()->getArmor()->getName() . "<br />";

                    $player2->getStrategy()->randomize();
                    echo $player2->getName() . " changes weapon to " . $player2->getStrategy()->getWeapon()->getName() . " and armor to " . $player2->getStrategy()->getArmor()->getName() . "<br />";
                }
                $turn++;
            }
            while ($player1->isAlive() && $player2->isAlive());
        else echo "Nog geen namen ingegeven";
    }
}