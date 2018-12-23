<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Searching
 *
 * @ORM\Table(name="searching")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SearchingRepository")
 */
class Searching
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
     * @ORM\Column(name="searching", type="string", length=255)
     */
    private $searching;


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
     * Set searching
     *
     * @param string $searching
     *
     * @return Searching
     */
    public function setSearching($searching)
    {
        $this->searching = $searching;

        return $this;
    }

    /**
     * Get searching
     *
     * @return string
     */
    public function getSearching()
    {
        return $this->searching;
    }


}

