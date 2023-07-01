<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="./css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <title>TaskMaster|User</title>
</head>
<body class="d-flex flex-column " style="background-color:#2f2f2f">

<style>
 div ul li a:hover, .dropdown ul li a:hover,.dropdown ul li  button:hover {
    background: rgba(0,0,0,0.2);
  }
  main {
      display: flex;
      flex-direction: column;
      width: 100%;
      align-items: center;
      justify-content: center;
      align-self: center;
      text-align: center;
    }

  #mainContent {
      width: 80%;
      display: flex;
      flex-direction: column;
      gap: 2rem;
    }

    .task {
      display: flex;
      align-items: center;
      vertical-align: middle;
      justify-content: space-between;
      text-align: center;
      padding: 3rem 1rem;
      border-radius: 0.5rem;
      position: relative;
    }
    .task h3 {
      align-self: start;
      max-width: 30%;
      width: 30%;
      overflow: hidden;
      text-align: left;
    }
    .task p {
      width:40% !important;
      max-width: 40%;
      overflow: hidden;
    }
    .task p,
    h3 {
      margin: 0;
    }
    .dropdown {
      justify-self: end;
    }

    .task ul li a {
      color: white;
    }

    .task ul li a:hover {
      background: rgba(0, 0, 0, 0.2);
      color: white;

    }

    .task ul li i {
      font-size: 1rem;
    }

    .task span {
      content: "";
      padding: 0.2rem;
      position: absolute;
      left: 0;
      right: 0;
      margin: 0 auto;
      top: 1rem;
      opacity: 0.7;
      /* background-color: #0578dc ; */
      /* background-color: #4F2E3A; */
      border-radius: 9999px;
      width: 98%;

    }
    .p {
      color: #fff;
    }
    .a { 
      color:#fff
    }
</style>


<?php 
$id=  $_COOKIE['id'];
$search= $_POST['search']??'';

$sql = "SELECT * FROM users WHERE id = '$id'";
$res = $connection->query("$sql");
$qtd = $res->num_rows;
$row = $res->fetch_object();



?>

<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?= "?pag=user"?>" class="d-flex align-items-center mb-2 mb-lg-0  text-decoration-none">
          <img src="assets/logo.png" alt="" width="64">
      </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?= "?pag=user&page=completeTsk"?>" class="nav-link px-2 link-light">Completas</a></li>
          <li><a href="<?= "?pag=user&page=incompleteTsk"?>" class="nav-link px-2 link-light">Incompletas</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="?pag=user&page=searchTsk" method="post">
          <input type="text" class="form-control" placeholder="Buscar..." aria-label="Search" name="search" value="<?= $search?>">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block  text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="assets/user.jpeg" alt="mdo" class="rounded-circle" width="32" height="32">
          </a>
          <ul class="dropdown-menu text-small bg-secondary">
            <li><a class="dropdown-item link-light" style="background-color:inherit;user-select: none;"><?= $row->name?></a></li>
            <li><a class="dropdown-item link-light" href="?pag=newTsk"><i class="bi bi-pen"></i> Nova tarefa...</a></li>
            <li><hr class="dropdown-divider link-light"></li>
            <li><a class="dropdown-item link-light" href="/TaskMaster"><i class="bi bi-door-open"></i> Sair</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>


  <?php 
      switch(@$_REQUEST["page"]){
          case "incompleteTsk":
          include("./src/task/incompleteTsk.php");
          break;
          case "completeTsk":
          include("./src/task/completeTsk.php");
          break;
          case"searchTsk":
            include("./src/task/searchTsk.php");
          break;
          default:
          include ("./src/task/tasks.php");
      }  
  
  ?>

  <script src="./js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
