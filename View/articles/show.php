<?php // This page can be used as a detail page

$selectedTitle = $_GET['action'];
$sql = "SELECT * FROM articles WHERE title='$selectedTitle'";
$result = $this->databaseManager->connection->query($sql)->fetchAll();

echo $result[0]['title']."<br>";
echo $result[0]['description']."<br>";
echo $result[0]['publish_date'];
?>