function consultarTicket() {
  const ticketId = document.getElementById("id-ticket").value;
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "../PHP/ConsultaTicket.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Convertir la respuesta en un objeto JSON
      const ticketData = JSON.parse(xhr.responseText);

      // Asignar los valores a los elementos del DOM correspondientes
      document.getElementById("r-id-ticket").textContent = ticketId;
      document.getElementById("title-ticket").textContent =
        ticketData.TituloTicket;
      document.getElementById("description-ticket").textContent =
        ticketData.DescripcionTicket;
      document.getElementById("status-ticket").textContent =
        ticketData.NombreEstado;
      document.getElementById("it-ticket").textContent = ticketData.ItName;
    }
  };
  xhr.send("id-ticket=" + ticketId);
}

function vuelve() {
  document.getElementById("btn-volver").addEventListener("click", function () {
    event.preventDefault();
    window.location.href = "index.php";
  });
}
