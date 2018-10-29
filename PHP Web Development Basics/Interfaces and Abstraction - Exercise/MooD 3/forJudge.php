<?php
abstract class GameObjects {
    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $hashedPassword;

    /**
     * @var integer
     */
    protected $level;

    /**
     * GameObjects constructor.
     * @param string $username
     * @param string $hashedPassword
     * @param int $level
     */
    public function __construct(string $username, int $level)
    {
        $this->username = $username;
        $this->level = $level;
    }


}

class Archangel extends GameObjects {
    /**
     * @var integer
     */
    private $mana;

    /**
     * Archangel constructor.
     * @param int $mana
     */
    public function __construct(string $username, int $mana, int $level)
    {
        parent::__construct($username, $level);
        $this->mana = $mana;
    }

    /**
     * @param string $hashedPassword
     */
    public function setHashedPassword(): void
    {
        $this->hashedPassword = strrev($this->username) . strlen($this->username) * 21;
    }

    /**
     * @return float
     */
    public function getMana(): float
    {
        return $this->mana;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }


}

class Demon extends GameObjects {
    /**
     * @var float
     */
    private $energy;

    /**
     * Demon constructor.
     * @param float $energy
     */
    public function __construct(string $username, float $energy, int $level)
    {
        parent::__construct($username, $level);
        $this->energy = $energy;
    }


    /**
     * @param string $hashedPassword
     */
    public function setHashedPassword(): void
    {
        $this->hashedPassword = strlen($this->username) * 217;
    }

    /**
     * @return float
     */
    public function getEnergy(): float
    {
        return $this->energy;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->hashedPassword;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

}

[$username, $type, $points, $level] = explode(" | ", readline());
$obj = new $type($username, $points, $level);
$obj->setHashedPassword();
echo '"' . $obj->getUsername() . '" | "' . $obj->getHashedPassword() . '" -> ' . $type . PHP_EOL;
if ($type == 'Archangel') {
    echo $obj->getMana()*$obj->getLevel();
} elseif ($type == 'Demon') {
    echo number_format(round($obj->getEnergy(), 1)*$obj->getLevel(), 1, '.', '');
}

