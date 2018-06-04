<?php

namespace Classes\Armors;

class IronArmor extends Armor
{
    /**
     * IronArmor constructor.
     */
    public function __construct()
    {
        $this->setName("Iron");
        $this->setDamageReduction(.3);
    }
}