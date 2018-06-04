<?php

namespace Classes\Armors;

class PlatinumArmor extends Armor
{
    /**
     * PlatinumArmor constructor.s
     */
    public function __construct()
    {
        $this->setName("Platinum");
        $this->setDamageReduction(.6);
    }
}