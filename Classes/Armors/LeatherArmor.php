<?php

namespace Classes\Armors;

class LeatherArmor extends Armor
{
    /**
     * LeatherArmor constructor.
     */
    public function __construct()
    {
        $this->setName("Leather");
        $this->setDamageReduction(.1);
    }
}

