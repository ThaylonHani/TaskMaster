<style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      background-color: #2f2f2f;
      display: flex;
      flex-direction: column;
    }
    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem;
      background-color: #0DCAF0;
    }
    header img {
        width: 64px;
    }

    header nav ul {
        list-style: none;
        display: flex;
        gap: 2rem;
    }
    nav ul li {
      background-color: transparent;
    }
    header ul li a {
        text-decoration: none;
        color: #444444;
    }
    main{
      margin-top:2rem;
      display: flex;
      flex-direction: column;
      gap: 3rem;
      align-self: center;
      width: 80%;
      color: #fff;
    }
    .theme {
      display: flex;
      width: 100%;
      height: 100%;
      align-self: start;
      justify-content: space-between;
      align-items: center;
    }

    .theme div {
      width: 40%;
      height: 200px;
      display: flex;
      justify-content: center;
      position: relative;
      padding: 1rem;
      align-items: center;
    }

    .theme  img {

      width: 200px;
      height: 200px;
      background: linear-gradient(to right , yellow, black);
      position: absolute;
      top: 0;
    }
    .theme h2 {
      width: 50%;
      height: auto;
      line-height: 118%;
      text-align: center;
    }


    .theme img:nth-child(1){
      left: -20%;
    }
    .theme img:nth-child(2){
      left: 0%;
    }
    .theme img:nth-child(3){
      left: 40%;
    }

    .about{
      display: flex;
      width: 100%;
      justify-content: space-between;
      align-items: center;
    }

    .about p {
      width: 50%;
      text-align: center;
    }

    
  </style>

<header>
    <img src="assets/logo.png" alt="">
    <nav>
      <ul>
        
        <li>
          <a href="?pag=login">Entrar</a>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    
        <section class="theme">
          <div>
            <img src="./assets/loginImg.png" alt="">
            <img src="./assets/userImg.png" alt="">
            <img src="./assets/newTskImg.png" alt="">
          </div>
            <h2>Crie suas tarefas e controle elas para cada conta as tasks dão diferentes,podendo buscar e filtrar pelas que já foram completadas</h2>
        </section>
        <section class="about">
          
            <p>Crie contas para cada pessoa de sua casa, trabalho com cada uma tendo suas tasks. Veja tasks incompletas, edite, exclua e crie novas. </p>
      </section>
  </main>