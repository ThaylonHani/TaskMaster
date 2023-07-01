<body>

  <style>
    #mainHeader {
      width: 100%;
      display: flex;
      padding: 1rem;
      gap: 2rem;
      color: #fff;
      justify-content: end;
      font-size: larger;
    }

    #mainHeader p {
      line-height: 116%;
    }

   
  </style>
  <?php 
        $authorId = $_COOKIE["id"];
  ?>

<?php 
include("getCompletedTasksLength.php");

include("getIncompleteTasksLength.php");

$totalTasks = "SELECT * FROM tasks WHERE author_id = '$authorId'";

$totalRes = $connection->query($totalTasks);

$totalQtd = $totalRes->num_rows;
?>

  <main>
    <div id="mainHeader" >
      <p>Incompletas: <strong class="text-danger"><?= $incompleteQtd ?></strong></p>
      <p>Completas: <strong class="text-success"><?= $completedQtd?></strong></p>
      <p>Total: <strong class="text-info"><?= $totalQtd ?></strong></p>
    </div>
    <div id="mainContent">

      <?php 

      if($_POST['taskCompleted']??''){
        $taskId = $_POST['taskCompleted'];
        $completedSql = "UPDATE tasks set completed=1 WHERE id = '$taskId'";
        $completeRes = $connection->query($completedSql) ;
        if($completedRes){
          echo "
          <script>
          location.href='?pag=user';
          </script>";
          include("getCompleteTasksLength.php");
        }

        ;
      }
      else if($_POST['taskIncomplete']??''){
        $taskId = $_POST['taskIncomplete'];
        $incompleteSql = "UPDATE tasks set completed=0 WHERE id = '$taskId'";
        $incompleteRes = $connection->query($incompleteSql) ;
        if($incompleteRes){
         include("getIncompleteTasksLength.php");
         echo "
         <script>
          location.href='?pag=user';
         </script>";
        }
      }
      else if($_POST['taskDelete']??''){
        $taskId = $_POST['taskDelete'];
        $deleteSql = "DELETE FROM tasks WHERE id = '$taskId' ";
        $deleteRes = $connection->query($deleteSql);
        if($deleteRes){
          echo "
          <script>
           location.href='?pag=user';
          </script>";
         }
      }
$sql = "SELECT * FROM tasks WHERE author_id = '$authorId'";

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
else echo "<p class='p'>Sem tasks <a class='a' href='?pag=newTsk'>Crie sua primeira task</a></p>"
?> 

    </div>
  </main>
</body>
