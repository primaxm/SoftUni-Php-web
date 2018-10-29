<?php


class Robot implements Identification {
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $model;

    /**
     * Robot constructor.
     * @param string $id
     * @param string $model
     */
    public function __construct(string $model, string $id)
    {
        $this->setId($id);
        $this->model = $model;
    }


    public function setId(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): string
    {
        return $this->id;
    }


}