<?php

class Parents {
    private $parentName;
    private $parentBirthday;

    /**
     * @return mixed
     */
    public function getParentName()
    {
        return $this->parentName;
    }

    /**
     * @param mixed $parentName
     */
    public function setParentName($parentName): void
    {
        $this->parentName = $parentName;
    }

    /**
     * @return mixed
     */
    public function getParentBirthday()
    {
        return $this->parentBirthday;
    }

    /**
     * @param mixed $parentBirthday
     */
    public function setParentBirthday($parentBirthday): void
    {
        $this->parentBirthday = $parentBirthday;
    }

}