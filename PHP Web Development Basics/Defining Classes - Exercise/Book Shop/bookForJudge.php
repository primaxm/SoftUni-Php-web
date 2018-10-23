<?php
//spl_autoload_register();

$author = readline();
$title = readline();
$price = floatval(readline());
$type = readline();

$book = null;
try {
    if ($type == "STANDARD") {
            $book = new Book($title, $author, $price);
    } elseif ($type == "GOLD") {
            $book = new GoldenEditionBook($title, $author, $price);
    } else {
        throw new Exception("Type is not valid!");
    }
    echo $book;
} catch (Exception $ex) {
    echo $ex->getMessage();
}



class Book
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var float
     */
    private $price;

    /**
     * Book constructor.
     * @param string $title
     * @param string $author
     * @param float $price
     * @throws Exception
     */
    public function __construct(string $title, string $author, float $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws Exception
     */
    public function setTitle(string $title): void
    {
        if (strlen($title) < 3) {
            throw new Exception("Title not valid!");
        }
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @throws Exception
     */
    public function setAuthor(string $author): void
    {
        if (empty($author) || preg_match('/\d/', $author[strpos( $author, " ") + 1])) {
            throw new Exception("Author not valid!");
        }
        $this->author = $author;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @throws Exception
     */
    public function setPrice(float $price): void
    {
        if ($price <= 0) {
            throw new Exception("Price not valid!");
        }
        $this->price = $price;
    }

    public function __toString()
    {
        return "OK" . PHP_EOL . $this->getPrice();
    }

}

class GoldenEditionBook extends Book
{
    /**
     * @return float
     */
    public function getPrice(): float
    {
        return parent::getPrice() * 1.3;
    }

    public function __toString()
    {
        return "OK" . PHP_EOL . $this->getPrice();
    }

}


