<style>
  #users {
      display: flex;
      position: relative;
      flex-direction: column;
      align-items: center;
      justify-content: start;
      padding:2rem;
      width: 60vw;
      height: 80vh;
      background-color: #2f2f2f;
      border-radius: .5rem;   
      gap:2rem;

  }
  #user{
    padding: .5rem ;
    border-radius: .5rem;
    width: 90%;
    background-color: #0DCAF0
  }
  #user:hover {
    opacity: .6
  }
  #user a{
      text-decoration: none ;
  }

  #user h3 {
    text-align: center
  }

  #user p {
    text-align: end
  }

  #create {
    position: absolute;
    text-align: center;
    align-self: center;
    padding: .5rem;
    bottom: 0;
  }

</style>

<div id="users">
<?php 

$sql = "SELECT * FROM users";

$res = $connection->query($sql);

$qtd = $res->num_rows;

if($qtd > 0){
  while($row = $res->fetch_object()) {
   

    echo <<<USERS

        <section id="user">
        <a href="?$_SERVER[QUERY_STRING]&action=log&id=$row->id">
        <h3>
        $row->name
        </h3>
        <p>
        $row->email
        </p>
        </a>
        </section>
      

USERS;
  }
}
else echo "Contas não encontradas"
?> 
<div id="create">
<a href="<?= "?$_SERVER[QUERY_STRING]&action=create"?>">Crie a sua conta, clicando aqui !</a>
</div>
</div>