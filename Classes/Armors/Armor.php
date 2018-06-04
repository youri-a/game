<?php

namespace Classes\Armors;


class Armor implements ArmorInterface
{
    private $name;
    private $damageReduction;

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
     * @param $damageReduction
     */
    public function setDamageReduction ($damageReduction)
    {
        $this->damageReduction = $damageReduction;
    }

    /**
     * @return mixed
     */
    public function getDamageReduction()
    {
        return $this->damageReduction;
    }
}