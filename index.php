<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TaskMaster</title>
</head>
<body>
 
 <?php 
 include('config.php');
 switch ($_GET['pag']??''){
    case 'login':
      include('./src/login/login.php');
    break;
    case 'user':
      include('./src/user/user.php');
      break;
      case 'newTsk':
        include('./src/task/newTask.php');
        break;
        case 'editTsk':
          include('./src/task/editTask.php');
          break;
      default : 
      include('main.php');
      break;
 }
 ?>
  
  <!-- <p style="color:white">
  <?php 
  var_dump($_SERVER);
  ?>
  </p> -->
</body>
</html>