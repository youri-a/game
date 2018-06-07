<?php

namespace Classes\Armors;

interface ArmorInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return int
     */
    public function getDamageReduction();
}