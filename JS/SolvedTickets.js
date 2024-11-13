function TicketsCerrados() {
    fetch("../PHP/CloseTickets.php") // Asegúrate de que esta ruta sea correcta
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error en la respuesta del servidor");
        }
        return response.json();
      })
      .then((data) => {
        const tabla = document.querySelector("#t-tickets-r tbody");
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
  document.addEventListener("DOMContentLoaded", TicketsCerrados);
