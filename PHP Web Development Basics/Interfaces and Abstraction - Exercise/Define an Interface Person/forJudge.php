<?php



interface Person
{
    public function setName($name);
    public function setAge($age);
}

class Citizen implements Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $age;

    /**
     * Citizen constructor.
     * @param string $name
     * @param int $age
     */
    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param integer $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }


    public function __toString()
    {
        return $this->name . PHP_EOL . $this->age;
    }

}

$name = readline();
$age = intval(readline());

$citizen = new Citizen($name, $age);
echo $citizen;