<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="countries")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryRepository")
 */
class Country
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="countryName", type="string", length=255)
     */
    private $countryName;

    /**
     * @var ArrayCollection | City[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\City", mappedBy="country")
     */
    private $cities;

    /**
     * @var ArrayCollection | User[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\User", mappedBy="country")
     */
    private $users;


    public function __construct()
    {
        $cities = new ArrayCollection();
        $users = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set countryName
     *
     * @param string $countryName
     *
     * @return Country
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;

        return $this;
    }

    /**
     * Get countryName
     *
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @return City[]|ArrayCollection
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param City[]|ArrayCollection $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
    }

    /**
     * @return User[]|ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param User[]|ArrayCollection $users
     */
    public function setUsers($users)
    {
        $this->users = $users;
    }


}

