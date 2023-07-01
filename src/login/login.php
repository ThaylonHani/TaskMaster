<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>TaskMaster|Login</title>
</head>
<body>

<style>
  body {
    background: linear-gradient(to right, #2f2f2f , #0DCAF0);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100vw;
    height: 100vh;
  }
  form {
    background-color: #2f2f2f;
    border-radius: 0.3rem;
    gap: 2rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width:50vw;
    margin: auto;
    padding: 2rem;
  }
  form label {
    font-size: 1.5rem;
    align-self: start;
    margin-left: 4rem;
  }
  form input {
    padding: 0.2rem;
    width: 60%;
    font-size: large;
    background-color: transparent;
    border: 1px solid #0DCAF0;
    color: #0DCAF0;
    border-radius: .2rem;
    transition:opacity .2s ease

  }
  input:hover{
    opacity: .7
  }
  input:focus {
    outline: 0;
    opacity:1 ;
    border-width:2px ;
  }
  
  #submit {
    width: 40%;
    background-color: #0DCAF0;
    padding: .3rem;
    color: #2f2f2f;
    transition:opacity .2s ease
  }
  #submit:hover{
    cursor: pointer;
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

  a{
    color: #fff;
  }

  @keyframes spin {
    to {
      rotate: 360deg;
    }
  }

</style>



 <?php 
 
 switch($_REQUEST['action']??''){
  case 'create':
    include('createForm.php');

break;
    case 'log':
      include('accessCount.php');
break;
      default:
      include("loginForm.php");
break;

 }

 ?>
   

</body>
</html>