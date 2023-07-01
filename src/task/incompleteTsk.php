<main>
<div id="mainContent">

<?php 

$authorId = $_COOKIE['id'];

$sql = "SELECT * FROM tasks WHERE author_id = '$authorId' AND completed = 0";

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
else echo "<p class='p'>Sem tasks incompletas</p>"
?> 

</div>
</main>