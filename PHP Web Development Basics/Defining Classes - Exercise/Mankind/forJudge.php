<?php

list($studentFirstName, $studentLastName, $fNumber) = explode(" ", readline());
list($workerFirstName, $workerLastName, $salary, $workingHours) = explode(" ", readline());

try {
    $student = new Student($studentFirstName, $studentLastName, $fNumber);
    $worker = new Worker($workerFirstName, $workerLastName, floatval($salary), floatval($workingHours));

    echo $student . PHP_EOL;
    echo $worker;
} catch (Exception $ex) {
    echo $ex->getMessage();
}

class Human
{
    /**
     * @var string
     */
    protected $fisrtName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * Human constructor.
     * @param string $fisrtName
     * @param string $lastName
     * @throws Exception
     */
    public function __construct(string $fisrtName, string $lastName)
    {
        $this->setFisrtName($fisrtName);
        $this->setLastName($lastName);
    }

    /**
     * @return string
     */
    public function getFisrtName(): string
    {
        return $this->fisrtName;
    }

    /**
     * @param string $fisrtName
     * @throws Exception
     */
    public function setFisrtName(string $fisrtName): void
    {
        if (!ctype_upper($fisrtName[0])) {
            throw new Exception("Expected upper case letter!Argument: firstName");
        }
        if (strlen($fisrtName) < 4) {
            throw new Exception("Expected length at least 4 symbols!Argument: firstName");
        }
        $this->fisrtName = $fisrtName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @throws Exception
     */
    public function setLastName(string $lastName): void
    {
        if (!ctype_upper($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 3) {
            throw new Exception("Expected length at least 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

}

class Student extends Human
{
    /**
     * @var string
     */
    private $facultyNumber;

    public function __construct(string $fisrtName, string $lastName, string $facultyNumber)
    {
        parent::__construct($fisrtName, $lastName);
        $this->setFacultyNumber($facultyNumber);
    }

    /**
     * @return int
     */
    public function getFacultyNumber(): int
    {
        return $this->facultyNumber;
    }

    /**
     * @param string $facultyNumber
     * @throws Exception
     */
    public function setFacultyNumber(string $facultyNumber): void
    {
        if (!preg_match("/^[\d]{5,10}$/", $facultyNumber)) {
            throw new Exception("Invalid faculty number!");
        }
        $this->facultyNumber = $facultyNumber;
    }


    public function __toString()
    {
        $output = "First Name: " . parent::getfisrtName() . PHP_EOL . "Last Name: " . parent::getLastName() . PHP_EOL . "Faculty number: " . $this->facultyNumber . PHP_EOL;
        return $output;
    }

}


class Worker extends Human
{
    /**
     * @var float
     */
    private $weekSalary;

    /**
     * @var float
     */
    private $workHoursPerDay;

    /**
     * Worker constructor.
     * @param string $fisrtName
     * @param string $lastName
     * @param float $weekSalary
     * @param float $workHoursPerDay
     * @throws Exception
     */
    public function __construct(string $fisrtName, string $lastName, float $weekSalary, float $workHoursPerDay)
    {
        //parent::__construct($fisrtName, $lastName);
        parent::setFisrtName($fisrtName);
        $this->setLastName($lastName);
        $this->setWeekSalary($weekSalary);
        $this->setWorkHoursPerDay($workHoursPerDay);
    }

    public function setLastName(string $lastName): void
    {
        if (!ctype_upper($lastName[0])) {
            throw new Exception("Expected upper case letter!Argument: lastName");
        }
        if (strlen($lastName) < 4) {
            throw new Exception("Expected length more than 3 symbols!Argument: lastName");
        }
        $this->lastName = $lastName;
    }

    /**
     * @return float
     */
    public function getWeekSalary(): float
    {
        return $this->weekSalary;
    }

    /**
     * @param float $weekSalary
     * @throws Exception
     */
    public function setWeekSalary(float $weekSalary): void
    {
        if ($weekSalary < 11) {
            throw new Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->weekSalary = $weekSalary;
    }

    /**
     * @return float
     */
    public function getWorkHoursPerDay(): float
    {
        return $this->workHoursPerDay;
    }

    /**
     * @param float $workHoursPerDay
     * @throws Exception
     */
    public function setWorkHoursPerDay(float $workHoursPerDay): void
    {

        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            throw new Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workHoursPerDay = $workHoursPerDay;
    }

    public function __toString()
    {
        $salaryPerHour = number_format($this->weekSalary/($this->workHoursPerDay*7), 2, ".", "");
        $ws = number_format($this->weekSalary, 2, ".", "");
        $hpd = number_format($this->workHoursPerDay, 2, ".", "");

        $output = "First Name: " . parent::getfisrtName() . PHP_EOL .
            "Last Name: " . parent::getLastName() . PHP_EOL .
            "Week Salary: " . $ws . PHP_EOL .
            "Hours per day: ". $hpd . PHP_EOL .
            "Salary per hour: " . $salaryPerHour;

        return $output;
    }

}