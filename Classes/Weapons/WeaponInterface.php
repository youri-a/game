<?php

namespace Classes\Weapons;

interface WeaponInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return int
     */
    public function getDamage();
}