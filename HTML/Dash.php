<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HelpDesk-Pro ~Home~</title>

  <!-- Hojas de estilo y fuentes -->
  <link rel="stylesheet" href="../CSS/dash.css" />
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
  <link rel="icon" href="https://zaga.dev/wp-content/uploads/2022/12/cropped-android-chrome-512x512-1-192x192.png" sizes="192x192" />
</head>

<body>
  <div class="container">

    <!-- Barra lateral (Sidebar) -->
    <aside class="sidebar">
      <div class="sidebar-header">
        <h2>HelpDesk-Pro</h2>
      </div>
      <ul class="menu">
        <!-- Elementos del menú -->
        <li>
          <span id="i-ticket" class="material-symbols-outlined">local_activity</span>
          <a href="#" onclick="showContent('Content-Tickets')">Tickets</a>
        </li>
        <li>
          <span id="i-equipo" class="material-symbols-outlined">engineering</span>
          <a href="#" onclick="showContent('Content-It')">Equipo IT</a>
        </li>
        <li>
          <span id="i-usuario" class="material-symbols-outlined">person_pin</span>
          <a href="#" onclick="showContent('Content-Usuarios')">Usuarios</a>
        </li>
        <li>
          <span id="i-tclosed" class="material-symbols-outlined">check</span>
          <a href="#" onclick="showContent('Content-Tickets-r')">Tickets Resueltos</a>
        </li>
        <li>
          <span id="i-reporte" class="material-symbols-outlined">lab_profile</span>
          <a href="#">Reportes</a>
        </li>
        <li>
          <span id="i-ajuste" class="material-symbols-outlined">settings</span>
          <a href="#">Ajustes</a>
        </li>
        <li>
          <span id="i-logout" class="material-symbols-outlined">logout</span>
          <a href="#">Cerrar Sesión</a>
        </li>
      </ul>
      <hr />
    </aside>

    <!-- Sección principal de contenido: Tickets -->
    <main class="content" id="Content-Tickets">
      <header class="header">
        <button class="new-ticket" id="btn_n_ticket" onclick="NuevoTicket()">Nuevo Ticket</button>
        <div class="ticket-filters">
          <!-- Botones de filtro de tickets -->
          <button onclick="TicketsAbiertos()">Tickets Nuevos</button>
          <button onclick="TicketsEnProceso()">Tickets En Proceso</button>
          <button onclick="TicketsEnEspera()">Tickets En Espera</button>
          <button class="overdue" onclick="llenarTabla()">Quitar Filtro</button>
        </div>
      </header>

      <!-- Tabla de tickets -->
      <section class="ticket-table">
        <table id="t-tickets">
          <thead>
            <tr>
              <th>Numero Ticket</th>
              <th>Creado</th>
              <th>Usuario</th>
              <th>Asunto</th>
              <th>Status</th>
              <th>Última Actualización</th>
              <th>Asignado a</th>
            </tr>
          </thead>
          <tbody>
            <!-- Contenido dinámico generado con PHP -->
          </tbody>
        </table>
        <script src="../JS/FillTable.js"></script>
      </section>
    </main>

    <!-- Sección de Tickets Resueltos -->
    <main class="Tickets-Resueltos" id="Content-Tickets-r" style="display: none">
      <header class="header">
        <h2>Tickets Resueltos</h2>
      </header>

      <!-- Tabla de tickets resueltos -->
      <section class="ticket-r-table">
        <table id="t-tickets-r">
          <thead>
            <tr>
              <th>Numero Ticket</th>
              <th>Creado</th>
              <th>Usuario</th>
              <th>Asunto</th>
              <th>Status</th>
              <th>Fecha de cierre</th>
              <th>Resuelto por</th>
            </tr>
          </thead>
          <tbody>
            <!-- Contenido dinámico generado con PHP -->
          </tbody>
        </table>
        <script src="../JS/SolvedTickets.js"></script>
      </section>
    </main>

    <!-- Sección de Equipo IT -->
    <main class="Equipo-it" id="Content-It" style="display: none">
      <header class="header">
        <button class="new-ticket" id="btn_n_it">Nuevo IT</button>
        <div class="ticket-filters">
          <!-- Acciones para el equipo IT -->
          <button id="btn-e-it">Editar IT</button>
          <button id="btn-d-it" class="overdue">Eliminar IT</button>
        </div>
      </header>

      <!-- Tabla de equipo IT -->
      <section class="teamIT">
        <table id="t-teamIT">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Correo</th>
            </tr>
          </thead>
          <tbody>
            <!-- Contenido dinámico generado con PHP -->
          </tbody>
        </table>
        <script src="../JS/FillTableIt.js"></script>
      </section>
    </main>

    <!-- Sección de Usuarios -->
    <main class="Usuarios" id="Content-Usuarios" style="display: none">
      <header class="header">
        <button class="new-user" id="btn_n_user">Nuevo Usuario</button>
        <div class="user-filters">
          <!-- Acciones para los usuarios -->
          <button id="btn-e-user">Editar Usuario</button>
          <button id="btn-d-user" class="overdue">Eliminar Usuario</button>
        </div>
      </header>
      <!-- Tabla de usuarios -->
      <section class="userclass">
        <table id="t-users">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Área</th>
            </tr>
          </thead>
          <tbody>
            <!-- Contenido dinámico generado con PHP -->
          </tbody>
        </table>
        <script src="../JS/FillTableUser.js"></script>
      </section>
    </main>

    <!-- Sección de formulario para nuevo ticket -->
    <main class="f-n-ticket" id="Form-n-ticket" style="display: none">
      <form action="../PHP/SendTickets.php" method="post" id="form-nticket">
        <!-- Formulario de nuevo ticket -->
        <label for="username" id="l-username">Usuario:</label>
        <br />
        <select id="select_usuarios" name="usuario" required>
          <?php include '../PHP/GetUsers.php'; ?>
        </select>
        <br />

        <label for="asunto-ticket" id="l-asunto">Asunto del ticket</label>
        <br />
        <input type="text" id="asunto-ticket" name="asunto-ticket" placeholder="'Mi equipo no enciende'" required />
        <br />

        <label for="descripcion" id="l-descripcion">Descripción:</label>
        <br />
        <textarea id="descripcion-ticket" name="descripcion" rows="4" cols="50" placeholder="Por favor explícanos a detalle cuál es el inconveniente que estás presentando" required></textarea>
        <br /><br />

        <!-- Botones del formulario -->
        <div class="button-container">
          <button id="btn-nticket" type="submit">Enviar Ticket</button>
          <button id="btn-volver" type="button" onclick="history.back();">Volver</button>
        </div>
      </form>
    </main>

    <!-- Sección de formulario para nuevo IT -->
    <main class="f-n-It" id="Form-n-It" style="display: none">
      <form action="../PHP/CreateIT.php" method="post" id="form-nit">
        <!-- Formulario de nuevo ticket -->
        <label for="ItName" id="l-ItName">Nombre:</label>
        <br />
        <input type="text" id="ItName" name="ItName" placeholder="Nombre" required />
        <br />

        <label for="ItLastName" id="l-ItLastName">Apellido:</label>
        <br />
        <input type="text" id="ItLastName" name="ItLastName" placeholder="Apellido" required />
        <br />

        <label for="ItEmail" id="l-ItEmail">Correo electronico:</label>
        <br />
        <input type="email" id="ItEmail" name="ItEmail" placeholder="usuario@zagalabs.com" required />
        <br />

        <label for="ItPassword" id="l-ItPassword">Contrasena</label>
        <br />
        <input type="password" id="ItPassword" name="ItPassword" placeholder="Micontrasena1*" required />
        <br />
        <label for="ItPassword1" id="l-ItPassword1">Confirmar Contrasena:</label>
        <br />
        <input type="password" id="ItPassword1" name="ItPassword1" placeholder="Micontrasena1*" required />
        <br />

        <!-- Botones del formulario -->
        <div class="button-container">
          <button id="btn-n-it" type="submit">Crear Usuario</button>
          <button id="btn-volver-it" type="button" onclick="history.back();">Volver</button>
        </div>
      </form>
    </main>

    <!-- Sección de formulario para editar IT -->
    <main class="f-e-It" id="Form-e-It" style="display: none;">
      <form action="../PHP/UpdateIt.php" method="post" id="form-eit">
        <!-- Formulario de nuevo ticket -->
        <label for="ItName" id="l-ItName">Seleccione un analista:</label>
        <br />
        <select id="select_it" name="it_name-s" required onchange="loadUserData(this.value)">
          <?php include '../PHP/GetItName.php'; ?>
        </select>
        <br>
        <br>
        <label for="ItName-e" id="l-ItName-e">Nombre:</label>
        <br />
        <input type="text" id="ItName-e" name="ItName-e" required />
        <br />

        <label for="ItLastName-e" id="l-ItLastName-e">Apellido:</label>
        <br />
        <input type="text" id="ItLastName-e" name="ItLastName-e" required />
        <br />

        <label for="ItEmail-e" id="l-ItEmail-e">Correo electronico:</label>
        <br />
        <input type="email" id="ItEmail-e" name="ItEmail-e" required />
        <br />

        <label for="ItPassword-e" id="l-ItPassword-e">Contrasena</label>
        <br />
        <input type="password" id="ItPassword-e" name="ItPassword-e" required />
        <br />
        <!-- Botones del formulario -->
        <div class="button-container">
          <button id="btn-e-it" type="submit">Editar Analista</button>
          <button id="btn-volver-it" type="button" onclick="history.back();">Volver</button>
        </div>
      </form>
    </main>

    <!-- Sección de formulario para eliminar IT -->
    <main class="f-d-It" id="Form-d-It" style="display: none;">
      <form action="../PHP/DeleteIt.php" method="post" id="form-eit">
        <!-- Formulario de nuevo ticket -->
        <label for="ItName" id="l-ItName">Seleccione un analista:</label>
        <br />
        <select id="select_it" name="it_name-s-d" required>
          <?php include '../PHP/GetItName.php'; ?>
        </select>
        <br>
        <div class="button-container">
          <button id="btn-d-it" type="submit">Eliminar Analista</button>
          <button id="btn-volver-it" type="button" onclick="history.back();">Volver</button>
        </div>
      </form>
    </main>

    <!-- Sección de formulario para nuevo Usuario -->
    <main class="f-n-user" id="Form-n-User" style="display: none">
      <form action="../PHP/CreateUser.php" method="post" id="form-nuser">
        <!-- Formulario de nuevo usuario -->
        <label for="Username" id="l-Username">Nombre:</label>
        <br />
        <input type="text" id="Username" name="Username" placeholder="Nombre" required />
        <br />
        <label for="Useremail" id="l-Usermail">Correo electronico:</label>
        <br />
        <input type="email" id="Useremail" name="Useremail" placeholder="usuario@zagalabs.com" required />
        <br />
        <label for="username" id="l-username">Area de trabajo:</label>
        <br />
        <select id="select_u_area" name="u_area" required>
          <?php include '../PHP/GetAreas.php'; ?>
        </select>
        <br />
        <!-- Botones del formulario -->
        <div class="button-container">
          <button id="btn-n-user" type="submit">Crear Usuario</button>
          <button id="btn-volver-user" type="button" onclick="history.back();">Volver</button>
        </div>
      </form>
    </main>

     <!-- Sección de formulario para editar Usuarios -->
     <main class="f-e-user" id="Form-e-User" style="display: none;">
      <form action="../PHP/UpdateUser.php" method="post" id="form-euser">
        <!-- Formulario de nuevo ticket -->
        <label for="username" id="l-username">Usuario:</label>
        <br>
        <select id="select_usuarios" name="usuario-e" required onchange="CargaUser(this.value)">
          <?php include '../PHP/GetUsers.php'; ?>
        </select>
        <br>
        <label for="Username-e" id="l-Username-e">Nombre:</label>
        <br />
        <input type="text" id="Username-e" name="Username-e" placeholder="Nombre" required />
        <br />
        <label for="Useremail-e" id="l-Usermail-e">Correo electronico:</label>
        <br />
        <input type="email" id="Useremail-e" name="Useremail-e" placeholder="usuario@zagalabs.com" required />
        <br />
        <label for="username-e" id="l-username-e">Area de trabajo:</label>
        <br />
        <select id="select_u_area-e" name="u_area-e" required>
          <?php include '../PHP/GetAreas.php'; ?>
        </select>
        <br />
        <!-- Botones del formulario -->
        <div class="button-container">
          <button id="btn-e-User" type="submit">Editar Usuario</button>
          <button id="btn-volver-user" type="button" onclick="history.back();">Volver</button>
        </div>
      </form>
    </main>

     <!-- Sección de formulario para eliminar Usuarios -->
     <main class="f-d-User" id="Form-d-User" style="display: none;">
      <form action="../PHP/DeleteUser.php" method="post" id="form-duser">
        <!-- Formulario de nuevo ticket -->
        <label for="UserName-d" id="l-UserName-d">Seleccione un usuario:</label>
        <br />
        <select id="select_usuario" name="username-s-d" required>
          <?php include '../PHP/GetUsers.php'; ?>
        </select>
        <br>
        <div class="button-container">
          <button id="btn-d-user" type="submit">Eliminar Usuario</button>
          <button id="btn-volver-it" type="button" onclick="history.back();">Volver</button>
        </div>
      </form>
    </main>

    <!-- Sección de formulario para Editar Tickets -->
    <main class="f-e-ticket" id="Form-e-ticket" style="display: none;">
    <form action="../PHP/UpdateTicket.php" method="post">
        <input type="hidden" id="idTicket" name="idTicket">
        <br>
        <label for="idUsuario">Usuario:</label>
        <input type="text" id="idUsuario" name="idUsuario" readonly>
        <br>
        <label for="tituloTicket">Título:</label>
        <input type="text" id="tituloTicket" name="tituloTicket" readonly>
        <br>
        <label for="estado">Estado:</label>
        <select id="estado" name="estado">
            <option value="1">Nuevo</option>
            <option value="2">En Proceso</option>
            <option value="3">En Espera</option>
            <option value="4">Resuelto</option>
        </select>
        <br>
        <label for="fechaCreacion">Fecha de Creación:</label>
        <input type="text" id="fechaCreacion" name="fechaCreacion" readonly>
        <br>
        <label for="fechaActualizacion">Fecha de Actualización:</label>
        <input type="text" id="fechaActualizacion" name="fechaActualizacion" readonly>
        <br>
        <label for="idResolutor">Quien Resuelve:</label>
        <input type="text" id="idResolutor" name="idResolutor" readonly>
        <br>
        <label for="descripcionTicket">Descripción:</label>
        <textarea id="descripcionTicket" name="descripcionTicket" readonly></textarea>
        <br>
        <label for="respuesta">Respuesta:</label>
        <textarea id="respuesta" name="respuesta"></textarea>
        <br>
        <button id="btn-e-Ticket" type="submit">Actualizar</button>
        <button id="btn-volver-Ticket" type="button" onclick="history.back();">Volver</button>
    </form>
    </main>
  </div>

  <!-- Archivos JavaScript -->
  <script src="../JS/Sidebar.js" defer></script>
  <script src="../JS/NewTicket.js"></script>
  <script src="../JS/EditIt.js"></script>
</body>

</html>