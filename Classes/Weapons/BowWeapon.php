<?php

namespace Classes\Weapons;

class BowWeapon extends Weapon
{
    /**
     * BowWeapon constructor.
     */
    public function __construct()
    {
        $this->setName('Bow');
        $this->setDamage(5);
    }
}