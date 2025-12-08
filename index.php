<?php
// você pode colocar verificações de login aqui depois
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galaxy Adventures</title>

  <!-- CSS PRINCIPAL DO SITE -->
  <link rel="stylesheet" href="style.css">

  <!-- CSS DA LOJA / LOGIN -->
  <link rel="stylesheet" href="loja.css">
</head>

<body>

  <!-- ========================= STATUS DO SERVIDOR ========================= -->
  <div class="server-status" id="serverStatus">
    <div class="icon">👥</div>
    <div class="info">
      <span class="label">Jogadores Online</span>
      <span class="values" id="onlineCount">0/0</span>
    </div>
  </div>


  <!-- ========================= HEADER ========================= -->
  <header>
    <div class="logo">Galaxy Adventures</div>
    <nav>
      <a href="#inicio">Início</a>
      <a href="#como-jogar">Como Jogar</a>
      <a href="https://docs.google.com/document/d/1cGk6Ku3IGBVIt1I8RCEFDxiQ_mbgRTWjXESWtpoaXws/edit?tab=t.0">Regras</a>
      <a href="#login">Loja</a>
      <a href="https://discord.gg/galaxyadventures" class="discord">Discord</a>
      <a href="https://www.youtube.com/watch?v=8erO-zBOyo8" class="ATT">Atualizações</a>
    </nav>
  </header>


  <!-- ========================= HERO / INÍCIO ========================= -->
  <section id="inicio" class="hero">

    <div class="content"> 
      <h1 class="msg">Galaxy Adventures</h1>

      <div class="buttons">
        <a href="arquivos/GalaxyLauncher_PC.zip" download class="DPC">Launcher PC</a>
        <a href="#" class="btn trailer">Ver trailer</a>
        <a href="arquivos/GalaxyLauncher_Mobile.zip" download class="DMoba">Launcher Mobile</a>
      </div>
    </div>

    <img src="arquivos/Picsart_25-12-06_08-08-50-868-removebg-preview.png" 
         alt="Personagem" 
         class="hero-image">

  </section>



  <!-- ============================================================= -->
  <!-- ======================== LOGIN / LOJA ======================= -->
  <!-- ============================================================= -->
  <section id="login">

    <div class="login-container">

      <!-- LOGO DO LOGIN -->
      <img class="login-logo" 
        src="https://media.discordapp.net/attachments/1416602055652409445/1447364794045956096/Picsart_25-12-06_08-08-50-868-removebg-preview.png?ex=69375b01&is=69360981&hm=5c0ffc5b723d6cc049d466ca6e2b77a4870ee1871a72a4ab273e61ad68f7534c&=&format=webp&quality=lossless"
        alt="Logo do Galaxy Adventures">

      <div class="login-box">

        <h2 class="login-title">Entrar</h2>
        <h3 class="msg">Conecte-se ao Galaxy Adventures para aproveitar todos os recursos.</h3>

        <form method="POST" action="login.php">

          <label class="login-label">Conta</label>
          <input type="text" name="usuario" class="login-input" placeholder="Insira sua conta" maxlength="24" required>

          <label class="login-label">Senha</label>
          <input type="password" name="senha" class="login-input" placeholder="********" maxlength="24" required>

          <button class="login-btn" type="submit">Entrar</button>

        </form>

      </div>
    </div>

  </section>



  <!-- ========================= FOOTER ========================= -->
  <footer class="login-footer">
    <p>© 2025 Galaxy Adventures - Todos os direitos reservados</p>
  </footer>



  <!-- ========================= TRAILER POPUP ========================= -->
  <div id="trailerModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>

      <video id="trailerVideo" controls>
        <source src="arquivos/VID-20251206-WA0015.mp4" type="video/mp4">
        Seu navegador não suporta vídeo.
      </video>

    </div>
  </div>



  <!-- ========================= SCRIPT TRAILER ========================= -->
  <script>
    const modal = document.getElementById("trailerModal");
    const openTrailer = document.querySelector(".btn.trailer");
    const closeModal = document.querySelector(".close");
    const video = document.getElementById("trailerVideo");

    openTrailer.onclick = (e) => {
      e.preventDefault();
      modal.style.display = "flex";
      video.play();
    };

    closeModal.onclick = () => {
      modal.style.display = "none";
      video.pause();
      video.currentTime = 0;
    };

    window.onclick = (e) => {
      if (e.target === modal) {
        modal.style.display = "none";
        video.pause();
        video.currentTime = 0;
      }
    };
  </script>



  <!-- ========================= SCRIPT STATUS SERVER ========================= -->
  <script>
    async function atualizarStatus() {
      try {
        const response = await fetch("https://seu-ip-ou-api/status.json");
        const data = await response.json();
        document.getElementById("onlineCount").textContent =
          `${data.players_online}/${data.players_max}`;
      } catch (e) {
        document.getElementById("onlineCount").textContent = "0/0";
      }
    }
    setInterval(atualizarStatus, 10000);
    atualizarStatus();
  </script>

</body>
</html>
