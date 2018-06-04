<?php

namespace Classes\Weapons;

class SpearWeapon extends Weapon
{
    /**
     * SpearWeapon constructor.
     */
    public function __construct()
    {
        $this->setName('Spear');
        $this->setDamage(20);
    }
}