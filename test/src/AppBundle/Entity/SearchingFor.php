<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * searchingFor
 *
 * @ORM\Table(name="searchingFor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\searchingForRepository")
 */
class searchingFor
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
     * @ORM\Column(name="searchFor", type="string", length=255)
     */
    private $searchFor;


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
     * Set searchFor
     *
     * @param string $searchFor
     *
     * @return searchingFor
     */
    public function setSearchFor($searchFor)
    {
        $this->searchFor = $searchFor;

        return $this;
    }

    /**
     * Get searchFor
     *
     * @return string
     */
    public function getSearchFor()
    {
        return $this->searchFor;
    }
}

