<?php
$n = intval(readline());

$songs = [];
for($a = 0; $a < $n; $a++) {
    [$artistName, $songName, $SongLength] = explode(";", readline());
    [$minutes, $seconds] = explode(":", $SongLength);

    try {
        if (!isset($artistName) || !isset($songName) || !isset($minutes) || !isset($seconds)) {
            throw new Exception("Invalid song.");
        }
        $song = new Song($artistName, $songName, intval($minutes), intval($seconds));
        $songs[] = $song;
        echo "Song added." . PHP_EOL;
    } catch (Exception $ex) {
        echo $ex->getMessage() . PHP_EOL;
        continue;
    }
}

if (count($songs) > 0) {
    $lenght = 0;
    foreach ($songs as $song) {
        $lenght += $song->getLength();
    }

    $hms = calculatePlaylistLenght($lenght);
    echo "Songs added: " . count($songs) . PHP_EOL;
    echo "Playlist length: " . $hms[0] ."h " . sprintf("%02d", $hms[1]) ."m " . sprintf("%02d", $hms[2]) ."s";

} else {
    echo "Songs added: " . count($songs) . PHP_EOL;
    echo "Playlist length: 0h 00m 00s";
}
/**
 * @param integer
 * @return array
 */
function calculatePlaylistLenght(int $lenght) {
    $hms[] = floor($lenght / 3600);
    $hms[] = floor(($lenght % 3600) / 60);
    $hms[] = ($lenght % 3600) % 60;
    return $hms;
}


class Song {
    /**
     * @var string
     */
    private $artistName;

    /**
     * @var string
     */
    private $songName;

    /**
     * @var integer
     */
    private $minutes;

    /**
     * @var integer
     */
    private $seconds;

    /**
     * @var integer
     */
    private $length;

    /**
     * Song constructor.
     * @param string $artistName
     * @param string $songName
     * @param int $minutes
     * @param int $seconds
     * @throws Exception
     */
    public function __construct(string $artistName, string $songName, int $minutes, int $seconds)
    {
        $this->setArtistName($artistName);
        $this->setSongName($songName);
        $SongLengthInSeconds = $minutes * 60 + $seconds;

        $this->setMinutes($minutes);
        if ($SongLengthInSeconds < 0 || $SongLengthInSeconds > 899) {
            throw new Exception("Invalid song length.");
        }
        $this->setLength($SongLengthInSeconds);
        $this->setSeconds($seconds);


    }


    /**
     * @return string
     */
    public function getArtistName(): string
    {
        return $this->artistName;
    }

    /**
     * @param string $artistName
     * @throws Exception
     */
    public function setArtistName(string $artistName): void
    {
        if (strlen($artistName)  < 3 || strlen($artistName) > 20) {
            throw new Exception("Artist name should be between 3 and 20 symbols.");
        }
        $this->artistName = $artistName;
    }

    /**
     * @return string
     */
    public function getSongName(): string
    {
        return $this->songName;
    }

    /**
     * @param string $songName
     * @throws Exception
     */
    public function setSongName(string $songName): void
    {
        if (strlen($songName) < 3 || strlen($songName) > 30) {
            throw new Exception("Song name should be between 3 and 30 symbols.");
        }
        $this->songName = $songName;
    }

    /**
     * @return int
     */
    public function getMinutes(): int
    {
        return $this->minutes;
    }

    /**
     * @param int $minutes
     * @throws Exception
     */
    public function setMinutes(int $minutes): void
    {
        if ($minutes < 0 || $minutes > 14) {
            throw new Exception("Song minutes should be between 0 and 14.");
        }
        $this->minutes = $minutes;
    }

    /**
     * @return int
     */
    public function getSeconds(): int
    {
        return $this->seconds;
    }

    /**
     * @param int $seconds
     * @throws Exception
     */
    public function setSeconds(int $seconds): void
    {
        if ($seconds < 0 || $seconds > 59) {
            throw new Exception("Song seconds should be between 0 and 59.");
        }
        $this->seconds = $seconds;
    }

    /**
     * @return int
     */
    public function getLength(): int
    {
        return $this->length;
    }

    /**
     * @param int $length
     */
    public function setLength(int $length): void
    {
        $this->length = $length;
    }



}

//na;la;17:99