  function CrearTicket() {
    document.querySelector('.botonera').style.display = 'none';
    document.getElementById('form-nticket').style.display = 'flex';
    document.getElementById('name-page').innerHTML = 'Nuevo Ticket';
  }

  function ConsultaTicket() {
    document.querySelector('.botonera').style.display = 'none';
    document.getElementById('form-consulta').style.display = 'flex';
    document.getElementById('name-page').innerHTML = 'Consulta Tickets';
  }

