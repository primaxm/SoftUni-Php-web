<?php

namespace App\Data;

class TaskDTO
{
    /**
     * @var int
     */
    private $taskId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $location;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $startedOn;

    /**
     * @var string
     */
    private $dueDate;

    /**
     * @var string;
     */
    private $error;

    /**
     * @var \Generator|CategoryDTO[]
     */
    private $categoryList = [];


    /**
     * @var array
     */
    private $data = [];


    /**
     * @return int
     */
    public function getTaskId(): ?int
    {
        return $this->taskId;
    }

    /**
     * @param int $taskId
     */
    public function setTaskId(int $taskId): void
    {
        $this->taskId = $taskId;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws \Exception
     */
    public function setTitle(string $title): void
    {
        if (strlen($title) < 3 || strlen($title) > 50) {
            throw new \Exception("Invalid task title");
        }
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @throws \Exception
     */
    public function setDescription(string $description): void
    {
        if (strlen($description) < 10 || strlen($description) > 10000) {
            throw new \Exception("Invalid task description");
        }
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @throws \Exception
     */
    public function setLocation(string $location): void
    {
        if (strlen($location) < 3 || strlen($location) > 100) {
            throw new \Exception("Invalid task location");
        }
        $this->location = $location;
    }

    /**
     * @return int
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getStartedOn(): ?string
    {
        return $this->startedOn;
    }

    /**
     * @param string $startedOn
     */
    public function setStartedOn(string $startedOn): void
    {
        $this->startedOn = $startedOn;
    }

    /**
     * @return string
     */
    public function getDueDate(): ?string
    {
        return $this->dueDate;
    }

    /**
     * @param string $dueDate
     */
    public function setDueDate(string $dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return string
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->error = $error;
    }

    /**
     * @return CategoryDTO[]|\Generator
     */
    public function getCategoryList()
    {
        return $this->categoryList;
    }

    /**
     * @param CategoryDTO[]|\Generator $categoryList
     */
    public function setCategoryList($categoryList): void
    {
        $this->categoryList[] = $categoryList;
    }

    /**
     * @return string
     */
    public function getData($key): ?string
    {
        if (isset($this->data[$key])) {
            return $this->data[$key];
        }
        return null;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     */
    public function setUserName(string $userName): void
    {
        $this->userName = $userName;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }



}