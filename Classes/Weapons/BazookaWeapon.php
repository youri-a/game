<?php

namespace Classes\Weapons;

class BazookaWeapon extends Weapon
{
    /**
     * BazookaWeapon constructor.
     */
    public function __construct()
    {
        $this->setName('Bazooka');
        $this->setDamage(50);
    }
}