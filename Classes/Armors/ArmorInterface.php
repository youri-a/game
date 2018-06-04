<?php

namespace Classes\Armors;

interface ArmorInterface
{
    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return mixed
     */
    public function getDamageReduction();
}