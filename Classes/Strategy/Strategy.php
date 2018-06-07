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
use Classes\Weapons\Weapon;
use Classes\Weapons\WeaponInterface;

class Strategy implements StrategyInterface
{
    /** @var WeaponInterface */
    private $weapon;

    /** @var ArmorInterface */
    private $armor;

    const offensive = 1;
    const defensive = 2;

    /**
     * Strategy constructor.
     * @param string $strategy
     */
    public function __construct($strategy = '')
    {
        switch ($strategy)
        {
            case self::offensive:
                $this->setWeapon(new BazookaWeapon());
                $this->randomArmor();
                break;
            case self::defensive:
                $this->setArmor(new PlatinumArmor());
                $this->randomWeapon();
                break;
            default:
                $this->randomWeapon();
                $this->randomArmor();
        }
    }

    /**
     * @return Weapon
     */
    public function randomWeapon()
    {
        try {
            $randomWeapon = random_int(1, 4);
        } catch (\Exception $e) {
        }
        switch ($randomWeapon)
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
        try {
            $randomArmor = random_int(1, 3);
        } catch (\Exception $e) {
        }
        switch ($randomArmor)
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

    public function randomize()
    {
        $this->randomArmor();
        $this->randomWeapon();
    }

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

    /**
     * @param ArmorInterface $
     */
    public function setArmor(ArmorInterface $armor)
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