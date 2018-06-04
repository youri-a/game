<?php

namespace Classes\Weapons;

class Weapon implements WeaponInterface
{
    private $name;
    private $damage;

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $damage
     */
    public function setDamage ($damage)
    {
        $this->damage = $damage;
    }

    /**
     * @return int
     */
    public function getDamage()
    {
        return $this->damage;
    }
}