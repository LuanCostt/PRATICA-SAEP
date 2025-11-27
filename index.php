<?php




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <aside class="side-bar">
    <img id="logo-principal" src="images/SAEPSaude.png" alt="">
    <h2>SAEPSaúde</h2>
    <div class="resumo-qtd">
      <h4>Qtd. Atividades</h4>
      <h4>Qtd. Calorias</h4>
    </div>
    <div class="aba-atividade">
      <img id="progresso" src="images/progresso.svg" alt="">
      <h3>Atividade</h3>
    </div>
    <footer class="side-bar-footer">
      <h3>SAEPSaúde</h3>
      <div class="icones-footer">
        <img src="images/instagram.svg" alt="">
        <img src="images/twitter.svg" alt="">
        <img src="images/tiktok.svg" alt="">
      </div>
      <p class="copyright">Copyright - 2025/2026</p>
    </footer>
  </aside>
  <main class="conteudo">
    <div class="btn_lc">
      <button class="btn_loggin" onclick="openModal('modalLogin')">Login</button>
      <button class="btn_cadastro" onclick="openModal('modalCadastro')">Cadastre-se</button>
    </div>
    <div id="modalCadastro" class="modal">
      <div class="modal-content">
        <span class="close" data-close="modalCadastro">&times;</span>
        <h2>Cadastre-se</h2>
        <form action="cadastro.php" method="post">
          <input type="text" name="nome" placeholder="Nome" required>
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="senha" placeholder="Senha" required>
          <button type="submit" class="btn-cadastrar">Cadastrar</button>
          <button type="button" class="btn-cancelar" onclick="closeModal('modalCadastro')">Cancelar</button>
        </form>
      </div>
    </div>
    <div id="modalLogin" class="modal">
      <div class="modal-content">
        <span class="close" data-close="modalLogin">&times;</span>
        <h2>Login</h2>
        <form action="cadastro.php" method="post">
          <input type="text" name="nome" placeholder="Nome" required>
          <input type="password" name="senha" placeholder="Senha" required>
          <button type="submit" class="btn-cadastrar">Login</button>
          <button type="button" class="btn-cancelar" onclick="closeModal('modalLogin')">Cancelar</button>
        </form>
      </div>
    </div>
    <div class="titulo-tabela">
      <h3>Corrida</h3>
      <h3>Caminhada</h3>
      <h3>Trilha</h3>
    </div>
    <div class="usuario-card">
      <div class="card-header">
        <img src="images/usuario01.jpg" alt="Usuario_01" />
        <span class="usuario-nome">Usuario_01</span>
        <strong class="atividade-titulo">Corrida</strong>
        <span class="data-hora">18:30 - 12/08/2024</span>
      </div>
      <div class="card-body">
        <div class="info">
          <span class="valor">5 km</span><br /><small>Distância</small>
        </div>
        <div class="info">
          <span class="valor">32 min</span><br /><small>Duração</small>
        </div>
        <div class="info">
          <span class="valor">310 kcal</span><br /><small>Calorias</small>
        </div>
        <div class="info likes-comments">
          <span><img src="images/coracao.svg" alt="">12</span>
          <span><img src="images/comentario.svg" alt=""> 3</span>
        </div>
      </div>
    </div>

    <div class="usuario-card">
      <div class="card-header">
        <img src="images/usuario02.jpg" alt="Usuario_02" />
        <span class="usuario-nome">Usuario_02</span>
        <strong class="atividade-titulo">Caminhada</strong>
        <span class="data-hora">05:30 - 09/07/2024</span>
      </div>
      <div class="card-body">
        <div class="info">
          <span class="valor">3.2 km</span><br /><small>Distância</small>
        </div>
        <div class="info">
          <span class="valor">45 min</span><br /><small>Duração</small>
        </div>
        <div class="info">
          <span class="valor">190 kcal</span><br /><small>Calorias</small>
        </div>
        <div class="info likes-comments">
          <span><img src="images/coracao.svg" alt="">12</span>
          <span><img src="images/comentario.svg" alt=""> 3</span>
        </div>
      </div>
    </div>

    <div class="usuario-card">
      <div class="card-header">
        <img src="images/usuario03.jpg" alt="Usuario_03" />
        <span class="usuario-nome">Usuario_03</span>
        <strong class="atividade-titulo">Trilha</strong>
        <span class="data-hora">20:40 - 15/08/2024</span>
      </div>
      <div class="card-body">
        <div class="info">
          <span class="valor">7.8 km</span><br /><small>Distância</small>
        </div>
        <div class="info">
          <span class="valor">1h 15 min</span><br /><small>Duração</small>
        </div>
        <div class="info">
          <span class="valor">450 kcal</span><br /><small>Calorias</small>
        </div>
        <div class="info likes-comments">
          <span><img src="images/coracao.svg" alt="">12</span>
          <span><img src="images/comentario.svg" alt=""> 3</span>
        </div>
      </div>
    </div>

  </main>
  <script src="js/modal.js"></script>
</body>


</html>