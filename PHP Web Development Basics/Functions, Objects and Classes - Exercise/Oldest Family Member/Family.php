<?php

class Family {
    private $familyMembers = [];

    /**
     * @return array
     */
    public function getFamilyMembers(): array
    {
        return $this->familyMembers;
    }

    public function addMember($familyMember): void
    {
        $this->familyMembers[] = $familyMember;
    }


    public function getOldestMember() {
        usort($this->familyMembers, function ($member1, $member2) {
            return $member2->getPersonAge() <=> $member1->getPersonAge();
        });
        return $this->familyMembers[0];
    }
}