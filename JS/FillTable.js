function llenarTabla() {
  fetch("../PHP/GetTickets.php") // Asegúrate de que esta ruta sea correcta
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la respuesta del servidor");
      }
      return response.json();
    })
    .then((data) => {
      const tabla = document.querySelector("#t-tickets tbody");
      tabla.innerHTML = ""; // Limpiar tabla antes de llenarla
      if (data.length === 0) {
        const emptyRow = document.createElement("tr");
        const emptyCell = document.createElement("td");
        emptyCell.colSpan = 7; // Ajusta según el número de columnas
        emptyCell.textContent = "No hay tickets disponibles";
        emptyRow.appendChild(emptyCell);
        tabla.appendChild(emptyRow);
        return;
      }
      data.forEach((fila) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td><a href="#" onclick="mostrarFormularioEdicion(${fila.IdTicket})">${fila.IdTicket}</a></td>
            <td>${fila.FechaCreacion}</td>
            <td>${fila.NombreUser}</td>
            <td>${fila.TituloTicket}</td>
            <td>${fila.NombreEstado}</td>
            <td>${fila.FechaActualizacion}</td>
            <td>${fila.ItName}</td>
        `;
        tabla.appendChild(row);
    });    
    })
    .catch((error) => {
      console.error("Error al cargar los datos: ", error);
      alert(
        "Hubo un problema al cargar los tickets. Por favor, inténtalo de nuevo más tarde."
      );
    });
}

document.addEventListener("DOMContentLoaded", llenarTabla);

function TicketsAbiertos() {
  fetch("../PHP/NotAssignedTicket.php") // Asegúrate de que esta ruta sea correcta
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la respuesta del servidor");
      }
      return response.json();
    })
    .then((data) => {
      const tabla = document.querySelector("#t-tickets tbody");
      tabla.innerHTML = ""; // Limpiar tabla antes de llenarla
      if (data.length === 0) {
        const emptyRow = document.createElement("tr");
        const emptyCell = document.createElement("td");
        emptyCell.colSpan = 7; // Ajusta según el número de columnas
        emptyCell.textContent = "No hay tickets disponibles";
        emptyRow.appendChild(emptyCell);
        tabla.appendChild(emptyRow);
        return;
      }
      data.forEach((fila) => {
        const row = document.createElement("tr");
        row.innerHTML = `
                  <td>${fila.IdTicket}</td>
                  <td>${fila.FechaCreacion}</td>
                  <td>${fila.NombreUser}</td>
                  <td>${fila.TituloTicket}</td>
                  <td>${fila.NombreEstado}</td>
                  <td>${fila.FechaActualizacion}</td>
                  <td>${fila.ItName}</td>
              `;
        tabla.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("Error al cargar los datos: ", error);
      alert(
        "Hubo un problema al cargar los tickets. Por favor, inténtalo de nuevo más tarde."
      );
    });
}

function TicketsEnProceso() {
  fetch("../PHP/InProcessTickets.php") // Asegúrate de que esta ruta sea correcta
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la respuesta del servidor");
      }
      return response.json();
    })
    .then((data) => {
      const tabla = document.querySelector("#t-tickets tbody");
      tabla.innerHTML = ""; // Limpiar tabla antes de llenarla
      if (data.length === 0) {
        const emptyRow = document.createElement("tr");
        const emptyCell = document.createElement("td");
        emptyCell.colSpan = 7; // Ajusta según el número de columnas
        emptyCell.textContent = "No hay tickets disponibles";
        emptyRow.appendChild(emptyCell);
        tabla.appendChild(emptyRow);
        return;
      }
      data.forEach((fila) => {
        const row = document.createElement("tr");
        row.innerHTML = `
                  <td>${fila.IdTicket}</td>
                  <td>${fila.FechaCreacion}</td>
                  <td>${fila.NombreUser}</td>
                  <td>${fila.TituloTicket}</td>
                  <td>${fila.NombreEstado}</td>
                  <td>${fila.FechaActualizacion}</td>
                  <td>${fila.ItName}</td>
              `;
        tabla.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("Error al cargar los datos: ", error);
      alert(
        "Hubo un problema al cargar los tickets. Por favor, inténtalo de nuevo más tarde."
      );
    });
}

function TicketsEnEspera() {
  fetch("../PHP/InWaitTicket.php") // Asegúrate de que esta ruta sea correcta
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error en la respuesta del servidor");
      }
      return response.json();
    })
    .then((data) => {
      const tabla = document.querySelector("#t-tickets tbody");
      tabla.innerHTML = ""; // Limpiar tabla antes de llenarla
      if (data.length === 0) {
        const emptyRow = document.createElement("tr");
        const emptyCell = document.createElement("td");
        emptyCell.colSpan = 7; // Ajusta según el número de columnas
        emptyCell.textContent = "No hay tickets disponibles";
        emptyRow.appendChild(emptyCell);
        tabla.appendChild(emptyRow);
        return;
      }
      data.forEach((fila) => {
        const row = document.createElement("tr");
        row.innerHTML = `
                  <td>${fila.IdTicket}</td>
                  <td>${fila.FechaCreacion}</td>
                  <td>${fila.NombreUser}</td>
                  <td>${fila.TituloTicket}</td>
                  <td>${fila.NombreEstado}</td>
                  <td>${fila.FechaActualizacion}</td>
                  <td>${fila.ItName}</td>
              `;
        tabla.appendChild(row);
      });
    })
    .catch((error) => {
      console.error("Error al cargar los datos: ", error);
      alert(
        "Hubo un problema al cargar los tickets. Por favor, inténtalo de nuevo más tarde."
      );
    });
}

function mostrarFormularioEdicion(idTicket) {
  document.getElementById("Content-Tickets").style.display = "none";
  document.getElementById("Form-e-ticket").style.display = "block";

  // Llamada AJAX para obtener los datos del ticket y llenar el formulario
  fetch(`../PHP/obtener_ticket.php?id=${idTicket}`)
      .then((response) => {
          if (!response.ok) {
              throw new Error("Error al obtener los datos del ticket");
          }
          return response.json();
      })
      .then((ticket) => {
          // Llenar los campos del formulario con los datos del ticket
          document.getElementById("idTicket").value = ticket.IdTicket;
          document.getElementById("idUsuario").value = ticket.NombreUser;
          document.getElementById("tituloTicket").value = ticket.TituloTicket;
          document.getElementById("estado").value = ticket.NombreEstado;
          document.getElementById("fechaCreacion").value = ticket.FechaCreacion;
          document.getElementById("fechaActualizacion").value = ticket.FechaActualizacion;
          document.getElementById("idResolutor").value = ticket.ItName;
          document.getElementById("descripcionTicket").value = ticket.DescripcionTicket;
          document.getElementById("respuesta").value = ticket.RespuestaTicket;
      })
      .catch((error) => {
          console.error("Error al cargar los datos del ticket: ", error);
          alert("Hubo un problema al cargar los datos del ticket.");
      });
}
