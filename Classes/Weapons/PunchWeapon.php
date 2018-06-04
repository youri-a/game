<?php

namespace Classes\Weapons;

class PunchWeapon extends Weapon
{
    /**
     * PunchWeapon constructor.
     */
    public function __construct()
    {
        $this->setName('Punch');
        $this->setDamage(1);
    }
}