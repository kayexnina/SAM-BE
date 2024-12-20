<?php
include("connect.php");

$id = $_GET['id'];

$query = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = $id";
$result = executeQuery($query);

$contents = [];
while ($row = mysqli_fetch_assoc($result)) {
  $contents[] = [
    'content' => $row['content'],
    'image' => $row['image'],
    'color' => $row['color'] 
  ];
}

echo json_encode($contents);

mysqli_close($conn);
?>
