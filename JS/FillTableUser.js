function GetUsers() {
    fetch("../PHP/GetInfoUsers.php") // Asegúrate de que esta ruta sea correcta
      .then((response) => {
        if (!response.ok) {
          throw new Error("Error en la respuesta del servidor");
        }
        return response.json();
      })
      .then((data) => {
        const tabla = document.querySelector("#t-users tbody");
        tabla.innerHTML = ""; // Limpiar tabla antes de llenarla
        if (data.length === 0) {
          const emptyRow = document.createElement("tr");
          const emptyCell = document.createElement("td");
          emptyCell.colSpan = 3; // Ajusta según el número de columnas
          emptyCell.textContent = "El Team IT esta vacio";
          emptyRow.appendChild(emptyCell);
          tabla.appendChild(emptyRow);
          return;
        }
        data.forEach((fila) => {
          const row = document.createElement("tr");
          row.innerHTML = `
                  <td>${fila.NombreUser}</td>
                  <td>${fila.CorreoUser}</td>
                  <td>${fila.NombreArea}</td>
              `;
          tabla.appendChild(row);
        });
      })
      .catch((error) => {
        console.error("Error al cargar los datos: ", error);
        alert(
          "Hubo un problema al cargar los usuarios. Por favor, inténtalo de nuevo más tarde."
        );
      });
  }

  document.addEventListener("DOMContentLoaded", GetUsers);
