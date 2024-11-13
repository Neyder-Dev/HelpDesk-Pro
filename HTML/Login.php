<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HelpDesk-Pro ~Login~</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="/Help2/HelpDesk-Pro/CSS/Login.css" />
    <link rel="icon" href="https://zaga.dev/wp-content/uploads/2022/12/cropped-android-chrome-512x512-1-192x192.png" sizes="192x192">
  </head>
  <body>
    <header>
      <div class="title">
        <h1>HelpDesk-Pro</h1>
      </div>
      <h2 id="name">Login</h2>
      <a href="https://zaga.dev/" target="_blank"
        ><img
          src="https://zaga.dev/wp-content/uploads/2023/01/zaga-logo-rectangle.svg"
          alt="logo"
      /></a>
    </header>
    <main class="frente">
      <section class="login">
        <form  action="../PHP/ValideLogin.php" method="post">
          <label for="username">Usuario:</label>
          <input type="email" id="username" name="username" placeholder="usuario@zagalabs.com" required />
          <br />
          <br>
          <label for="password">Contraseña:</label>
          <input type="password" id="password" name="password" placeholder="Contrasena" required />
          <br />
          <br>
          <button id="boton1" type="submit">Iniciar Sesión</button>
        </form>
      </section>
    </main>
    <footer>
        <p>&copy; 2024 </p>
      <p>Desarrollado por: <a href="https://www.linkedin.com/in/nquemba/" target="_blank">Neyder-Dev</a></p>
    </footer>
  </body>
</html>


