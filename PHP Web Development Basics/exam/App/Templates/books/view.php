<?php /** @var App\Data\BookDTO $data */
?>

<h1>View book</h1>

<div><a href="profile.php">My profile</a></div>
<br />
<div>Book title: <?php echo $data->getTitle()?></div>
<div>Book author: <?php echo $data->getAuthor()?></div>
<div>Description: <?php echo $data->getDescription()?></div>
<div>Genre: <?php echo $data->getGenreName()?></div>
<div><img src="<?php echo $data->getImage()?>"></div>
