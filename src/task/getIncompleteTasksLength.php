<?php 
$getIncompleteLength = "SELECT * FROM tasks WHERE completed = 0 AND author_id = $authorId";
$incompleteRes = $connection->query($getIncompleteLength);
$incompleteQtd = $incompleteRes->num_rows;
?>