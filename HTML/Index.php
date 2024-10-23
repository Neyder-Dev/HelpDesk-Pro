<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HelpDesk-Pro</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="/Helpdesk-Pro/CSS/NewTicket.css" />
  <link
    rel="icon"
    href="https://zaga.dev/wp-content/uploads/2022/12/cropped-android-chrome-512x512-1-192x192.png"
    sizes="192x192" />
</head>

<body>
  <header>
    <div class="title">
      <h1>HelpDesk-Pro</h1>
    </div>
    <h2 id="name-page">Bienvenido</h2>
    <a href="https://zaga.dev/" target="_blank"><img src="https://zaga.dev/wp-content/uploads/2023/01/zaga-logo-rectangle.svg" alt="logo" /></a>
  </header>
  <main class="frente">
    <div class="botonera">
      <button id="boton1" onclick="CrearTicket()">Nuevo Ticket</button>
      <button id="boton2" onclick="ConsultaTicket()">Consultar Ticket</button>
    </div>
    <div>
      <form action="../PHP/EnviaTicket.php" method="post" id="form-nticket" style="display:none;">
        <label for="username" id="l-username">Usuario:</label>
        <br>
        <select id="select_usuarios" name="usuario" required>
          <?php include '../PHP/GetUsers.php'; ?>
        </select>
        <br>
        <label for="asunto-ticket" id="l-asunto">Asunto del ticket</label>
        <br>
        <input type="text" id="asunto-ticket" name="asunto-ticket" placeholder="'Mi equipo no enciende' " required />
        <br>
        <label for="descripcion" id="l-descripcion">Descripcion:</label>
        <br>
        <textarea id="descripcion-ticket" name="descripcion" rows="4" cols="50" placeholder="Por favor explicanos a detalle cual es el inconveniente que estas presentando" required></textarea><br><br>
        <br>
        <button id="btn-nticket" type="submit">Enviar Ticket</button>
        <script src="../JS/NewTicket.js"></script>
      </form>
    </div>
    <div id="form-consulta" style="display: none;">
      <label for="id-ticket" id="l-id-ticket">ID del ticket:</label>
      <br>
      <input type="number" id="id-ticket" name="id-ticket" required />
      <br>
      <button id="btn-consulta" onclick="consultarTicket()">Consultar Ticket</button>
      <div id="Datos-ticket">
        <p id="id1">Ticket Numero: <span id="r-id-ticket"></span></p>
        <p id="title1">Titulo Ticket: <span id="title-ticket"></span></p>
        <p id="desc1">Descripcion: <span id="description-ticket"></span></p>
        <p id="sta1">Estado: <span id="status-ticket"></span></p>
        <p id="it1">Encargado: <span id="it-ticket"></span></p>
        <button id="btn-volver" onclick="vuelve()">Volver</button>
      </div>
      <script src="../JS/FindTicket.js"></script>
    </div>
    <div id="ticket-result"></div>
    <a href="../HTML/Login.php" id="link_login">Area IT? Aqui</a>
  </main>
  <footer>
    <p>&copy; 2024</p>
    <p> Desarrollado por: <a href="https://www.linkedin.com/in/nquemba/" target="_blank">Neyder-Dev</a>
    </p>
  </footer>
</body>

</html>