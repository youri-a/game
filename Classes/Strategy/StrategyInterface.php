<?php

namespace Classes\Strategy;

use Classes\Armors\ArmorInterface;
use Classes\Weapons\WeaponInterface;

interface StrategyInterface
{
    /**
     * @return WeaponInterface|null
     */
    public function getWeapon();

    /**
     * @return ArmorInterface|null
     */
    public function getArmor();

    /**
     * @return int
     */
    public function getDamage();

    /**
     * @return int
     */
    public function getDamageReduction();
}