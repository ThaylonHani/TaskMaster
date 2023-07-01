<?php 

$getCompletedLength = "SELECT * FROM tasks WHERE completed = 1 AND author_id = $authorId";
$completedRes = $connection->query($getCompletedLength);
$completedQtd = $completedRes->num_rows;
?>