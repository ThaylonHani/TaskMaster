
<style>
  a{
    width: 40%;
    text-align: center;
    border:1px solid #0DCAF0;
    color: #0DCAF0;
    border-radius: 3px;
    padding: .3rem;
    transition:opacity .2s ease;
    text-decoration: none;
  }
</style>



<?php 
  $pass = $_POST['password']??'';
  $id = $_GET['id']??false;
  $convertPass = substr(md5($pass),0,20);
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $res = $connection->query("$sql");
  $qtd = $res->num_rows;
  $row = $res->fetch_object();
  if ($qtd > 0 ){

    if($pass){
      if($row->password === $convertPass){
        setcookie("id",$row->id,time()+3600);
        echo "<script>
      alert('Senha correta');
      location.href='?pag=user';
      </script>";
      }
      else echo "<script>
      alert('Senha incorreta');
      </script>";
    }

    
    echo <<<FORM
    <form action=$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING] method=post > 
    <label for="password">
      Confirme sua senha:
    </label>
    <input type="password" name="password" id="password" title="Coloque a senha da sua conta">
    <section style="width:100%;display:flex; justify-content: space-around;align-items:center">
    <a href="?pag=login" id="back">
      Voltar
    </a>
    <input type="submit"  value="Entrar" id="submit" name="submit">
    </section>
    <input type="hidden" name="id" value=$row->id>
    </form>
    FORM;


  }
  else {
    echo <<<INCORRECT

    <form action="<?= $_SERVER[PHP_SELF] ?>" method="post" >
    <label for="password">
        Usuário não encontrado
    </label>
    <section style="width:100%;display:flex; justify-content: space-around;align-items:center">
    <a href="?pag=login" id="back">
      Voltar
    </a>
    </section>
</form>
    
INCORRECT;
  }
  
?>

