<body>
<style>
  *{
    margin:0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    background-color: #0DCAF0;
    display: flex;
    align-items:center;
    justify-content: center;
    height: 100vh;
  }
  form {
    display: flex;
    justify-content: space-evenly;
    padding: 1rem;
    width: 80%;
    height: 80%;
    flex-direction: column;
    align-items: center;
    align-self: center;
    border-radius: .5rem;
    background-color: #2f2f2f
  }
  form label {
    font-size: x-large;
    color: #fff;
  }
  form input, a {
    padding: .4rem;
    width: 60%;
    font-size: 1.3rem;
    border-radius: .5rem;
    background-color: transparent;
    border: 2px solid #0DCAF0;
    transition: all .2s linear;
    color:#fff;
  }

  input:hover, textarea:hover,a:hover {
    opacity: .6
  }
  
  form input:focus,textarea:focus{
    outline: none;
    border: 2px solid #fff;
    opacity: 1;
  }
  form textarea {
    font-size: 1.3rem;
    color: #fff;
    background-color: transparent;
    border: 2px solid #0DCAF0;
    resize: none;
    width: 80%;    
    border-radius: .5rem;
    transition: all .2s linear;
    text-align: center;
  }
  .buttons {
    display: flex;
    width: 100%;
    gap: 1rem;
    justify-content: space-between;
    align-items: center;
  }
  .buttons a {
    text-align: center;
    border: 0;
    background-color: #042940;
    text-decoration: none;
  }
  #loading {
    display: flex;
    position: absolute;
    width: 50%;
    height: 80%;
    background : rgba(0,0,0,0.4 ) ;
    backdrop-filter: blur(.1rem);
    border-radius: .3rem ;
    align-items: center;
    justify-content: center;
  }

  #spin {
    position: relative;
    padding: 1rem;
    border:5px solid #0DCAF0;
    border-radius: 100%;
    border-top-color:transparent ;
    animation: spin .6s ease infinite;
  }
  
  @keyframes spin {
    to {
      rotate: 360deg;
    }
  }

</style>

<form action="?pag=newTsk" method="post">

<label for="title">
  Nome 
</label>
<input type="text" name="title" id="title" placeholder="Nome da task" maxlength="80">
<label for="description">
  Descrição
</label>
<textarea name="description" id="description" cols="30" rows="10" maxlength="350" ></textarea>
<section class="buttons">
  <a href="javascript:history.go(-1)">
    Cancelar
  </a>
<input type="submit" value="Criar task">
</section>
</form>
<?php 
$title = $_POST['title']??'';
$description = $_POST['description']??'';
$authorId = $_COOKIE['id']??'';

if($title && $description && $authorId){
  
$sql = "INSERT INTO tasks (title,description,author_id) VALUES ('{$title}', '{$description}', '{$authorId}')";

$res = $connection->query($sql) ;
if($res==true) {
  echo <<<LOADING
  <div  role="status" id="loading" >
  <span id="spin"></span>
</div>
<script>
setTimeout(() => {
  alert("Task criada com sucesso");
  location.href="?pag=user";
}, 1000);
</script>
LOADING;
}
else {
  echo"<script>alert('Ocorreu um erro')</script>";
}

}
?>