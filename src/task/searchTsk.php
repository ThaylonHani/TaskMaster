<main>
<div id="mainContent">

<?php 

$authorId = $_COOKIE['id'];
$taskTitle = (string) $_POST['search']??'';

$sql = "SELECT * FROM tasks WHERE title LIKE '%$taskTitle%' AND author_id = '$authorId'";

$res = $connection->query($sql);

$qtd = $res->num_rows;




if($qtd > 0){
while($row = $res->fetch_object()) {

$cutDescription = $row->description;
$formatDescription = strlen($cutDescription) > 100 ? substr_replace($cutDescription,"...",100) : $cutDescription;
$completed = $row->completed ? "#0578dc": "#4F2E3A";
$taskCompleted = $row->completed ? "taskIncomplete" : "taskCompleted";
$taskHandleCompleted = $row->completed ? "desfeita" :"feita";

include("taskMain.php");

}
}
else echo "<p class='p'>Nenhuma task encontrada</p>"
?> 

</div>
</main>