<?php

class Children {
    private $childName;
    private $childBirthday;

    /**
     * @return mixed
     */
    public function getChildName()
    {
        return $this->childName;
    }

    /**
     * @param mixed $childName
     */
    public function setChildName($childName): void
    {
        $this->childName = $childName;
    }

    /**
     * @return mixed
     */
    public function getChildBirthday()
    {
        return $this->childBirthday;
    }

    /**
     * @param mixed $childBirthday
     */
    public function setChildBirthday($childBirthday): void
    {
        $this->childBirthday = $childBirthday;
    }

}