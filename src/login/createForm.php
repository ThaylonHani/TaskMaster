
<form action="<?php echo "$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]" ?>" method="post">
          <label for="name">
          Nome:
          </label>
          <input type="text" name="name" id="name" required>
          <label for="email">
          Email:
          </label>
          <input type="email" name="email" id="email" required>
          <label for="password">
          Senha:
          </label>
          <input type="password" name="password" id="password" required>
          <input type="submit" value="Criar" id="submit"  >
          <a href="<?= "$_SERVER[PHP_SELF]?pag=$_GET[pag]" ?>">Entrar em conta já existente.</a>
          </form>

          <?php 

    
$name = $_POST['name']??'';
$email = $_POST['email']??'';
$password = $_POST['password']??'';
$mdPassword = md5($password);

if($name && $email && $password){
  
$sql = "INSERT INTO users (name,email,password) VALUES ('{$name}', '{$email}', '{$mdPassword}')";

$res = $connection->query($sql) ;
if($res==true) {
  echo <<<LOADING
  <div  role="status" id="loading" >
  <span id="spin"></span>
</div>
<script>
setTimeout(() => {
  alert("Conta criada com sucesso");
  location.href="$_SERVER[PHP_SELF]?pag=login";
}, 1000);
</script>
LOADING;
}
else {
  echo"<script>alert('Ocorreu um erro')</script>";
}

}

   



?>