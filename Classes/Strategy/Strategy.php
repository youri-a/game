<?php

namespace Classes\Strategy;


use Classes\Armors\ArmorInterface;
use Classes\Armors\IronArmor;
use Classes\Armors\LeatherArmor;
use Classes\Armors\PlatinumArmor;
use Classes\Weapons\BazookaWeapon;
use Classes\Weapons\BowWeapon;
use Classes\Weapons\PunchWeapon;
use Classes\Weapons\SpearWeapon;
use Classes\Weapons\WeaponInterface;

class Strategy implements StrategyInterface
{
    /**
     * Strategy constructor.
     * @param string $strategy
     */
    public function __construct($strategy = '')
    {
        switch (strtolower($strategy))
        {
            case 'offensive':
                $this->setWeapon(new BazookaWeapon());
                $this->randomArmor();
                break;
            case 'defensive':
                $this->setArmor(new PlatinumArmor());
                $this->randomWeapon();
                break;
            default:
                $this->randomWeapon();
                $this->randomArmor();
        }
    }


    public function randomWeapon()
    {
        $i = random_int(1,4);
        switch ($i)
        {
            case 1:
                $this->setWeapon(new PunchWeapon());
                break;
            case 2:
                $this->setWeapon(new SpearWeapon());
                break;
            case 3:
                $this->setWeapon(new BowWeapon());
                break;
            case 4:
                $this->setWeapon(new BazookaWeapon());
                break;
        }
    }

    public function randomArmor()
    {
        $i = random_int(1,3);
        switch ($i)
        {
            case 1:
                $this->setArmor(new LeatherArmor());
                break;
            case 2:
                $this->setArmor(new IronArmor());
                break;
            case 3:
                $this->setArmor(new PlatinumArmor());
                break;

        }
    }


    public  function randomize()
    {
        $this->randomArmor();
        $this->randomWeapon();
    }

    /** @var WeaponInterface */
    private $weapon;

    /** @var ArmorInterface */
    private $armor;


    /**
     * @return WeaponInterface|null
     */
    public function getWeapon()
    {
        return $this->weapon;
    }

    /**
     * @return ArmorInterface|null
     */
    public function getArmor()
    {
        return $this->armor;
    }


    /**
     * @param WeaponInterface $weapon
     */
    public function setWeapon(WeaponInterface $weapon)
    {
        $this->weapon = $weapon;
    }


    public function setArmor($armor)
    {
        $this->armor = $armor;
    }


    /**
     * @return int
     */
    public function getDamage()
    {
        if (!isset($this->weapon)) return 0;

        return $this->weapon->getDamage();
    }


    /**
     * @return int|mixed
     */
    public function getDamageReduction()
    {
        if (!isset($this->armor)) return 0;

        return $this->armor->getDamageReduction();
    }
}